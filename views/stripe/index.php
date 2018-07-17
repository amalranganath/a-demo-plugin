<?php
/**
 * index table view, using AGrid::view()
 * 
 */
$this->title = "Invoices";
?>
<div class="wrap">
    <h2><?= the_title() ?></h2>
    <?= AHtml::tag('a', "Create a new", ['href' => site_url('stripe/invoice'), 'class' => 'btn btn-primary']) ?>
    <?php
    ANotify::show();
    AGrid::view([
        'class' => 'JSInvoice',
        'search' => true,
        'columns' => [
            'id' => [
                'value' => function($item) {
                    return AHtml::tag('a', $item['id'], ['href' => site_url('stripe/invoice/' . $item['id'])]);
                },
                'sortable' => true,
                'actions' => function($item) {
                    return[
                        'edit' => AHtml::tag('a', 'Edit', ['href' => site_url('stripe/invoice/' . $item['id'])]),
                        'delete' => AHtml::tag('a', 'Delete', ['href' => sprintf("%s%s", site_url('stripe/delete/'), $item['id']), 'onclick' => "return confirm('Are sure you want to delete " . $item['id'] . "?');"]),
                    ];
                }
            ],
            'invoice' => ['sortable' => true, 'filter' => true],
            'amount' => ['label' => 'Amount $'],
            'currency',
            'link' => [
                'label' => "Link",
                'value' => function ($item) {
                    $link = get_permalink(A::$plugin->options['page_id']) . "?";
                    $link .= (A::$plugin->options['invoice'] != '' ? A::$plugin->options['invoice'] : 'inv' ) . "=" . $item['invoice'];
                    $link .= "&" . (A::$plugin->options['amount'] != '' ? A::$plugin->options['amount'] : 'amount') . "=" . $item['amount'];
                    if (A::$plugin->options['showCurrency'])
                        $link .= "&" . (A::$plugin->options['curSlug'] != '' ? A::$plugin->options['curSlug'] : 'cur') . "=" . $item['currency'];
                    return AHtml::tag('a', 'Go to pay', ['href' => $link, 'target' => 'blank']);
                }
            ]
        ],
        'footer' => false
    ]);
    ?>
</div>