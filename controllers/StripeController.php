<?php

/**
 * Stripe class.
 * this version is customized for currency AUD
 * @package  Stripe
 * @category WPJS
 * @author   Amal Ranganath
 * @version  1.0.1
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('Stripe')) {

    class Stripe extends BaseController {

        public $message;

        /**
         * Initiate the hooks.
         */
        public function __construct() {
            parent::__construct();
            //charge iff requested
            add_action('init', array($this, 'charge'));

            //add shortcode
            if (!is_admin())
                add_shortcode('stripe', array($this, 'shortcode'));
        }

        /**
         * index action
         */
        public function index() {
            $this->render('index');
        }

        /**
         * Invoice action
         */
        public function invoice($id = null) {
            //create a model
            $model = new JSInvoice();
            if ($id != null) {
                $model->select()->where(['id' => $id])->single();
            }
            if (isset($_POST['form-invoice']) && wp_verify_nonce($_POST['form-invoice'])) {
                //var_dump($_POST);
                $model->setAttributes($_POST);
                if (isset($model->id) && $model->update()) {
                    ANotify::addMessage('Updated!');
                } else if ($model->insert()) {
                    ANotify::addMessage('Added!');
                    wp_redirect(site_url('stripe/'));
                }
            }
            $this->render('invoice', ['model' => $model]);
        }

        /**
         * 
         */
        public function delete($id) {
            $model = new JSInvoice();
            
            if ($id != null) {
                $model->select()->where(['id' => $id])->single();
                $model->delete();
                wp_redirect(site_url('stripe/'));
                ANotify::addMessage('Deleted!');
                exit();
            }
        }

        /**
         * Call Stripe to charge
         */
        public function charge() {
            //  Get the payment token ID submitted by the form:
            if (isset($_POST['stripeToken'])) {

                require(PLUGIN_DIR . 'stripe/init.php');
                // Set APi key
                Stripe\Stripe::setApiKey(A::$plugin->options['mood'] ? A::$plugin->options['testApiKey'] : A::$plugin->options['apiKey']);

                // Charge the user's card:
                try {
                    $charge = Stripe\Charge::create(array(
                                "amount" => $_REQUEST['amount'] * 100,
                                "currency" => $_REQUEST['currency'],
                                "description" => A::$plugin->options['description'] . " " . $_REQUEST['inv'],
                                "source" => $_POST['stripeToken'],
                    ));

                    $response = $charge->jsonSerialize();

                    if ($response['captured']) {
                        $this->message = 'Successfully Charged ' . strtoupper($response['currency']) . ' ' . $response['amount'] / 100;
                        $this->message .= 'We have received your payment. Thank you.';
                    }
                } catch (Exception $e) {
                    $this->message = 'Invalid token or api details, could not charge';
                }
            }
        }

        /**
         * Short code to embed stripe form
         * @param array $atts
         */
        public function shortcode($atts) {
            ob_start();
            if (isset($_REQUEST[A::$plugin->options['invoice']]) && isset($_REQUEST[A::$plugin->options['amount']])) {
                //&& isset($_REQUEST['currency'])
                $atts = shortcode_atts(array(
                    'class' => 'stripe-button',
                    'label' => 'Pay Securely via Stripe',
                    'action' => '',
                    'invoice' => $_REQUEST[A::$plugin->options['invoice']],
                    'currency' => isset($_REQUEST[A::$plugin->options['curSlug']]) ? $_REQUEST[A::$plugin->options['curSlug']] : A::$plugin->options['currency'],
                    'amount' => $_REQUEST[A::$plugin->options['amount']]
                        ), $atts);
                //check for errors
                if ($this->message != null) {
                    ANotify::flash('error', $this->message);
                } else {
                    $this->render('stripe', $atts);
                }
            } else {
                ANotify::flash('error', 'Reservation ID or Amount not provided', true);
                //echo '<p style="color:red"><strong>Error: </strong>Reservation ID or Amount not provided</p>';
            }
            $content = ob_get_contents();
            ob_end_clean();
            //return output
            return $content;
        }

    }

}