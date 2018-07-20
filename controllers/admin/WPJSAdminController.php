<?php

/**
 * Just Stripe Admin class.
 *
 * @package  WPJS/Admin
 * @category Admin
 * @author   Amal Ranganath
 * @version  1.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('WPJSAdmin')) {

    class WPJSAdmin extends WPAdmin {

        /**
         * Initialize and hook in the integration.
         */
        public function __construct() {
            parent::__construct();
            //check for request
            //add_action('parse_request', array(__CLASS__, 'pars_'));
            //add settings link
            add_filter('plugin_action_links_' . A::$config->baseName, array(__CLASS__, '_plugin_action_link'));
        }

        /**
         * Display plug-in settings link
         * @since    1.0.0
         * @param array $links
         * @return mixed
         */
        public static function _plugin_action_link($links) {
            $links[] = '<a href="' . esc_url(get_admin_url(null, "admin.php?page=" . static::$mainMenu['slug'])) . '">Settings</a>';
            return $links;
        }

        /**
         * Handle the requested actions
         * @since    1.0.0
         * @param string $tab
         */
        protected function actions() {
            //init model class for current tab
            if ($this->page == 'wpjs-settings' && isset($_POST)) {
                //if post and verify
                if (isset($_POST[$this->current]) && wp_verify_nonce($_POST[$this->current])) {
                    $options = $_POST;
                    unset($options['submit']);
                    if ($this->current == 'general')
                        $options['showCurrency'] = isset($options['showCurrency']);
                    if ($this->current == 'api-details')
                        $options['mood'] = isset($options['mood']);

                    A::$plugin->options = array_merge(A::$plugin->options, $options);

                    //update panel options
                    if (update_option(A::$config->id, A::$plugin->options))
                        ANotify::addMessage('Successfully updated settings!');
                    else
                        ANotify::addError('Please make changes to update!');
                }
            }
        }

        /**
         * 
         */
        public function actionInvoices() {
            $model = new JSInvoice();
            $this->model = $model;
            $label = static::sanitize_text($this->current);

            //iff model id is requested
            if (isset($_REQUEST['id']) && $this->action != '') {
                $model->select()->where(['id' => $_REQUEST['id']])->single();
            }
            //iff post requested
            if ($_POST && $this->action != '') {
                $model->setAttributes($_POST);
                if ($this->action == 'update') {
                    if ($model->update()) {
                        ANotify::addMessage("Successfully updated $label !");
                    } else {
                        ANotify::addError($model->error ? $model->error : "Please make a change to update!");
                    }
                } else if ($this->action == 'create') {
                    if ($model->insert()) {
                        ANotify::addMessage("Successfully created $label!");
                    } else {
                        ANotify::addError($model->error);
                    }
                }
            }
            //check for deletion
            if ($this->action == 'delete') {
                //$model->get_row('id', $_REQUEST['id']);
                if ($model->delete()) {
                    ANotify::addMessage('updated', "$label $model->name is deleted!");
                } else {
                    ANotify::addError('error', $model->error);
                }
                //redirect
                wp_redirect(admin_url("admin.php?page=$this->page&tab=$this->current&paged=" . $_REQUEST['paged']));
            }
        }

    }

}