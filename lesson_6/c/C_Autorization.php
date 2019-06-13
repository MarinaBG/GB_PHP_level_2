<?
    include_once(__DIR__.'/../m/model.php');
    include_once(__DIR__.'/../config/config.php');
        
    class C_Autorization {
        private $login;
        private $pass;

        public function __construct() {
            $this->login = (!empty($_POST["login"]))?strip_tags($_POST["login"]):"";
            $this->pass = (!empty($_POST["pass"]))?strip_tags($_POST["pass"]):"";
        }	
    
        public function response(){
            $user = checkUser($this->login, $this->pass);
            
            if($user){
                echo json_encode(["index.php?c=page&act=accauntPage", $user[0], $this->login, $user[1]]);
            }
            else{
                echo '0';
            }
        }  
    }

    $autorization = new C_Autorization();
    $autorization->response();    
?>