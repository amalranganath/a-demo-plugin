<?php

/**
 * Plugin Name: Charge via Stripe
 * Plugin URI: https://www.livingdreamsweb.com.au
 * Description: This will charge any given amount & currency on Stripe.
 * Version: 1.0.1
 * Requires at least: 4.9
 * Author: Living Dreams
 * Author URI: http://livingdreams.lk
 * License: GPLv2.0
 * Text Domain: wpjs
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//include the framework
require __DIR__.'/vendor/autoload.php';
$config = require __DIR__.'/config.php';
new A($config);

/**
 * Actions to run when activate this plug-in
 * @since version 1.0.1
 */
register_activation_hook(__FILE__, function () {
    JSInvoice::createTable();
});

