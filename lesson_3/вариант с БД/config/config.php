<?
$server = "localhost";
$user = "root";
$pass = "";
$db = "gallery";

$connect = mysqli_connect($server, $user, $pass, $db);

const PATH_SMALL_IMG = "public/img/small/";
const PATH_BIG_IMG = "public/img/big/";
?>