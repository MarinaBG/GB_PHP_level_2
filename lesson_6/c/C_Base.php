<?php
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы
	protected $header;	
	protected $footer;

	
	
	protected function before()
	{
		$this->title = 'Название сайта';
		$this->content = '';
		$this->header = '';
		$this->footer = '';
	}
	
	//
	// Генерация базового шаблонаы
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content, 'header' => $this->header, 'footer' => $this->footer);	
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}
