<?php

/**
 * Plugin Name: A Demo Plugin
 * Plugin URI: https://github.com/amalranganath/a-demo-plugin
 * Description: This will charge any given amount & currency on Stripe.
 * Version: 1.0.1
 * Requires at least: 4.9.7
 * Author: Amal Ranganath
 * Author URI: https://github.com/amalranganath
 * License: GPLv2.0
 * Text Domain: wpjs
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//include the framework
require __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/config.php';
new A($config);

/**
 * Actions to run when activate this plug-in
 * @since version 1.0.0
 */
register_activation_hook(__FILE__, function () {
    JSInvoice::createTable();
});
