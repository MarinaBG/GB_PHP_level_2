<?php
//
// Контроллер страницы чтения.
// //
include_once('m/model.php');

class C_Page extends C_Base
{
	//
	// Конструктор.
	//
	
	public function action_index(){
		$this->title = 'Каталог';
		$this->content = $this->Template('v/v_index.php');
		$this->header = $this->Template('v/v_header.php');
		$this->footer = $this->Template('v/v_footer.php');	
	}

	public function action_catalog(){
		$this->title = 'Каталог';
		$this->content = $this->Template('v/v_index.php');
		$this->header = $this->Template('v/v_header.php');
		$this->footer = $this->Template('v/v_footer.php');	
	}

	public function action_order(){
		$this->title = 'Каталог';
		$this->content = $this->Template('v/v_order.php');
		$this->header = $this->Template('v/v_header.php');
		$this->footer = $this->Template('v/v_footer.php');	
	}

	public function action_authorization(){
		if (isset($_COOKIE['name']) && isset($_COOKIE['login'])) {
			$this->title = 'Личный кабинет';
			$this->content = $this->Template('v/v_accaunt_page.php');
			$this->header = $this->Template('v/v_header.php');
			$this->footer = $this->Template('v/v_footer.php');		
		} 
		else {  
			$this->title = 'Страница авторизации';
			$this->content = $this->Template('v/v_authorization.php');  
			$this->header = $this->Template('v/v_header.php');
			$this->footer = $this->Template('v/v_footer.php');
		}		
	}

	public function action_accauntPage(){
		if (isset($_COOKIE['name']) && isset($_COOKIE['login'])) {
			$this->title = 'Личный кабинет';
			$this->content = $this->Template('v/v_accaunt_page.php');
			$this->header = $this->Template('v/v_header.php');
			$this->footer = $this->Template('v/v_footer.php');		
		} 
		else {  
			$this->title = 'Страница авторизации';
			$this->content = $this->Template('v/v_authorization.php');  
			$this->header = $this->Template('v/v_header.php');
			$this->footer = $this->Template('v/v_footer.php');
		}		
	}

	// public function action_catalog(){
	// 	$this->title = 'Каталог товаров';
	// 	$this->content = $this->Template('v/v_catalog.php');	
	// }
}
