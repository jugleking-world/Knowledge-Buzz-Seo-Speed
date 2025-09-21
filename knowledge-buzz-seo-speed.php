<?php
/**
 * Plugin Name: Knowledge Buzz SEO & Speed
 * Description: Open-source foundation plugin for SEO + Speed Optimization. Meta tags, sitemap, lazy load, minify HTML.
 * Version: 1.0
 * Author: Davis Simiyu
 * License: GPL2
 */

if (!defined('ABSPATH')) exit;

// Load admin
if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'includes/admin.php';
}

// Load frontend SEO
require_once plugin_dir_path(__FILE__) . 'includes/seo.php';

// Load Speed optimizations
require_once plugin_dir_path(__FILE__) . 'includes/speed.php';
