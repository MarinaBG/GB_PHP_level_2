<?

function getPhotosArr($connect) {
    $sql = "select * from images";

    $res = mysqli_query($connect, $sql);
    
    $arr = []; 
   
    while($data = mysqli_fetch_assoc($res)) {
        array_push($arr, ['name' => $data['name'], 'address' => $data['address']]);
    }

    return $arr;
}

function getBigPhoto($connect, $name) {
    $sql = "select address from images where name=\"".$name."\"";

    $res = mysqli_query($connect, $sql);
       
    $data = mysqli_fetch_assoc($res);
        
    return $data;
}

?>