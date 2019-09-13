<?php
/*
Plugin Name: Youtube Video Gallery - Youtube Channel For WPBakery Page Builder With Video Advertising
Plugin URI: http://beeteam368.com/youtube-gallery/
Description: Displays your actual complete youtube channel on your website just like its shown on youtube.
Author: BeeTeam368
Author URI: http://beeteam368.com/youtube-gallery/
Version: 2.0.0
License: Commercial
*/

if(!defined('ABSPATH')){
	die('-1');
}

if(!defined('YT_BETE_VER')){
	define('YT_BETE_VER','2.0.0');
};

if(!defined('YT_BETE_PLUGIN_URL')){
    define('YT_BETE_PLUGIN_URL', plugin_dir_url(__FILE__));
};


if(!defined('YT_BETE_PLUGIN_PATH')){
    define('YT_BETE_PLUGIN_PATH', plugin_dir_path(__FILE__));
};

if(!defined('YT_BETE_PREFIX')){
    define('YT_BETE_PREFIX', 'yt_bt_');
};

require_once('includes/reg-shortcode/reg-shortcode.php');
require_once('includes/reg-vc/reg-vc.php');
require_once('includes/plugin-settings/plugin-settings.php');
require_once('sample-data/sample-data.php');