<?php
require_once ('../config/config.php');

class Item {
	public $name;
	public $href;
	
	public function __construct($name, $href) {
		$this->name = $name;
		$this->href = $href;
	}	
}

class BottomMenuItem extends Item {
    public $categories;
    public $active;
	
	public function __construct($name, $href, $categories) {
		parent:: __construct($name, $href);
		$this->categories = $categories;
	}	
}

class TopMenuItem extends Item {
    public $active;
	
	public function __construct($name, $href) {
		parent:: __construct($name, $href);
	}	
}

class ItemCatalog extends Item{
    public $shortName;
    public $hit;
    public $latin_name;
	
	public function __construct($name, $href, $shortName, $hit, $latin_name) {
		parent:: __construct($name, $href);
        $this->shortName = $shortName;
        $this->hit = $hit;
        $this->latin_name = $latin_name;
	}	
}

function createTopMenuItemsObj ($arr) {
    $newArr = [];

    for ($i=0; $i < count($arr); $i++) {  
        array_push($newArr, new TopMenuItem($arr[$i][0], $arr[$i][1]));
    }

    return $newArr;
}

function createBottomMenuItemsObj ($arr) {
    $newArr = [];

    foreach ($arr as $key => $value) {    
        if (is_array($value)) {
            array_push($newArr, new BottomMenuItem($key, null, createBottomMenuItemsObj($value)));
        } else {
            array_push($newArr, new BottomMenuItem($value, "#", null));
        }
    }
    
    return $newArr;
}

function translitText($str) {
    $alphabet = array("а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e", "ё"=>"e", "ж"=>"zh", "з"=>"z", "и"=>"i", "й"=>"y","к"=>"k", "л"=>"l", "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "с"=>"s", "т"=>"t", "у"=>"u", "ф"=>"f", "х"=>"kh", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh", "щ"=>"shch", "ь"=>"", "ы"=>"y", "ъ"=>"", "э"=>"e", "ю"=>"yu", "я"=>"ya");
    $string = str_replace(" ", "_", mb_convert_case($str, MB_CASE_LOWER, "UTF-8"));
    return strtr($string, $alphabet);
}

function generateRandomStringStart($name, $length){
    $str = sha1($name);

    $string = '';
    
    $string.= substr($str, 0, 4);
   
    return $string;
}

function mb_ucfirst($str, $encoding='UTF-8') {
    $str = mb_ereg_replace('^[\ ]+', '', $str);
    $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
           mb_substr($str, 1, mb_strlen($str), $encoding);
    return $str;
}

function getProductForCatPage($tableNameSql, $count) {
    $arr = [];

    $num = NUM_OF_ITEMS + 1;
    
    try
    {
        $connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
        $db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);
        
        $result = $db->query("SELECT * FROM $tableNameSql 
            INNER JOIN category_name on $tableNameSql.category_name = category_name.id_cat 
            LIMIT $count, $num;");
        
        $error_array = $db->errorInfo();
    
        if($db->errorCode() != 0000)
    
        echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
    
        while($row = $result->fetch()){
            array_push($arr, new ItemCatalog($row['name'], '#', $row['short_name'], $row['hit'], $row['latin_name']));        
        }         
    }
    catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }

    return $arr;
}

function isCatalogFileExist($path, $name) {
    $filePath = $path.'/'.translitText($name);

    if (file_exists($filePath.'.jpeg')) {
        return '.jpeg';
    } elseif (file_exists($filePath.'.jpg')) {
        return '.jpg';
    } elseif (file_exists($filePath.'.png')) {
        return '.png';
    } else {
        return "";
    }
}

function drawCatalog($arr, $tableName) {
    $listItem = '';

    $itemNum = 0;
    $a=1;

    while($itemNum < count($arr) && $a <= NUM_OF_ITEMS) { 
        $listItem.=(createItem($arr[$itemNum], 'img/catalog/'.$tableName.'/list_'.$tableName));
        $a++;
        $itemNum++;
    } 

    return $listItem;
}

function drawCatalog2($arr, $tableName) {
    $listItem = '';

    $itemNum = 0;
    $a=1;

    while($itemNum < count($arr) && $a <= NUM_OF_ITEMS) { 
        $listItem.=(createItem($arr[$itemNum], '../public/img/catalog/'.$tableName.'/list_'.$tableName));
        $a++;
        $itemNum++;
    } 

    return $listItem;
}

function createItem($item, $path){  
    $list = ''; 

    if ($item->hit != 1) {
        $list.= '<div class="product_item">
            <span class="img" style="background-image: url(\''.$path.'/'.translitText($item->name).isCatalogFileExist($path, $item->name).'\')"></span>
            <div class="text_product_item">
                <div class="case">
                    <p class="category_product_item">'.mb_ucfirst($item->shortName).'</p>
                    <p class="uppercase">'.$item->name.'</p>
                </div>
                <a href="'.$item->href.'" onclick="return false">Подробнее</a>
            </div>
        </div>';
    }
    else {
        $list.= '<div class="product_item">
            <img class="corner_hit" src="../public/img/corner_little.png" alt="нет картинки">                              
            <p class="corner_hit_text uppercase">хит!</p>
            <span class="img" style="background-image: url(\''.$path.'/'.translitText($item->name).isCatalogFileExist($path, $item->name).'\')"></span>
            <div class="text_product_item">
                <div class="case">
                    <p class="category_product_item">'.mb_ucfirst($item->shortName).'</p>
                    <p class="uppercase">'.$item->name.'</p>
                </div>
                <a href="'.$item->href.'" onclick="return false">Подробнее</a>
            </div>
        </div>';
    }

    return $list; 
}








