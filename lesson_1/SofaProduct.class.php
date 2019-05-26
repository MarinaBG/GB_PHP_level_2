<?php
include "Product.class.php";

class SofaProduct extends Product{
    private $size;
    private $bed_size;
    private $transformation;
    private $upholstery;
    private $color;
    private $filling;

    function __construct($name, $category_name, $factory_name, $general_info, $price, $count, $size, $bed_size, $transformation, $upholstery, $filling){
        parent:: __construct($name, $category_name, $factory_name, $general_info, $price, $count);
        $this->setSize($size);
        $this->setBedSize($bed_size);
        $this->setTransformation($transformation);
        $this->setUpholstery($upholstery);
        $this->setFilling($filling);
    }
    
    protected function setSize($size){
        $this->size = $size;
    }
    protected function setBedSize($bed_size){
        $this->bed_size = $bed_size;
    }
    protected function setTransformation($transformation){
        $this->transformation = $transformation;
    }
    protected function setUpholstery($upholstery){
        $this->upholstery = $upholstery;
    }
    protected function setFilling($filling){
        $this->filling = $filling;
    }

    protected function getSize(){
        return $this->size;
    }
    protected function getBedSize(){
        return $this->bed_size;
    }
    protected function getTransformation(){
        return $this->transformation;
    }
    protected function getUpholstery(){
        return $this->upholstery;
    }
    protected function getFilling(){
        return $this->filling;
    }
    
    protected function drawSize(){
        return "<p><b>Размеры (ДхШхВ): </b>".$this->size." мм</p>";
    }
    protected function drawBedSize(){
        return "<p><b>Размеры спального места (ДхШ): </b>".$this->bed_size." мм</p>";
    }
    protected function drawTransformation(){
        return "<p><b>Механизм трансформации: </b>".$this->transformation."</p>";
    }
    protected function drawUpholstery(){
        return "<p><b>Материал обивки: </b>".$this->upholstery."</p>";
    }
    protected function drawFilling(){
        return "<p><b>Наполнение: </b>".$this->filling."</p>";
    }

    function showDescription(){
        echo parent::showStartProductDescription();
        echo $this->drawSize().$this->drawBedSize().$this->drawTransformation().$this->drawFilling().$this->drawUpholstery();
        echo parent::showEndProductDescription();
    }
}

$sofa1 = new SofaProduct("Томас", "Прямой диван", "ТриЯ", "Практичный диван на металлокаркасе, с механизмом раздвижения на каждый день. Опоры – массив бука, наполнение подушек – холофайбер.", 37999, 5, "2380х1060х830", "1950х1500", "еврокнижка тик-так", "велюр", "ППУ; синтепон; войлок; независимый пружинный блок");
$sofa1->showDescription();

