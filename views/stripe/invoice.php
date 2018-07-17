<?php
/**
 * @view : form link
 */
if (!defined('ABSPATH')) {
    exit;
}
$this->title = $model->id ? "Update #$model->id" : "Create an invoice";
?>
<div class="wrap">

    <?= the_title('<h2>', '</h2>') ?>

    <?php
    //Form API
    AForm::begin('form-invoice');

    AForm::section(array(
        //'title' => __('Create a invoice', A::$config->i18n),
        'desc' => '',
        'id' => 'api',
    ));

    AForm::field($model, array(
        //'label' => __('Invoice', A::$config->i18n),
        'name' => 'invoice',
        'type' => 'text',
        'desc' => __('Field Description', A::$config->i18n),
        'style' => 'min-width: 350px;',
        'required' => true
    ));

    AForm::field($model, array(
        'label' => __('Amount', A::$config->i18n),
        'name' => 'amount',
        'type' => 'text',
        'class' => 'form-control',
        'style' => 'min-width: 350px;',
        'required' => true
    ));

    AForm::field($model, array(
        'label' => __('Currency (optional)', A::$config->i18n),
        'name' => 'currency',
        'type' => 'text',
        //'desc' => __('', A::$config->i18n),
        'style' => 'min-width: 350px;',
        'required' => true
    ));

    AForm::field($model, array(
        'label' => __('Notes (for admin)', A::$config->i18n),
        'name' => 'adminnotes',
        'type' => 'textarea',
        //'desc' => __('', A::$config->i18n),
        'style' => 'min-width: 350px;height:75px;',
    ));

    AForm::sectionEnd('api_section');
    
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
    
    <?php AForm::end(); ?>
    
</div>