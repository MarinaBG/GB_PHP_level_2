<?php
require_once 'config/config.php';

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

  //сканируем директорию с картинками, получаем массив из списка файлов
  $masPhoto = scandir(PATH_SMALL_IMG);
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  $content = $template->render(array(
    'title' => 'GB. Домашнее задание 3. Галерея',
    'photo' => $masPhoto,
    'pathSmallImg' => PATH_SMALL_IMG,
    'pathBigImg' => PATH_BIG_IMG,
  ));
  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>