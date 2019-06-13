<?php
include_once(__DIR__.'/../config/config.php');

class TopMenu{
    private $menuItems;

    public function __construct() {
        $this->menuItems = createTopMenuItemsObj (TOP_MENU_ITEMS);
    }	

    function checkMenutopActivity() {
        if ($_GET['act']=='catalog') {
            for ($i=0; $i < count($this->menuItems); $i++) {  
                if ($this->menuItems[$i]->name == 'каталог') {
                    $this->menuItems[$i]->active = 'active';
                }
            }
        }        
    }

    function createTopMenu() {
        $this->checkMenutopActivity();

        for ($i=0; $i < count($this->menuItems); $i++) {  
            if ($this->menuItems[$i]->active == 'active') {
                echo '<li class="menu_item active"><a href='.$this->menuItems[$i]->href.'>'.$this->menuItems[$i]->name.'</a></li>';
            
            } else {
                echo '<li class="menu_item"><a href='.$this->menuItems[$i]->href.'>'.$this->menuItems[$i]->name.'</a></li>';
            } 
        }
    }
}

$topMenu = new TopMenu();
echo $topMenu->createTopMenu();