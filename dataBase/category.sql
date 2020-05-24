-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2019 г., 21:40
-- Версия сервера: 5.5.50-log
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `description`, `keywords`) VALUES
(1, 0, 'Стройматериалы', 'Стройматериалы keywords', 'Стройматериалы description'),
(2, 0, 'Инструменты', 'Инструменты keywords', 'Инструменты description'),
(3, 0, 'Сантехника', 'Сантехника keywords', 'Сантехника description'),
(4, 0, 'Краски', 'Краски keywords', 'Краски description'),
(5, 1, 'Сухие смеси и грунтовки', 'Сухие смеси и грунтовки keywords', 'Сухие смеси и грунтовки description'),
(6, 1, 'Листровые материалы', 'Листровые материалы  keywords', 'Листровые материалы description'),
(7, 1, 'Блоки для строительства', 'Блоки для строительства keywords', 'Блоки для строительства description'),
(8, 1, 'Изоляционные материалы', 'Изоляционные материалы keywords', 'Изоляционные материалы description'),
(9, 1, 'Наружная канализация', 'Наружная канализация keywords' ,'Наружная канализация description'),
(10, 2, 'Электроинструменты ', 'Электроинструменты keywords', 'Электроинструменты description'),
(11, 2, 'Ручной инструмент', 'Ручной инструмент keywords', 'Ручной инструмент description'),
(12, 2, 'Сварочное оборудование', 'Сварочное оборудование keywords', 'Сварочное оборудование description'),
(13, 2, 'Оборудование для мастерской', 'Оборудование для мастерской keywords', 'Оборудование для мастерской description'),
(14, 2, 'Средства индивидуальной защиты', 'Средства индивидуальной защиты keywords', 'Средства индивидуальной защиты description'),
(15, 3, 'Ванны и комплектующие', 'Ванны и комплектующие keywords', 'Ванны и комплектующие description'),
(16, 3, 'Унитазы и биде', 'Унитазы и биде keywords', 'Унитазы и биде description'),
(17, 3, 'Душевые кабинки', 'Душевые кабинки keywords', 'Душевые кабинки description'),
(18, 3, 'Раковины', 'Раковины keywords', 'Раковины description'),
(19, 3, 'Смесители', 'Смесители keywords', 'Смесители description'),
(20, 4, 'Краски для внутренних работ', 'Краски для внутренних работ keywords', 'Смесители description'),
(21, 4, 'Эмали', 'Эмали keywords', 'Эмали description'),
(22, 4, 'Инструменты для покраски', 'Инструменты для покраски keywords', 'Инструменты для покраски description'),
(23, 4, 'Покрытия для дерева', 'Покрытия для дерева keywords', 'Покрытия для дерева description'),
(24, 4, 'Клеи', 'Клеи keywords', 'Клеи description');
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
