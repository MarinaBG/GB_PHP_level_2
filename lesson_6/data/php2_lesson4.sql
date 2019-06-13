-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:33333
-- Время создания: Июн 10 2019 г., 09:54
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
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category_name`
--

CREATE TABLE `category_name` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `short_name` varchar(50) NOT NULL,
  `plural_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_name`
--

INSERT INTO `category_name` (`id_cat`, `cat_name`, `short_name`, `plural_name`) VALUES
(1, 'готовая кухня', 'кухня', 'готовые кухни');

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
  `factory_name` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gotovye_kukhni`
--

INSERT INTO `gotovye_kukhni` (`id`, `name`, `hit`, `category_name`, `factory_name`, `price`) VALUES
(1, 'Ника-2', NULL, 1, 1, 20000),
(2, 'Классика', NULL, 1, 1, 20000),
(3, 'Мокко', NULL, 1, 1, 20000),
(4, 'Орхидея', NULL, 1, 1, 20000),
(5, 'Красная орхидея', NULL, 1, 1, 20000),
(6, 'Яблоки', 1, 1, 1, 20000),
(7, 'Ника-5', NULL, 1, 1, 20000),
(8, 'Афина', NULL, 1, 2, 20000),
(9, 'Монро-2,0', NULL, 1, 2, 20000),
(10, 'Ника-2 МДФ', NULL, 1, 1, 20000),
(11, 'Ника-3', NULL, 1, 1, 20000),
(12, 'Лилия-1', NULL, 1, 1, 20000),
(13, 'Лилия-2', NULL, 1, 1, 20000),
(14, 'Лилия-3', NULL, 1, 1, 20000),
(15, 'Киви', NULL, 1, 1, 20000),
(16, 'Цитрус', 1, 1, 1, 20000),
(17, 'Орхидея синяя', NULL, 1, 1, 20000),
(18, 'Колибри', 1, 1, 1, 20000),
(19, 'Виолетта-2', NULL, 1, 1, 20000),
(20, 'Виолетта', NULL, 1, 1, 20000),
(21, 'Виктория', NULL, 1, 1, 20000),
(22, 'Кухня угловая', NULL, 1, 1, 20000),
(23, 'Сфера красная', NULL, 1, 1, 20000),
(24, 'Ника угловая', NULL, 1, 1, 20000),
(25, 'Персики', NULL, 1, 1, 20000),
(26, 'Омега', NULL, 1, 1, 20000),
(27, 'Агата', 1, 1, 1, 20000),
(28, 'Арабика', NULL, 1, 1, 20000),
(29, 'Ника-6 МДФ', NULL, 1, 1, 20000),
(30, 'Ника-2', NULL, 1, 1, 20000),
(31, 'Классика', NULL, 1, 1, 20000),
(32, 'Мокко', NULL, 1, 1, 20000),
(33, 'Орхидея', NULL, 1, 1, 20000),
(34, 'Красная орхидея', NULL, 1, 1, 20000),
(35, 'Яблоки', 1, 1, 1, 20000),
(36, 'Ника-5', NULL, 1, 1, 20000),
(37, 'Афина', NULL, 1, 2, 20000),
(38, 'Монро-2,0', NULL, 1, 2, 20000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `email`) VALUES
(1, 'Александр', 'alex70', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'alex70@mail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_product` (`product_id`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `gotovye_kukhni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
