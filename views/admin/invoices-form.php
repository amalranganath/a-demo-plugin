<?php
/**
 * @view form
 */
if (!defined('ABSPATH')) {
    exit;
}

AForm::begin();

AForm::section(array(
    'title' => __('', A::$config->i18n),
    'desc' => '',
    'name' => 'invoice_section',
));

AForm::field($this->model, array(
    'label' => __('Invoice Number', A::$config->i18n),
    'name' => 'invoice',
    'type' => 'text',
    'placeholder' => 'Invioce number',
    'desc' => __('Field description', A::$config->i18n),
    'desc_tip' => true,
    'style' => 'min-width: 350px;',
    'required' => true
));

AForm::field($this->model, array(
    'label' => __('Amount', A::$config->i18n),
    'name' => 'amount',
    'type' => 'text',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;',
    'required' => true
));

AForm::field($this->model, array(
    'label' => __('Currency (optional)', A::$config->i18n),
    'name' => 'currency',
    'type' => 'text',
    'value' => 'USD',
    'style' => 'min-width: 350px;',
        //'required' => true
));

AForm::field($this->model, array(
    'label' => __('Notes (for admin)', A::$config->i18n),
    'name' => 'adminnotes',
    'type' => 'textarea',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;height:75px;',
        //'required' => true
));

AForm::sectionEnd('invoice_section');

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
