<?php
require_once 'config/config.php';
require_once 'models/model.php';

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