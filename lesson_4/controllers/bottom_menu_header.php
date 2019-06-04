<?
require_once ('../config/config.php');
require_once ("../general/general.php");

$arrayBottomMenuItems = createBottomMenuItemsObj($bottomMenuItems); 

function checkMenuActivity($arrayBottomMenuItems) {
    for ($i=0; $i < count($arrayBottomMenuItems); $i++) { 
        if ($arrayBottomMenuItems[$i]->categories != null) {
            for ($n=0; $n < count($arrayBottomMenuItems[$i]->categories); $n++) { 
                if ($arrayBottomMenuItems[$i]->categories[$n]->name == 'Готовые кухни') {                       
                    $arrayBottomMenuItems[$i]->active = 'active';
                    $arrayBottomMenuItems[$i]->categories[$n]->active = 'active';
                }
            }  
        }
    }  
}

function createBottomMenu($arrayBottomMenuItems) {
    $list = '';
        for ($i=0; $i < count($arrayBottomMenuItems); $i++) { 
            
            if ($arrayBottomMenuItems[$i]->href == null) {
                if ($arrayBottomMenuItems[$i]->active == 'active') {
                    $list.='<li class="menu_item active" onmousedown="return false">
                    <a class="main_link">'.$arrayBottomMenuItems[$i]->name.'</a>
                    <ul class="submenu">';
                    for ($n=0; $n < count($arrayBottomMenuItems[$i]->categories); $n++) { 
                        if ($arrayBottomMenuItems[$i]->categories[$n]->active == 'active') {
                            $list.='<li class="active"><a class="submenu_item" href="'.$arrayBottomMenuItems[$i]->categories[$n]->href.'">'.$arrayBottomMenuItems[$i]->categories[$n]->name.'</a></li>'; 
                        }
                        else {
                            $list.='<li><a class="submenu_item" href="'.$arrayBottomMenuItems[$i]->categories[$n]->href.'">'.$arrayBottomMenuItems[$i]->categories[$n]->name.'</a></li>';                    
                        }                        
                    }
                }
                else {
                    $list.='<li class="menu_item" onmousedown="return false">
                    <a class="main_link">'.$arrayBottomMenuItems[$i]->name.'</a>
                    <ul class="submenu">';
                    for ($n=0; $n < count($arrayBottomMenuItems[$i]->categories); $n++) { 
                        $list.='<li><a class="submenu_item" href="'.$arrayBottomMenuItems[$i]->categories[$n]->href.'">'.$arrayBottomMenuItems[$i]->categories[$n]->name.'</a></li>'; 
                    }
                }
                $list.='</ul></li>';
            } else {
                if ($arrayBottomMenuItems[$i]->active == 'active') {
                    $list.='<li class="menu_item active" onmousedown="return false">
                    <a class="main_link" href="'.$arrayBottomMenuItems[$i]->href.'">'.$arrayBottomMenuItems[$i]->name.'</a>
                    </li>';
                }
                else {
                    $list.='<li class="menu_item" onmousedown="return false">
                    <a class="main_link" href="'.$arrayBottomMenuItems[$i]->href.'">'.$arrayBottomMenuItems[$i]->name.'</a>
                    </li>';
                }                
            }                
        }
    return $list;
};

checkMenuActivity($arrayBottomMenuItems);
