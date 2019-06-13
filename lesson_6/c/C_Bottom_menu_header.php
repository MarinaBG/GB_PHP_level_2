<?
class BottomMenu{
    private $menuItems;

    public function __construct() {
        $this->menuItems = createBottomMenuItemsObj(BOTTOM_MENU_ITEMS);
    }	

    function checkMenuActivity() {
        if ($_GET['cat']) {
            $cat = $_GET['cat'];
            for ($i=0; $i < count($this->menuItems); $i++) { 
                if ($this->menuItems[$i]->categories != null) {
                    for ($n=0; $n < count($this->menuItems[$i]->categories); $n++) { 
                        if (translitText($this->menuItems[$i]->categories[$n]->name) == $cat) {                       
                            $this->menuItems[$i]->active = 'active';
                            $this->menuItems[$i]->categories[$n]->active = 'active';
                        }
                    }  
                }
            }  
        }        
    }

    function createHref($arr) {
        for ($i=0; $i < count($arr); $i++) {       
            if ($arr[$i]->categories == !null) {
                for ($n=0; $n < count($arr[$i]->categories); $n++) { 
                    
                    ///// для примера
                    if ($arr[$i]->categories[$n]->name == 'Готовые кухни') {
                        $arr[$i]->categories[$n]->href ='index.php?c=page&act=catalog&cat=gotovye_kukhni';
                    }
                }   
            }                        
        }
    }

    function createBottomMenu() {
        $this->checkMenuActivity($this->menuItems);
        $this->createHref($this->menuItems);

        $list = '';
            for ($i=0; $i < count($this->menuItems); $i++) { 
                
                if ($this->menuItems[$i]->href == null) {
                    if ($this->menuItems[$i]->active == 'active') {
                        $list.='<li class="menu_item active" onmousedown="return false">
                        <a class="main_link">'.$this->menuItems[$i]->name.'</a>
                        <ul class="submenu">';
                        for ($n=0; $n < count($this->menuItems[$i]->categories); $n++) { 
                            if ($this->menuItems[$i]->categories[$n]->active == 'active') {
                                $list.='<li class="active"><a class="submenu_item" href="'.$this->menuItems[$i]->categories[$n]->href.'">'.$this->menuItems[$i]->categories[$n]->name.'</a></li>'; 
                            }
                            else {
                                $list.='<li><a class="submenu_item" href="'.$this->menuItems[$i]->categories[$n]->href.'">'.$this->menuItems[$i]->categories[$n]->name.'</a></li>';                    
                            }                        
                        }
                    }
                    else {
                        $list.='<li class="menu_item" onmousedown="return false">
                        <a class="main_link">'.$this->menuItems[$i]->name.'</a>
                        <ul class="submenu">';
                        for ($n=0; $n < count($this->menuItems[$i]->categories); $n++) { 
                            $list.='<li><a class="submenu_item" href="'.$this->menuItems[$i]->categories[$n]->href.'">'.$this->menuItems[$i]->categories[$n]->name.'</a></li>'; 
                        }
                    }
                    $list.='</ul></li>';
                } else {
                    if ($this->menuItems[$i]->active == 'active') {
                        $list.='<li class="menu_item active" onmousedown="return false">
                        <a class="main_link" href="'.$this->menuItems[$i]->href.'">'.$this->menuItems[$i]->name.'</a>
                        </li>';
                    }
                    else {
                        $list.='<li class="menu_item" onmousedown="return false">
                        <a class="main_link" href="'.$this->menuItems[$i]->href.'">'.$this->menuItems[$i]->name.'</a>
                        </li>';
                    }                
                }                
            }
        return $list;
    }
}

$bottomMenu = new BottomMenu();
echo $bottomMenu->createBottomMenu();
