<?
abstract class Good {
    protected const GOOD_BASE_PRICE = 750;
    protected $name;
    protected $finalItemPrice;
    protected $sales_income;

    function __construct($name) {
        $this->setName($name);
        $this->finalItemPrice = $this->getItemFinalPrice();
        $this->sales_income = $this->getSalesIncome();
    }

    protected function setName($name){
        $this->name = $name;
    }

    protected function getName(){
        return $this->name;
    }

    abstract protected function getItemFinalPrice();
    abstract protected function getSalesIncome();
    abstract protected function showGoodInformation();
}


class DigitalGood extends Good {
    private $numberОfСopies;

    function __construct($name, $numberОfСopies) {
        $this->setNumberОfСopies($numberОfСopies);
        parent:: __construct($name);
    }

    protected function setNumberОfСopies($numberОfСopies){
        $this->numberОfСopies = $numberОfСopies;
    }

    protected function getItemFinalPrice() {
        return round(self::GOOD_BASE_PRICE / 2);
    } 

    protected function getSalesIncome() {
        return $this->finalItemPrice * $this->numberОfСopies;
    }

    function showGoodInformation() {
        $str = "<h3>Цифровой товар</h3>
        <b>Наименование товара: </b>".$this->name."<br>
        <b>Стоимость единицы товара: </b>".$this->finalItemPrice." ₽<br>
        <b>Количество копий: </b>".$this->numberОfСopies." шт.<br>
        <b>Доход с продаж составляет: </b>".$this->sales_income." ₽<br><br>";

        echo $str;
    }
}

class PieceGood extends Good {
    private $amount;

    function __construct($name, $amount) {
        $this->setAmount($amount);
        parent:: __construct($name);
    }

    protected function setAmount($amount){
        $this->amount = $amount;
    }

    protected function discountPriceCalculation($amount){
        if ($amount <= 3) {
            return self::GOOD_BASE_PRICE; 
        }
        if ($amount > 3 && $amount < 10) {
            return round((self::GOOD_BASE_PRICE - (self::GOOD_BASE_PRICE * 0.05)), 2);
        }
        if ($amount >= 10) {
            return round(self::GOOD_BASE_PRICE - (self::GOOD_BASE_PRICE * 0.1), 2);
        }          
    }

    protected function getItemFinalPrice() {
        return $this->discountPriceCalculation($this->amount);
    } 

    protected function getSalesIncome() {
        return $this->finalItemPrice * $this->amount;
    }

    function showGoodInformation() {
        $str = "<h3>Физический штучный товар</h3>
        <b>Наименование товара: </b>".$this->name."<br>
        <b>Стоимость единицы товара: </b>".$this->finalItemPrice." ₽<br>
        <b>Количество товаров: </b>".$this->amount." шт.<br>
        <b>Доход с продаж составляет: </b>".$this->sales_income." ₽<br><br>";

        echo $str;
    }
}

class GoodByWeight extends Good {
    private $itemWeight;
    private $weight;

    function __construct($name, $weight) {
        $this->setWeight($weight);
        $this->itemWeight = 0.5;
        parent:: __construct($name);
    }

    protected function setWeight($weight){
        $this->weight = $weight;
    } 

    protected function discountPriceCalculation($weight){
        if ($weight <= 5) {
            return self::GOOD_BASE_PRICE; 
        }
        if ($weight > 5 && $weight < 15) {
            return round((self::GOOD_BASE_PRICE - (self::GOOD_BASE_PRICE * 0.05)), 2);
        }
        if ($weight >= 15) {
            return round(self::GOOD_BASE_PRICE - (self::GOOD_BASE_PRICE * 0.1), 2);
        }          
    }

    protected function getItemFinalPrice() {
        return $this->discountPriceCalculation($this->weight);
    } 

    protected function getSalesIncome() {
        return ($this->finalItemPrice * $this->weight) / $this->itemWeight;
    }

    function showGoodInformation() {
        $str = "<h3>Товар на вес</h3>
        <b>Наименование товара: </b>".$this->name."<br>
        <b>Стоимость единицы товара: </b>".$this->finalItemPrice." ₽<br>
        <b>Количество килограммов: </b>".$this->weight." кг.<br>
        <b>Доход с продаж составляет: </b>".$this->sales_income." ₽<br><br>";

        echo $str;
    }
}

$digitalGood = new DigitalGood('Цифровой товар 1', 1);
$digitalGood->showGoodInformation(); 
$pieceGood = new PieceGood('Штучный товар 1', 6);
$pieceGood->showGoodInformation();
$goodByWeight = new GoodByWeight('Товар на вес 1', 15);
$goodByWeight->showGoodInformation();  