<?php
class Product{
    private $name;
    private $category_name;
    private $factory_name;
    private $general_info;
    private $price;
    private $count;

    function __construct($name, $category_name, $factory_name, $general_info, $price, $count){
        $this->setName($name);
        $this->setImg($name);
        $this->setCategoryName($category_name);
        $this->setFactoryName($factory_name);
        $this->setGeneralInfo($general_info);
        $this->setPrice($price);
        $this->setCount($count);
    }
    
    protected function setName($name){
        $this->name = $name;
    }
    protected function setImg($name){
        $this->img = "img/".$name.".jpg";
    }
    protected function setCategoryName($category_name){
        $this->category_name = $category_name;
    }
    protected function setFactoryName($factory_name){
        $this->factory_name = $factory_name;
    }
    protected function setGeneralInfo($general_info){
        $this->general_info = $general_info;
    }
    protected function setPrice($price){
        $this->price = $price;
    }
    protected function setCount($count){
        $this->count = $count;
    }

    protected function getName(){
        return $this->name;
    }
    protected function getImg(){
        return $this->img;
    }
    protected function getCategoryName(){
        return $this->category_name;
    }
    protected function getFactoryName(){
        return $this->factory_name;
    }
    protected function getGeneralInfo(){
        return $this->general_info;
    }
    protected function getPrice(){
        return $this->price;
    }
    protected function getCount(){
        return $this->count;
    }
    
    protected function drawName(){
        return "<h1>".$this->category_name." ".$this->name."</h1>";
    }
    protected function drawImg(){
        return "<img src=".$this->img." style='width: 300px;'>";
    }
    protected function drawGeneralInfo(){
        return "<p>".$this->general_info."</p>";
    }
    protected function drawFactoryName(){
        return "<p><b>Производитель: </b>".$this->factory_name."</p>";
    }
    protected function drawPrice(){
        return "<p><b>Стоимость товара: </b>".$this->price." ₽</p>";
    }
    protected function drawCount(){
        return "<p><b>Количество товара в наличии на складе: </b>".$this->count." шт.</p>";
    }

    protected function showStartProductDescription(){
        return $this->drawName().$this->drawImg().$this->drawGeneralInfo();
    }
    protected function showEndProductDescription(){
        return $this->drawPrice().$this->drawFactoryName().$this->drawCount();
    }

    function showDescription(){
        echo $this->showStartProductDescription().$this->showEndProductDescription();
    }
}

/* $productItem = new Product("Товар", "Категория товара", "ОАО Фабрика", "Здесь должно быть общее описание товара", "стоит дешевле некуда", "надо срочно брать! - осталась 1");
$productItem->showProductDescription(); */
