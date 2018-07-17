<?php

/**
 * Just Stripe Invoice model class.
 *
 * @package  Just Stripe/PC_Property
 * @category Model
 * @author   Amal Ranganath
 * @version  1.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('JSInvoice')) {

    /**
     * Property Type model class.
     */
    class JSInvoice extends BaseModel {

        /**
         * Table identity (required)
         * @static
         */
        const TABLE_NAME = 'js_invioce';
        const PRIMARY_KEY = 'id';

        /**
         * Table fields
         * @var string 
         */
        public $id;
        public $invoice;
        public $amount;
        public $currency;
        public $adminnotes;
        public $link;
        public $paid;

        /**
         * Update attributes before insert to db
         */
        public function beforeInsert() {
            unset($this->attributes['submit']);
        }

        /**
         * Update attributes before update the db
         */
        public function beforeUpdate() {
            $this->beforeInsert();
        }

        /**
         * Create Table
         * @global object $wpdb
         */
        public static function createTable() {
            //Create a tabel in database
            global $wpdb;
            $table_name = $wpdb->prefix . self::TABLE_NAME;
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint NOT NULL AUTO_INCREMENT,
            invoice varchar(16) NOT NULL,
            amount decimal(10,2) NOT NULL,
            currency varchar(20) NULL,
            adminnotes varchar(255) NULL,
            paid tinyint NOT NULL,
            UNIQUE KEY id (id) ) $charset_collate;";
            $wpdb->query($sql);
        }

        /**
         * Drop Table
         * @global object $wpdb
         */
        public static function dropTable() {
            global $wpdb;
            $tablename = $wpdb->prefix . self::TABLE_NAME;
            $wpdb->query("DROP TABLE IF EXISTS $tablename");
        }

        /**
         * Associative array of columns
         * @return array
         */
        public static function attributLabels() {
            return[
                'id' => __('ID', A::$config->i18n ),
                'invoice' => __('Invoice', A::$config->i18n),
                'amount' => __('Amount', A::$config->i18n),
                'currency' => __('Currency', A::$config->i18n),
                'adminnotes' => __('adminnotes', A::$config->i18n),
            ];
        }

    }

}