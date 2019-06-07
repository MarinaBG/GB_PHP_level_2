<?php
//
// Контроллер страницы чтения.
//
include_once('m/model.php');

class C_Page extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_index(){
		$this->title = 'Страница авторизации';
		$this->content = $this->Template('v/v_index.php');	
	}

	public function action_accauntPage(){
		if (isset($_COOKIE['name']) && isset($_COOKIE['login'])) {
			$this->title = 'Личный кабинет';
			$this->content = $this->Template('v/v_accaunt_page.php');	
		} 
		else {  
			$this->title = 'Страница авторизации';
			$this->content = $this->Template('v/v_index.php');  
		}		
	}

	public function action_checkIn(){
		$this->title = 'Страница регистрации';
		$this->content = $this->Template('v/v_checkIn.php');	
	}
}
