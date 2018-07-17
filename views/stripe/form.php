<?php
/*
 * Stripe form
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="pay-via-stripe">
    <table>
        <tr><td>Reservation # </td><td><?= $invoice ?></td></tr>
        <tr><td>Amount</td><td><?= $currency ?> <?= $amount ?></td></tr>
        <tr><td colspan="2" align="center">
                <form action="<?= $action ?>" method="POST" class="">
                    <script
                        src="https://checkout.stripe.com/checkout.js" 
                        class="<?= $class ?>"
                        data-key="<?= A::$plugin->options['mood'] ? A::$plugin->options['testPubKey'] : A::$plugin->options['pubKey'] ?>"
                        data-amount="<?= $amount * 100 ?>"
                        data-name="<?= A::$plugin->options['name'] ?>"
                        data-description="<?= A::$plugin->options['description'] ?> <?= $invoice ?>"
                        data-image="<?= A::$plugin->options['logo'] ?>"
                        data-locale="auto"
                        data-currency="<?= $currency ?>"
                        data-label = "<?= $label ?>"
                        >
                    </script>
                </form>
            </td>
        </tr>
    </table>
</div>