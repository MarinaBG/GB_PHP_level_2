-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:33333
-- Время создания: Июн 02 2019 г., 15:46
-- Версия сервера: 5.7.20-log
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2_lesson4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category_name`
--

CREATE TABLE `category_name` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `short_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_name`
--

INSERT INTO `category_name` (`id_cat`, `cat_name`, `short_name`) VALUES
(1, 'готовая кухня', 'кухня');

-- --------------------------------------------------------

--
-- Структура таблицы `factory`
--

CREATE TABLE `factory` (
  `id_factory` int(11) NOT NULL,
  `factory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `factory`
--

INSERT INTO `factory` (`id_factory`, `factory_name`) VALUES
(1, '«Мир мебели»'),
(2, '«БТС»');

-- --------------------------------------------------------

--
-- Структура таблицы `gotovye_kukhni`
--

CREATE TABLE `gotovye_kukhni` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hit` int(11) DEFAULT NULL,
  `category_name` int(11) NOT NULL,
  `factory_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gotovye_kukhni`
--

INSERT INTO `gotovye_kukhni` (`id`, `name`, `hit`, `category_name`, `factory_name`) VALUES
(1, 'Ника-2', NULL, 1, 1),
(2, 'Классика', NULL, 1, 1),
(3, 'Мокко', NULL, 1, 1),
(4, 'Орхидея', NULL, 1, 1),
(5, 'Красная орхидея', NULL, 1, 1),
(6, 'Яблоки', 1, 1, 1),
(7, 'Ника-5', NULL, 1, 1),
(8, 'Афина', NULL, 1, 2),
(9, 'Монро-2,0', NULL, 1, 2),
(10, 'Ника-2 МДФ', NULL, 1, 1),
(11, 'Ника-3', NULL, 1, 1),
(12, 'Лилия-1', NULL, 1, 1),
(13, 'Лилия-2', NULL, 1, 1),
(14, 'Лилия-3', NULL, 1, 1),
(15, 'Киви', NULL, 1, 1),
(16, 'Цитрус', 1, 1, 1),
(17, 'Орхидея синяя', NULL, 1, 1),
(18, 'Колибри', 1, 1, 1),
(19, 'Виолетта-2', NULL, 1, 1),
(20, 'Виолетта', NULL, 1, 1),
(21, 'Виктория', NULL, 1, 1),
(22, 'Кухня угловая', NULL, 1, 1),
(23, 'Сфера красная', NULL, 1, 1),
(24, 'Ника угловая', NULL, 1, 1),
(25, 'Персики', NULL, 1, 1),
(26, 'Омега', NULL, 1, 1),
(27, 'Агата', 1, 1, 1),
(28, 'Арабика', NULL, 1, 1),
(29, 'Ника-6 МДФ', NULL, 1, 1),
(30, 'Ника-2', NULL, 1, 1),
(31, 'Классика', NULL, 1, 1),
(32, 'Мокко', NULL, 1, 1),
(33, 'Орхидея', NULL, 1, 1),
(34, 'Красная орхидея', NULL, 1, 1),
(35, 'Яблоки', 1, 1, 1),
(36, 'Ника-5', NULL, 1, 1),
(37, 'Афина', NULL, 1, 2),
(38, 'Монро-2,0', NULL, 1, 2),
(39, 'Ника-2 МДФ', NULL, 1, 1),
(40, 'Ника-3', NULL, 1, 1),
(41, 'Лилия-1', NULL, 1, 1),
(42, 'Лилия-2', NULL, 1, 1),
(43, 'Лилия-3', NULL, 1, 1),
(44, 'Киви', NULL, 1, 1),
(45, 'Цитрус', 1, 1, 1),
(46, 'Орхидея синяя', NULL, 1, 1),
(47, 'Колибри', 1, 1, 1),
(48, 'Виолетта-2', NULL, 1, 1),
(49, 'Виолетта', NULL, 1, 1),
(50, 'Виктория', NULL, 1, 1),
(51, 'Кухня угловая', NULL, 1, 1),
(52, 'Сфера красная', NULL, 1, 1),
(53, 'Ника угловая', NULL, 1, 1),
(54, 'Персики', NULL, 1, 1),
(55, 'Омега', NULL, 1, 1),
(56, 'Агата', 1, 1, 1),
(57, 'Арабика', NULL, 1, 1),
(58, 'Ника-6 МДФ', NULL, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category_name`
--
ALTER TABLE `category_name`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`id_factory`);

--
-- Индексы таблицы `gotovye_kukhni`
--
ALTER TABLE `gotovye_kukhni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categori_name_ready_kitchen` (`category_name`),
  ADD KEY `fk_factory_name_ready_kitchen` (`factory_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category_name`
--
ALTER TABLE `category_name`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `factory`
--
ALTER TABLE `factory`
  MODIFY `id_factory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `gotovye_kukhni`
--
ALTER TABLE `gotovye_kukhni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `gotovye_kukhni`
--
ALTER TABLE `gotovye_kukhni`
  ADD CONSTRAINT `fk_categori_name_ready_kitchen` FOREIGN KEY (`category_name`) REFERENCES `category_name` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factory_name_ready_kitchen` FOREIGN KEY (`factory_name`) REFERENCES `factory` (`id_factory`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
