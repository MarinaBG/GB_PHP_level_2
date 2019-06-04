<?
require_once ('../config/config.php');
require_once "../general/general.php";
require_once "../controllers/top_menu_header.php";
?>

<div class="header_top"><ul class="menu_top_header">

<? checkMenutopActivity($arrayTopMenuItems); ?>
<? createTopMenu($arrayTopMenuItems); ?>

</div></ul>


