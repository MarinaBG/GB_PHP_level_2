<?include_once(__DIR__.'/../c/C_Catalog_product_category_page.php');?>

<nav class="breadcrumbs_wrapper">
    <ul class="breadcrumbs">
        <li><a href="#">Главная</a></li>
        <li><a href="#">Каталог</a></li>
        <li class="active"><?=$catalogPage->getNameCat();?></li>
    </ul>
</nav>
            
<div class="catalog_wrapper">
    <section class="product_category_page">
        <h2 class="uppercase"><?=$catalogPage->getNameCat();?></h2>
        <div class="product_category_items">
            <div class="items">
                <?=$catalogPage->showCatalog();?>
            </div>
        </div>
        <div class="catalog_pagi">
            <?=$catalogPage->checkIsDisable();?>
        </div>            
    </section>                
</div>


