<?php
/**
 * @view invoice update
 */
if (!defined('ABSPATH')) {
    exit;
}

?>

<h1><?= __("Update an Invoice", A::$config->i18n); ?></h1>

<?php
$this->render('invoices-form');
