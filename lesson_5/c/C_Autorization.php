<?
    include "../config/config.php";
    
    class C_Autorization {
        private $login;
        private $pass;

        public function __construct() {
            $this->login = (!empty($_POST["login"]))?strip_tags($_POST["login"]):"";
            $this->pass = (!empty($_POST["pass"]))?strip_tags($_POST["pass"]):"";
        }	
    
        private function checkUser() {        
            try
            {
                $connect_str = DB_DRIVER . ':host='. MYSQL_SERVER . ';dbname=' . MYSQL_DB .';port=33333';
                $db = new PDO($connect_str,MYSQL_LOGIN,MYSQL_PASSWORD);
                
                $result = $db->query("select * from users where login='$this->login' and pass=md5('$this->pass')");
                
                $error_array = $db->errorInfo();
            
                if($db->errorCode() != 0000) {
                    die("SQL ошибка: " . $error_array[2] . '<br /><br />');
                }           
                
                $row = $result->fetch();
                return $row['name'];       
            }
            catch(PDOException $e)
            {
                die("Error: ".$e->getMessage());
            }
        }
        
        public function response(){
            $user_name = $this->checkUser($this->login, $this->pass);
            
            if($user_name){
                echo json_encode(["index.php?c=page&act=accauntPage", $user_name, $this->login]);
            }
            else{
                echo '0';
            }
        }  
    }

    $autorization = new C_Autorization();
    $autorization->response();
    
?>