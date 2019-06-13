<?php
include_once(__DIR__.'/../config/config.php');

class UserAccount{
    private $userName;

    public function __construct() {
        $this->userName = isset($_COOKIE['name']) ? $_COOKIE['name'] : false;
    }	

    function render() {
        if ($this->userName) {
            echo '<a href="index.php?c=page&act=accauntPage" class="userAccount enter_btn">Личный кабинет: '.$this->userName.'</a>';
        }
        else {
            echo '<a href="index.php?c=page&act=authorization" class="enter_btn">Войти</a>';
        }        
    }
}

$topMenu = new UserAccount();
$topMenu->render();