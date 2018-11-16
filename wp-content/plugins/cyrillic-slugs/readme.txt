=== Cyrillic Permalinks ===
Contributors: pbosakov
Tags: cyrillic, slugs, permalinks, Russian, Ukrainian, Kazakh, Belarussian, Serbian, Tajik, Bulgarian, Kyrgyz, Bosnian, Mongolian, Macedonian
Requires at least: 2.0.2
Tested up to: 4.9.8
Stable tag: trunk
Requires PHP: 5.6

Automatically transliterates Cyrillic letters in post and page permalinks to their Latin phonetic equivalent. Multi-language. Can convert pre-existing permalinks.

== Description ==

This plugin will automatically transliterate permalink URLs when you save a new page or post with a title in the Cyrillic script.
Romanization presets are available for all the major languages using the Cyrillic script: Russian, Ukrainian, Kazakh, Belarussian, Serbian, Tajik, Bulgarian, Kyrgyz, Bosnian, Mongolian, and Macedonian.
The plugin can also romanize permalinks for any pre-existing posts, categories, products or other items with a title written in Cyrillic.
Only UTF-8 encoding is supported.

== Installation ==

1. Upload the package contents to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Review plugin settings under Settings / Cyrillic Permalinks

== Changelog ==

= 2.0.0 =
* Fix: some letters are missed
* Feature: multiple language conversion tables (default: Russian)
* Feature: regenerate pre-existing permalinks
