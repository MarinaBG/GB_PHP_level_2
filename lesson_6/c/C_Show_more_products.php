<?php
require_once ('../config/config.php');
require_once ("../m/model.php");

class ShowMoreProducts {
    private $tableNameSql;
    private $productsArr;
    private $count;

    public function __construct() {
        $this->tableNameSql = (!empty($_GET["cat"]))?strip_tags($_GET["cat"]):"gotovye_kukhni";
        $this->count = (!empty($_POST["count"]))?strip_tags($_POST["count"]):"0";
        $this->productsArr = getProductForCatPage($this->tableNameSql, $this->count);
    }

    function setCount() {
        if (count($this->productsArr) > NUM_OF_ITEMS) {
            return NUM_OF_ITEMS;
        }
        return count($this->productsArr);
    }
    
    function checkIsDisable () {
        if (count($this->productsArr) > NUM_OF_ITEMS) {
            return 1;
        }
        return 0;
    } 

    function showCatalog(){      
        $str = drawCatalog2($this->productsArr, $this->tableNameSql);    
        return $str;     
    }

    function response(){
        return json_encode([$this->showCatalog(), $this->setCount(), $this->checkIsDisable()]);
    }
}

$moreProducts = new ShowMoreProducts();
print_r($moreProducts->response());

// $tableNameSql = $_GET['cat'];
// $tableName = str_replace(",", "", ((explode(".", end(explode("/", $_SERVER["HTTP_REFERER"]))))[0]));
// //echo $tableNameSql;
// $count = (!empty($_POST["count"]))?strip_tags($_POST["count"]):"0";
// // print_r($_POST);
// // print_r($count);

// function setCount($arr) {
//     if (count($arr) > NUM_OF_ITEMS) {
//         return NUM_OF_ITEMS;
//     }
//     return count($arr);
// }

// function checkIsDisable ($arr) {
//     if (count($arr) > NUM_OF_ITEMS) {
//         return 1;
//     }
//     return 0;
// }

// $arrForProducts = getProductForCatPage($tableNameSql, $count);
// $drawCatalogPart = drawCatalog2($arrForProducts, $tableName);

// print_r(json_encode([$drawCatalogPart, setCount($arrForProducts), checkIsDisable($arrForProducts)]));