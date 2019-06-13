<?php
include_once('config/config.php');
include_once('m/model.php');

class CatalogPage {
    private $tableNameSql;
    private $productsArr;

    public function __construct() {
        $this->tableNameSql = (!empty($_GET["cat"]))?strip_tags($_GET["cat"]):"gotovye_kukhni";
        $this->productsArr = getProductForCatPage($this->tableNameSql, 0);
    }

    function checkIsDisable() {
        if (count($this->productsArr) > NUM_OF_ITEMS) {
            return "<p class='show_more' count='".NUM_OF_ITEMS."'>Показать еще</p>";
        }
        return "<p class='show_more' count='".count($this->productsArr)."' style='display:none'>Показать еще</p>";
    }

    function showCatalog(){      
        $str = drawCatalog($this->productsArr, $this->tableNameSql);    
        return $str;     
    }

    function getNameCat(){
        for ($i=0; $i < 1; $i++) { 
            return mb_ucfirst($this->productsArr[$i][8], $encoding='UTF-8');
        }
    }
}

$catalogPage = new CatalogPage();










