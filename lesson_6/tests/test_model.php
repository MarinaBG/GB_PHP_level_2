<?
include_once(__DIR__.'/../m/model.php');
use PHPUnit\Framework\TestCase;

const USER_ID = 1;


class ModelTest extends TestCase{
	public function testGetCartState(){
		clearCart(USER_ID);

		$rows = getCartState(USER_ID);
		$this->assertSame(0,count($rows));
	}
	
	public function testAddProductToCart(){
		clearCart(USER_ID);

		$rows = getCartState(USER_ID);
		$this->assertSame(0,count($rows));

		addProductToCart(USER_ID, 11, 20000);

		$rows = getCartState(USER_ID);
		$this->assertSame(1,count($rows));

		$row = $rows[0];
		$this->assertSame(8,count($row));
	}
}
