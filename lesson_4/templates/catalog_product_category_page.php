<?php require_once ('../controllers/catalog_product_category_page.php'); ?>

<div class="product_category_items">
    <div class="items">
        <?=drawCatalog($arr, 'gotovye_kukhni'); ?>
    </div>
</div>
<div class="catalog_pagi">
    <?=checkIsDisable($arr); ?>
</div> 

