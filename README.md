
<p align="center">
    <h1 align="center">A Framework - Demo Plugin</h1>
</p>

<p>
A is a Simple MVC Framework to develop Wordpress plugins easily. This is the demo plugin created using <a href="https://github.com/amalranganath/a">A Framework</a> which is to give you a brief idea about how it works.
Please give it a try and report if you find any <a href="https://github.com/amalranganath/a-demo-plugin/issues">issues</a>.
</p>

[![Latest Stable Version](https://img.shields.io/packagist/v/amalranganath/a-demo-plugin.svg)](https://packagist.org/packages/amalranganath/a-demo-plugin)
[![Total Downloads](https://img.shields.io/packagist/dt/amalranganath/a-demo-plugin.svg)](https://packagist.org/packages/amalranganath/a-demo-plugin)
[![Build Status](https://travis-ci.org/amalranganath/a-demo-plugin.svg?branch=master)](https://travis-ci.org/amalranganath/a-demo-plugin)


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      components/         contains components (any helper class)
      controllers/        contains Web controller classes
      models/             contains model classes
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application


REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.
Also you should have installed <a href="https://wordpress.org/">Wordpress</a> latest (at least 4.9.7) version.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Go to the wp-contet/plugins/ folder of your Wordpress project and type the following command:

~~~
composer create-project --stability=dev amalranganath/a-demo-plugin
cd a-demo-plugin/ 
composer update
~~~

Now you should be able to see the "A Demo Plugin" in the plugins listing.

START DEVELOPMENT
-----------------

Find the `plugin-name.php` file in plugin root `wp-contet/plugins/a-demo-plugin/` folder and change the plugin details inside the comment as you wish. 
Do not change the framework include code. You may define anything to run when activating the plugin inside `register_activation_hook` as usual.
All the other developments go under "MVC" design as you can see inside the controllers, models and views folders.


CONFIGURATION
-------------

All configurations are defined in the file `config.php`. Read the following sample code to get an idea how to define the each attribute:
When creating templates for the admin (in views/admin/) menu pages and tabs, file name should be the slug.


```php
return [
    'id' => 'plugin-id',
    'name' => 'Plugin Name',

     /**  Do not change **/
    'basePath' => plugin_dir_path(__FILE__), 
    'baseUrl' => plugins_url('/', __FILE__),
    'baseName' => plugin_basename(__FILE__),
    
    'i18n' => 'language-domain-name',

    /** Admin menu and pages of the plugin **/
    'admin' => [
        'class' => 'Admin controller class name',

        /** Main menu item **/
        'mainMenu' => [
            'pageTitle' => 'The Page title',
            'title' => 'The menu title',
            'slug' => 'main-menu-slug',
            'icon' => 'The menu icon class',
            'position' => 'The menu item position'
        ],

        /** Sub menu items **/
        'pages' => [
            'menu-item-1' => [
                'pageTitle' => 'The Page title',
                'title' => 'The menu title',
                'slug' => 'menu-item-1-slug',
                /** The tabs **/
                'tabs' => [
                    'tab-1-slug' => 'tab 1 Title',
                    'tab-2-slug' => 'tab 2 Title',
                ]
            ],
            'menu-item-2' => [
                'pageTitle' => 'The Page title',
                'title' => 'The menu item 2 title',
                'slug' => 'menu-item-2-slug',
            ]
        ]
];
```

DOCUMENTATION
-------------

Coming soon ...