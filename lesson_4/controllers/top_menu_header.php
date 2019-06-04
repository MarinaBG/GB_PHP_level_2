<?

$arrayTopMenuItems = createTopMenuItemsObj ($topMenuItems);

function checkMenutopActivity($arrayTopMenuItems) {
    for ($i=0; $i < count($arrayTopMenuItems); $i++) {  
        if ($arrayTopMenuItems[$i]->name == 'каталог') {
            $arrayTopMenuItems[$i]->active = 'active';
        }
    }
}

function createTopMenu($arrayTopMenuItems) {
    for ($i=0; $i < count($arrayTopMenuItems); $i++) {  
        if ($arrayTopMenuItems[$i]->active == 'active') {
            echo '<li class="menu_item active"><a href='.$arrayTopMenuItems[$i]->href.'>'.$arrayTopMenuItems[$i]->name.'</a></li>';
        
        } else {
            echo '<li class="menu_item"><a href='.$arrayTopMenuItems[$i]->href.'>'.$arrayTopMenuItems[$i]->name.'</a></li>';
        } 
    }
}