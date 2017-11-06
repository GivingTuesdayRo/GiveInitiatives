<?php
/**
 * Giving Tuesday Give Initiatives plugin for WordPress.
 *
 * A Wordpress plugin to list initiatives for Giving Tuesday websites:
 *
 * * Plugin Name: GiveInitiatives
 * * Plugin URI: https://github.com/GivingTuesdayRo/GiveInitiatives
 * * Description: A list of initiatives for Giving Tuesday Websites
 * * Version: 0.1
 * * Author: Gabriel Solomon <gabriel.solomon@galantom.ro>
 * * Author URI: https://GivingTuesday.ro/
 * * License: GPL-3.0
 * * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * * Text Domain: GiveInitiatives
 * * Domain Path: /languages
 *
 * @link https://developer.wordpress.org/plugins/the-basics/header-requirements/
 *
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @copyright Copyright (c) 2016 by My Name
 *
 * @package WordPress\Plugin\My_WP_Plugin
 */
if ( ! defined('ABSPATH')) {
    exit;
} // Disallow direct HTTP access.

require 'vendor/autoload.php';

\GivingTuesdayRo\GiveInitiatives\GiveInitiatives::run();
