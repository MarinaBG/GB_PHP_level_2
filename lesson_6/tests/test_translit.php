<?
include_once(__DIR__.'/../m/model.php');
use PHPUnit\Framework\TestCase;

class TranslitTest extends TestCase{
	/**
	*@dataProvider translitProvider
	*/
	public function testTranslitText($str, $expected){
		$result = translitText($str);
		$this->assertSame($expected, $result);
	}
	
	public function translitProvider(){
		return [
			['', ''],
			[null, ''],
			['готовые кухни', 'gotovye_kukhni'],
			['шкафы-купе', 'shkafy-kupe'],
			['Ника 2', 'nika_2'],
			['Sherlock', 'sherlock'],
		];
	}
}