<?php
/**
 * Invoice form view.
 * 
 */
?>

<h1><?= __("Invoices", A::$config->i18n); ?> <a href="<?= admin_url("admin.php?page=$this->page&action=create") ?>" class="page-title-action">Create a invoice</a></h1>

<p></p>

<?php
//display noticess
ANotify::show();
AGrid::view([
    'class' => 'JSInvoice',
    'search' => true,
    'columns' => [
        //'cb',
        'id' => [
            'value' => function($item) {
                return " <a href='#'>" . $item['id'] . "</a>";
            },
            'sortable' => true,
            'filter' => true,
            'actions' => function($item) {
                return[
                    //'clone' => sprintf('<a href="?page=%s&action=clone&id=%s">Clone</a>', $_REQUEST['page'], $item['id']),
                    'edit' => sprintf('<a href="?page=%s&action=update&id=%s">Edit</a>', $this->page, $item['id']),
                    'delete' => sprintf('<a href="?page=%s&action=delete&id=%s&paged=%s" onclick="%s">Delete</a>', $this->page, $item['id'], isset($_REQUEST['paged']) ? $_REQUEST['paged'] : '', "return confirm('Are sure you want to delete " . $item['id'] . "?');"),
                ];
            }
        ],
        'invoice' => ['sortable' => true],
        'amount' => [],
        'currency',
        'link' => [
            'label' => "Link",
            'value' => function ($item) {
                $link = get_permalink(A::$plugin->options['page_id']) . "?";
                $link .= (A::$plugin->options['invoice'] != '' ? A::$plugin->options['invoice'] : 'inv' ) . "=" . $item['invoice'];
                $link .= "&" . (A::$plugin->options['amount'] != '' ? A::$plugin->options['amount'] : 'amount') . "=" . $item['amount'];
                if (A::$plugin->options['showCurrency'])
                    $link .= "&" . (A::$plugin->options['curSlug'] != '' ? A::$plugin->options['curSlug'] : 'cur') . "=" . $item['currency'];
                return " <a href='$link' target='blank' >Go to pay</a>";
            }
        ]
    ],
]);
?>