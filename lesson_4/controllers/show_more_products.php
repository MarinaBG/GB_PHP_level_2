<?php
require_once ('../config/config.php');
require_once ("../general/general.php");

$tableNameSql = str_replace("-", "_", ((explode(".", end(explode("/", $_SERVER["HTTP_REFERER"]))))[0]));
$tableName = str_replace(",", "", ((explode(".", end(explode("/", $_SERVER["HTTP_REFERER"]))))[0]));

$count = $_POST['count'];

function setCount($arr) {
    if (count($arr) > NUM_OF_ITEMS) {
        return NUM_OF_ITEMS;
    }
    return count($arr);
}

function checkIsDisable ($arr) {
    if (count($arr) > NUM_OF_ITEMS) {
        return 1;
    }
    return 0;
}

$arrForProducts = getProductForCatPage($tableNameSql, $count);
$drawCatalogPart = drawCatalog2($arrForProducts, $tableName);

print_r(json_encode([$drawCatalogPart, setCount($arrForProducts), checkIsDisable($arrForProducts)]));