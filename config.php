<?php

/**
 * Plug-in configurations
 * @return array
 */
if (!defined('ABSPATH')) {
    exit;
}

return [
    'id' => 'wpjs',
    'name' => '',
    'basePath' => plugin_dir_path(__FILE__),
    'baseUrl' => plugins_url('/', __FILE__),
    'baseName' => plugin_basename(__FILE__),
    'i18n' => 'wpjs',
    //admin menu and pages
    'admin' => [
        'class' => 'WPJSAdmin',
        'mainMenu' => [
            'pageTitle' => 'Settings',
            'title' => 'Just Stripe',
            'slug' => 'wpjs-settings',
            'icon' => 'dashicons-cart',
            'position' => 25
        ],
        'pages' => [
            'wpjs-settings' => [
                'pageTitle' => 'Stripe Settings',
                'title' => 'Settings',
                'slug' => 'wpjs-settings',
                'tabs' => [
                    'general' => 'General',
                    'api-details' => 'API Details',
                ]
            ],
            'invoices' => [
                'pageTitle' => 'Settings',
                'title' => 'Invoices',
                'slug' => 'invoices',
            ]
        ]
    ]
];
