<?php
/**
 * Stripe Api Details form view.
 * @global array $options 
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<h1><?= __("Stripe API Details", A::$config->i18n); ?></h1>

<?php
AForm::begin('');
//API
AForm::section(array(
    'title' => __('', A::$config->i18n),
    'desc' => '',
    'id' => 'api_section',
));

AForm::field($options, array(
    'label' => __('Publishable Key (live)', A::$config->i18n),
    'name' => 'pubKey',
    'type' => 'text',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;',
    'default' => '',
    'custom_attributes' => array('required' => true)
));

AForm::field($options, array(
    'label' => __('Publishable Key (test)', A::$config->i18n),
    'name' => 'testPubKey',
    'type' => 'text',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;',
    'default' => '',
    'custom_attributes' => array('required' => true)
));

AForm::field($options, array(
    'label' => __('Secret Key (live)', A::$config->i18n),
    'name' => 'apiKey',
    'type' => 'text',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;',
    'default' => '',
    'custom_attributes' => array('required' => true)
));

AForm::field($options, array(
    'label' => __('Secret Key (test)', A::$config->i18n),
    'name' => 'testApiKey',
    'type' => 'text',
    //'desc' => __('', A::$config->i18n),
    'style' => 'min-width: 350px;',
    'default' => '',
    'custom_attributes' => array('required' => true)
));

AForm::field($options, array(
    'label' => __('Test Mood', A::$config->i18n),
    'name' => 'mood',
    'type' => 'checkbox',
    'desc' => __('Enable', A::$config->i18n),
    'default' => 0
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
<?php
echo '</form>';
