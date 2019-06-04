<?php
require_once ('../config/config.php');
require_once ("../general/general.php");


$tableNameSql = str_replace("-", "_", ((explode(".", end(explode("/", $_SERVER["PHP_SELF"]))))[0]));
$tableName = str_replace(",", "", ((explode(".", end(explode("/", $_SERVER["PHP_SELF"]))))[0]));

$arr = getProductForCatPage($tableNameSql, 0);

function checkIsDisable($arr) {
    if (count($arr) > NUM_OF_ITEMS) {
        return "<p class='show_more' count='".NUM_OF_ITEMS."'>Показать еще</p>";
    }
    return "<p class='show_more' count='".count($arr)."' style='display:none'>Показать еще</p>";
}









