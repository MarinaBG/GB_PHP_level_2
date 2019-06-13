<?php
include_once(__DIR__.'/../m/model.php');

class C_Cart {
    // private $productCount;
    // private $totalPrice;
    private $method;
    private $userId;

    public function __construct() {
        $this->method = isset($_GET['method']) && in_array($_GET['method'], array('clear', 'add', 'get', 'remove')) ? $_GET['method'] : false;
        if (!$this->method) {
            die("Отсутствует метод корзины");
        }
        $this->userId = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : false;
        if (!$this->userId) {
            die("Ошибка авторизации");
        }
        // $this->tableNameSql = (!empty($_GET["cat"]))?strip_tags($_GET["cat"]):"gotovye_kukhni";
        // $this->productsArr = getProductForCatPage
    }

    function execute() {
        switch ($this->method) {
            case 'get':
                return $this->onGet();
            case 'add':
                return $this->onAdd();
            case 'clear':
                return $this->onClear();
            default:
                die("Неверный метод");
        }
    }

    function onGet(){
        $cartArr = getCartState($this->userId);
        $totalPrice = 0;

        foreach ($cartArr as $key => $value) {
            $totalPrice+=$value['price'];
        } 

        return [ count($cartArr), $totalPrice ];
    }

    function onAdd(){
        $productId = isset($_GET['id']) ? $_GET['id'] : false;
        $category = isset($_GET['category']) ? $_GET['category'] : false;
        $price = getProductPriceById($productId, $category);
        // $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : false;
        addProductToCart($this->userId, $productId, $price);
        return $this->onGet();
    }

    function onClear(){
        clearCart($this->userId);
        return $this->onGet();
    }
}

$cart = new C_Cart();
echo json_encode($cart->execute());
/* echo json_encode($_GET); */

// session_start();

// $response = '';

// $id = isset($_GET['id']) && is_numeric($_GET['id']) && isset($products[$_GET['id']]) ? intval($_GET['id']) : false;
// $method = isset($_GET['method']) && in_array($_GET['method'], array('clear', 'add', 'get', 'remove')) ? $_GET['method'] : false;
// $response = array('result' => 0);

// if ( $method ) {
// 	switch ( $method ) {
// 		case 'get':
// 			$items = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
// 			$response = array(
// 				'result' => 1,
// 				'items' => array_values($items)
// 			);
// 			break;
// 		case 'add':
// 			if ( $id ) {
// 				$items = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
// 				$item = $products[$id];
// 				if ( isset($items[$id]) ) {
// 					++$items[$id]['count'];
// 				} else {
// 					$items[$id] = $item;
// 					$items[$id]['count'] = 1;
// 				}
// 				$_SESSION['cart'] = $items;
// 				$response = array(
// 					'result' => 1,
// 					'item' => $items[$id]
// 				);
// 			}
// 			break;
// 		case 'remove':
// 			if ( $id ) {
// 				$items = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

// 				if ( isset($items[$id]) ) {
// 					if ( $items[$id]['count'] > 1 ) {
// 						--$items[$id]['count'];
// 					} else {
// 						unset($items[$id]);
// 					}
// 					$_SESSION['cart'] = $items;
// 					$response = array(
// 						'result' => 1,
// 						'id' => $id
// 					);
// 				}
// 			}
// 			break;
// 		case 'clear':
// 			$_SESSION['cart'] = array();
// 			$response = array('result' => 1);
// 			break;
// 		default:
// 			$response = array('result' => 0);
// 			break;
// 	}
// }

// echo json_encode($response);
