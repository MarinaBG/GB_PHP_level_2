<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('big_img.tmpl');
  
  // получаем название изображения через get
  $nameBigImg = $_GET['img'];

  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  $content = $template->render(array(
    'title' => 'GB. Домашнее задание 3. Галерея',
    'nameImg' => $nameBigImg,
    'pathBigImg' => 'public/img/big/',
  ));
  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>