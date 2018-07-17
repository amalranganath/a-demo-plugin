<?php
/**
 * @view invoice create
 */
if (!defined('ABSPATH')) {
    exit;
}
?>

<h1><?= __("Create a Invoice", A::$config->i18n); ?></h1>
<?php
$this->render('invoices-form');
