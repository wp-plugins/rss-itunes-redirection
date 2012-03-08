<?php 
/*
Plugin Name: iTunes RSS Redirection
Plugin URI: http://social2business.com
Description: A Plugin that redirects the current iTunes feed to another feed url.
Version: 0.1
Author: Florian Simeth
Author URI: http://hangout-lifestyle.de
*/

define('ITRSSR', ABSPATH.'/wp-content/plugins/rss-itunes-redirection');

require_once(ITRSSR.'/rss-itunes-redirection-class.php');

// Crate a new instance
$iTRSS = new iTunesRSSRedirection();

// Load the translation
$iTRSS->init_translation();

// Create Menue
$iTRSS->create_wp_menu();

// Create Settings-Page
$iTRSS->create_wp_settings();

// add redirection
$iTRSS->redirection();