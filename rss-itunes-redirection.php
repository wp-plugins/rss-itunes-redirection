<?php 
/*
Plugin Name: iTunes RSS Redirection
Plugin URI: http://social2business.com
Description: A Plugin that redirects the current iTunes feed to another feed url.
Version: 0.1
Author: Florian Simeth
Author URI: http://hangout-lifestyle.de
*/
/*  Copyright 2012  Florian Simeth  (email : florian.simeth@online.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
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