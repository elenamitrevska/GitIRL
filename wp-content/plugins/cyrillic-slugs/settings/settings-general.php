<?php
add_filter( 'wpsf_register_settings_cyr_slugs_settings_general', 'cyr_slugs_settings_general' );
function cyr_slugs_settings_general($wpsf_settings) {
    // General Settings section
    $wpsf_settings[] = array(
        'section_id' => 'general',
        'section_title' => 'Cyrillic Permalinks Settings',
        'section_order' => 1,
        'fields' => array(
            array(
                'id' => 'language',
                'title' => 'Language',
                'desc' => __(
                    'Choose the language preset to use when converting Cyrillic ' .
                        'to Latin.',
                    'cyr-slugs'
                ),
                'type' => 'select',
                'default' => 'RU',
                'choices' => array(
                    'BE' => __('Belarussian', 'cyr-slugs'),
                    'BS' => __('Bosnian', 'cyr-slugs'),
                    'BG' => __('Bulgarian', 'cyr-slugs'),
                    'KK' => __('Kazakh', 'cyr-slugs'),
                    'KY' => __('Kyrgyz', 'cyr-slugs'),
                    'MK' => __('Macedonian', 'cyr-slugs'),
                    'MN' => __('Mongolian', 'cyr-slugs'),
                    'RU' => __('Russian', 'cyr-slugs'),
                    'SR' => __('Serbian', 'cyr-slugs'),
                    'TG' => __('Tajik', 'cyr-slugs'),
                    'UK' => __('Ukrainian', 'cyr-slugs')
                )
            )
        )
    );
    return $wpsf_settings;
}
