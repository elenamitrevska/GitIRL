<?php
/*
Plugin Name: Cyrillic Permalinks
Plugin URI: http://bossakov.eu/cyrillic-permalinks
Description: Transliterates cyrillic letters in post permalinks to their phonetic equivalent in the latin alphabet.
Version: 2.0.0
Author: Petko Bossakov
Author URI: http://bossakov.eu/
License: GPLv3 or later
*/

/*
Copyright 2007-2018 Petko Bossakov

Licensed under the terms of the GPL version 3 or later, see:
http://www.gnu.org/licenses/gpl.txt

Provided without warranty, inluding any implied warrant of merchantability or fitness for purpose.
*/

class CyrSlugs {

    private $wpsf;
    private $cyrillic;
    private $latin;

    function __construct() {

        require_once 'tables.php';
        require_once 'wp-settings-framework/wp-settings-framework.php';

        $this->cyrillic = CyrSlugsData::CYRILLIC;
        $this->latin = CyrSlugsData::LATIN;
        $this->latin['SR'] = $this->latin['BS'];

        $this->wpsf = new WordPressSettingsFramework(
           plugin_dir_path(__FILE__) . 'settings/settings-general.php',
            'cyr_slugs_settings_general'
        );
        add_action('admin_menu', array($this, 'settingsPage'), 20);
        add_action(
            'wpsf_after_settings_cyr_slugs_settings_general',
            array($this, 'outputButton')
        );
        add_action(
            'wp_ajax_cyr_slugs_update_existing',
            array($this, 'updateExisting')
        );

        add_filter(
            'plugin_action_links_' . plugin_basename(__FILE__),
            array($this, 'pluginActionLinks')
        );
        add_filter('name_save_pre', array($this, 'convert'), 1);
    }

    public function settingsPage() {
        $this->wpsf->add_settings_page(array(
            'parent_slug' => 'options-general.php',
            'page_title'  => __('Cyrillic Permalinks', 'cyr-slugs'),
            'menu_title'  => __('Cyrillic Permalinks', 'cyr-slugs'),
            'capability'  => 'manage_options'
        ) );
    }

    public function outputButton() {
        $warning = __(
            'WARNING: this will change post/category URLs and ' .
            'break any existing links',
            'cyr-slugs'
        );
        ?>
        <p class="submit">
            <input
                type="button"
                class="button-primary"
                id="romanize-all"
                value="<?php
                _e('Romanize all existing permalinks', 'cyr-slugs');
                ?>"
                onclick="if (confirm('<?php echo addslashes($warning); ?>')) {
                    var oldvalue = jQuery(this).attr('value');
                    jQuery(this).attr('value', '<?php
                        echo addslashes(__('Please wait...', 'cyr-slugs'));
                    ?>');
                    jQuery(this).prop('disabled', true);
                    jQuery.post(
                        ajaxurl,
                        {'action': 'cyr_slugs_update_existing'},
                        function(response) {
                            alert(response);
                            jQuery('#romanize-all').attr('value', oldvalue);
                            jQuery('#romanize-all').prop('disabled', false);
                        }
                    ).fail(function() {
                        alert('An unexpected error occurred.')
                    });
                }"><br>
            <strong><?php echo $warning; ?></strong>
        </p>
        <?php
    }

    public function convert($name, $post_title = '', $force = false) {

        if(empty($post_title)) {
            $post_title = $_POST['post_title'];
        }

        if ($force) {
            if (
                !$this->hasCyrillic($post_title) && !$this->hasCyrillic($name)
            ) {
                return $name;
            }
        } elseif (!empty($name) && !$this->hasCyrillic($name)) {
            return $name;
        }
        
        $language = strtoupper(wpsf_get_setting(
            'cyr_slugs_settings_general',
            'general',
            'language'
        ));
        if (empty($language) || !isset($this->latin[$language])) {
            $language = 'RU';
        }
        $cyr_slug = $this->hasCyrillic($name) ?
            $name :
            stripslashes($post_title);
        $cyr_slug = str_replace(
            $this->cyrillic,
            $this->latin[$language],
            $cyr_slug
        );
        $cyr_slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($cyr_slug));
        return $cyr_slug;
    }

    public function hasCyrillic($str)
    {

        // Unicode-safe split string to characters
        preg_match_all('`.`u', $str, $arr);
        if (empty($arr) || empty($arr[0])) {
            return false;
        }
        $arr = $arr[0];

        foreach ($arr as $char) {
            if (in_array($char, $this->cyrillic)) {
                return true;
            }
        }

        return false;
    }

    public function updateExisting()
    {
        if (!current_user_can('manage_options')) {
            echo('Current user has insufficient access rights');
            return;
        }
        $posts = get_posts(array(
            'numberposts' => -1
        ));
        $counter = 0;
        if (!empty($posts)) {
            foreach ($posts as $post) {
                if ($this->hasCyrillic($post->post_title)) {
                    $data = array(
                        'ID' => $post->ID,
                        'post_name' => $this->convert(
                            $post->post_name,
                            $post->post_title,
                            true
                        )
                    );
                    wp_update_post($data);
                    $counter++;
                }
            }
        }
        echo "$counter items updated.";
        wp_die();
    }

    public function pluginActionLinks($links)
    {
        $links[] = '<a href="' . esc_url(
            menu_page_url('cyr-slugs-settings-general-settings', false)
        ) . '">Settings</a>';
        return $links;
    }

}

$cyr_slugs = new CyrSlugs();
