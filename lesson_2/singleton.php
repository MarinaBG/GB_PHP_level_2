<?
// Пример с товаром просто взяла для наглядности 

trait setProduct {
    function setId($id){
        $this->id = $id;
    }
    function setName($name){
        $this->name = $name;
    }
    function setPrice($price){
        $this->price = $price;
    }
    function setCount($count){
        $this->count = $count;
    }
}

trait getObj {
    public static function getObject($id, $name, $price, $count){
        if(self::$objProduct == null){
            self::$objProduct = new Product($id, $name, $price, $count);
        }
        return self::$objProduct; 
    } 
}

class Product {
    protected static $objProduct;
    
    private function __construct($id, $name, $price, $count){
        $this->setId($id);
        $this->setName($name);
        $this->setPrice($price);
        $this->setCount($count);
    }
    use setProduct;
    use getObj;
}

$product1 = Product::getObject(12456, "Книга 1", "836 р.", 3);
print_r($product1); //видим, что singletone-объекта еще небыло, поэтому он создался 
$product2 = Product::getObject(12789, "Книга 2", "836 р.", 3); 
print_r($product2); //проверка, что singletone-объект существует и новый уже не создается - вывод на экран такой же как при создании первого singletone-объекта.