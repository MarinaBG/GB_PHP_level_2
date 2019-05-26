<?php
include "Product.class.php";

class KitchenProduct extends Product{
    private $length;
    private $facade_color;
    private $body_color;
    private $facade_material;
    private $body_material;

    function __construct($name, $category_name, $factory_name, $general_info, $price, $count, $length, $facade_color, $body_color, $facade_material, $body_material){
        parent:: __construct($name, $category_name, $factory_name, $general_info, $price, $count);
        $this->setLength($length);
        $this->setFacadeColor($facade_color);
        $this->setBodyColor($body_color);
        $this->setFacadeMaterial($facade_material);
        $this->setBodyMaterial($body_material);
    }
    
    protected function setLength($length){
        $this->length = $length;
    }
    protected function setFacadeColor($facade_color){
        $this->facade_color = $facade_color;
    }
    protected function setBodyColor($body_color){
        $this->body_color = $body_color;
    }
    protected function setFacadeMaterial($facade_material){
        $this->facade_material = $facade_material;
    }
    protected function setBodyMaterial($body_material){
        $this->body_material = $body_material;
    }

    protected function getLength(){
        return $this->length;
    }
    protected function getFacadeColor(){
        return $this->facade_color;
    }
    protected function getBodyColor(){
        return $this->body_color;
    }
    protected function getFacadeMaterial(){
        return $this->facade_material;
    }
    protected function getBodyMaterial(){
        return $this->body_material;
    }
    
    protected function drawLength(){
        return "<p><b>Длина: </b>".$this->length."</p>";
    }
    protected function drawFacadeColor(){
        return "<p><b>Цвет фасада: </b>".$this->facade_color."</p>";
    }
    protected function drawBodyColor(){
        return "<p><b>Цвет корпуса: </b>".$this->body_color."</p>";
    }
    protected function drawFacadeMaterial(){
        return "<p><b>Материал фасада: </b>".$this->facade_material."</p>";
    }
    protected function drawBodyMaterial(){
        return "<p><b>Материал корпуса: </b>".$this->body_material."</p>";
    }

    function showDescription(){
        echo parent::showStartProductDescription();
        echo $this->drawLength().$this->drawFacadeColor().$this->drawBodyColor().$this->drawFacadeMaterial().$this->drawBodyMaterial();
        echo parent::showEndProductDescription();
    }
}

$kitchen1 = new KitchenProduct("Афина", "Кухня", "БТС", "Кухня Афина - это классика в современной интерпретации. Теплый тон отделки оживит любой интерьер. Фасад МДФ повторяет текстуру натурального шпона, а фреза в виде ромбов на фасадах и стекле, придает особое очарование этой модели. Фасады можно миксовать, подбирая нужный вариант исполнения по цветовой гамме.", 13740, 3, "2400 мм", "Арктик; Айс; Сирень; Арктик", "Арктик; Айс", "МДФ", "ЛДСП");
$kitchen1->showDescription();

