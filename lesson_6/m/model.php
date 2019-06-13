<?php
include_once(__DIR__.'/../config/config.php');

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
    $num = NUM_OF_ITEMS + 1;
    
    try
    {
        $connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
        $db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);
        $sql = "SELECT * FROM $tableNameSql 
            INNER JOIN category_name on $tableNameSql.category_name = category_name.id_cat 
            LIMIT $count, $num;";
        //echo $sql;

        $result = $db->query($sql);

        $error_array = $db->errorInfo();
    
        if($db->errorCode() != 0000)   
            echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
    
        $rows = $result->fetchAll();
        //$rows = array();
        return $rows;
    }
    catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }
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
        $listItem.=(createItem($arr[$itemNum], '', 'v/img/catalog/'.$tableName.'/list_'.$tableName, $tableName));
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
        $listItem.=(createItem($arr[$itemNum], '../','v/img/catalog/'.$tableName.'/list_'.$tableName, $tableName));
        $a++;
        $itemNum++;
    } 

    return $listItem;
}

function createItem($item, $baseDir, $path, $tableName){  
    $list = ''; 

    if ($item[2] != 1) {
        $list.= '<div class="product_item product-'.$item[0].'">
            <span class="img" style="background-image: url(\''.$path.'/'.translitText($item[1]).isCatalogFileExist($baseDir.$path, $item[1]).'\')"></span>
            <div class="text_product_item">
                <div class="case">
                    <p class="category_product_item">'.mb_ucfirst($item[7]).'</p>
                    <p class="uppercase">'.$item[1].'</p>
                    <p class="price">'.$item[5].' ₽</p>
                </div>
                <div class="buttons">
                    <a href="#" onclick="return false">Подробнее</a>
                    <a href="#" class="btn-add" data-id="'.$item[0].'" category="'.$tableName.'">Купить</a>
                </div>
            </div>
        </div>';
    }
    else {
        $list.= '<div class="product_item product-'.$item[0].'">
            <img class="corner_hit" src="v/img/corner_little.png" alt="нет картинки">                              
            <p class="corner_hit_text uppercase">хит!</p>
            <span class="img" style="background-image: url(\''.$path.'/'.translitText($item[1]).isCatalogFileExist($baseDir.$path, $item[1]).'\')"></span>
            <div class="text_product_item">
                <div class="case">
                    <p class="category_product_item">'.mb_ucfirst($item[7]).'</p>
                    <p class="uppercase">'.$item[1].'</p>
                    <p class="price">'.$item[5].' ₽</p>
                </div>
                <div class="buttons">
                    <a href="#" onclick="return false">Подробнее</a>
                    <a href="#" class="btn-add" data-id="'.$item[0].'" category="'.$tableName.'">Купить</a>
                </div>
            </div>
        </div>';
    }

    return $list; 
}

function checkUser($login, $pass) {        
	try
	{
		$connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
		$db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);
		
		$result = $db->query("select * from users where login='$login' and pass=md5('$pass')");
		
		$error_array = $db->errorInfo();
	
		if($db->errorCode() != 0000) {
			die("SQL ошибка: " . $error_array[2] . '<br /><br />');
		}           
		
		$row = $result->fetch();
		return [$row['name'], $row['id']];       
	}
	catch(PDOException $e)
	{
		die("Error: ".$e->getMessage());
	}
}

function getCartState($userId) {
    try
    {
        $connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
        $db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);

        $sql = "SELECT * FROM basket WHERE user_id=$userId;";
        //echo $sql;

        $result = $db->query($sql);

        $error_array = $db->errorInfo();
    
        if($db->errorCode() != 0000)   
            echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
    
        $rows = $result->fetchAll();
        return $rows;
    }
    catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }
}

function addProductToCart($userId, $productId, $price) {
    try
    {
        $connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
        $db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);

        $sql = "INSERT INTO basket (`user_id`, `product_id`, `price`) VALUES
        ($userId, $productId, $price);";
        //echo $sql;

        $result = $db->exec($sql);

        $error_array = $db->errorInfo();
    
        if($db->errorCode() != 0000)   
            echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
    }
    catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }
}

function getProductPriceById($productId, $tableName) {
    try
    {
        $connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
        $db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);

        $sql = "SELECT * FROM $tableName WHERE id=$productId;";
        //echo $sql;

        $result = $db->query($sql);

        $error_array = $db->errorInfo();
    
        if($db->errorCode() != 0000)   
            echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
    
        $row = $result->fetch();
        return $row['price'];
    }
    catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }
}

function clearCart($userId) {
    try
    {
        $connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
        $db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);

        $sql = "DELETE FROM basket WHERE user_id=$userId;";
        //echo $sql;

        $result = $db->exec($sql);

        $error_array = $db->errorInfo();
    
        if($db->errorCode() != 0000)   
            echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
    }
    catch(PDOException $e)
    {
        die("Error: ".$e->getMessage());
    }
}




