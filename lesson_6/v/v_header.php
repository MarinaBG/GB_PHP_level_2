<div class="header_top">
    <div class="h_top">
        <ul class="menu_top_header">
            <?include_once(__DIR__.'/../c/C_Top_menu_header.php');?>
        </ul>
        <?include_once('c/C_UserAccount.php');?>
    </div>
</div>

<div class="center_header">
<a class ="logo_header" href="#"><p class="logo_text_big">Мебель для Вас</p><p class="logo_text_small">Магазин мебели для дома и офиса</p></a>
<div class="menu_phone">
    <div class="tula">
        <p class="city_name">Тула:</p>
        <div class="phone">
            <p>+7 <span class="operator_code1">(920)</span><span class="phone1"> 123-01-61</span></p>
            <p>+7 <span class="operator_code2">(953)</span><span class="phone2"> 123-00-36</span></p>
        </div>
    </div>
    <div class="kireevsk">
        <p class="city_name">Киреевск:</p>
        <div class="phone">
            <p>+7 <span class="operator_code3">(910)</span><span class="phone3"> 616-88-17</span></p>
        </div>
    </div>
</div>
<div class="catalog_cart" id="cart">
        <h2>Корзина:</h2>
        <p>Товаров: <span class="cart_items_count"></span></p>
        <p>Сумма: <span class="total_price"></span></p>
        <div class="cart_action">
            <a href="index.php?c=page&act=order" class="get_order">Оформить заказ</a>
            <a href="#" class="btn-clear">Очистить</a>
        </div>        
</div>
</div>

<div class="tagline_line"><span class="tagline_text">Самый большой выбор мебели по самым низким ценам!</span></div>

<div class="bottom_line">
    <ul class="menu_bottom_header">
        <?include_once('c/C_Bottom_menu_header.php');?>
    </ul>
</div>
