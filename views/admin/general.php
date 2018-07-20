<?php
/**
 * General settings form view.
 * @global array $options 
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<p></p>
<h1><?= __("General options", A::$config->i18n); ?></h1>

<?php
AForm::begin('general');
//Pages
AForm::section(array(
    'title' => __('', A::$config->i18n),
    'desc' => 'Description go here',
    'id' => 'page_section',
));

AForm::field($options, array(
    'label' => __('Company Name', A::$config->i18n),
    'name' => 'name',
    'type' => 'text',
    'desc_tip' => __('Tips go here', A::$config->i18n),
    'style' => 'min-width: 350px;',
    'required' => true
));

AForm::field($options, array(
    'label' => __('Description', A::$config->i18n),
    'name' => 'description',
    'type' => 'textarea',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;',
    'value' => '',
));

AForm::field($options, array(
    'label' => __('Logo', A::$config->i18n),
    'name' => 'logo',
    'type' => 'upload',
    //'desc' => __('', A::$config->i18n),
    //'style' => 'min-width: 350px;',
    'required' => true
));

AForm::field(null, array(
    'label' => __("Currency Code", A::$config->i18n),
    'name' => 'currency',
    'type' => 'text',
    //'style' => 'min-width: 350px;',
    'desc' => __('', A::$config->i18n),
    'value' => 'USD',
));

AForm::field($options, array(
    'label' => __('Invoice Payment Page', A::$config->i18n),
    'name' => 'page_id',
    'type' => 'single_select_page',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;',
));

AForm::sectionEnd('page_section');
?>

<?php
//Url Slug Settings
AForm::section(array(
    'title' => __('Url Slug Settings', A::$config->i18n),
    'desc' => '',
    'id' => 'other_section',
));
AForm::field($options, array(
    'label' => __("Invoice", A::$config->i18n),
    'name' => 'invoice',
    'type' => 'text',
    //'style' => 'min-width: 350px;',
    'desc' => __('', A::$config->i18n),
    'value' => 'inv',
));

AForm::field(null, array(
    'label' => __("Currency", A::$config->i18n),
    'name' => 'curSlug',
    'type' => 'text',
    //'style' => 'min-width: 350px;',
    'desc' => __('', A::$config->i18n),
    'value' => 'cur',
));

AForm::field($options, array(
    'label' => __('Amount', A::$config->i18n),
    'name' => 'amount',
    'type' => 'text',
    'desc' => __('Descriptio go here', A::$config->i18n),
    'value' => 100,
        //'custom_attributes' => array('required' => true)
));

AForm::field($options, array(
    'label' => __('Show currency in the URL?', A::$config->i18n),
    'name' => 'showCurrency',
    'type' => 'checkbox',
    'desc' => __('Yes', A::$config->i18n),
    'value' => 0
));

AForm::sectionEnd('other_section');
?> 
<p class='submit' id="col-left">
    <?=
    AHtml::tag('input', '', [
        'value' => __('Save Changes', A::$config->i18n),
        'name' => 'submit',
        'type' => 'submit',
        'class' => 'button button-primary'
    ]);
    ?>
</p>
<?php
echo '</form>';
