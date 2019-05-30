<?php
require_once 'config/config.php';

include 'Twig/Autoloader.php';
Twig_Autoloader::register();

// подключение к бд
try {
  $dbh = new PDO('mysql:dbname=gallery;host=localhost;port=3333', 'root', '');
} catch (PDOException $e) {
  echo "Error: Could not connect. " . $e->getMessage();
}

// установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// выполняем запрос
try {
  // формируем SELECT запрос
  // в результате каждая строка таблицы будет объектом
  $sql = "SELECT * FROM gallery";
  $sth = $dbh->query($sql);
  while ($row = $sth->fetchObject()) {
    $data[] = $row;
  }
  
  // закрываем соединение
  unset($dbh); 

  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('countries2.tmpl');

  echo $template->render(array (
    'title' => 'GB. Домашнее задание 3. Галерея',
    'photo' => $data,
    'pathSmallImg' => PATH_SMALL_IMG,
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>

// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('index.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  $content = $template->render(array(
    'title' => 'GB. Домашнее задание 3. Галерея',
    'photo' => getPhotosArr($connect),
    'pathSmallImg' => PATH_SMALL_IMG,
  ));
  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>