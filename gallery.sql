-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 22 2020 г., 12:48
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `linkImg` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`id`, `linkImg`) VALUES
(1, './BigImg/0.jpg'),
(2, './BigImg/1.jpg'),
(3, './BigImg/2.jpg'),
(4, './BigImg/3.jpg'),
(5, './BigImg/4.jpg'),
(6, './BigImg/5.jpg'),
(7, './BigImg/6.jpg'),
(8, './BigImg/7.jpg'),
(9, './BigImg/8.jpg'),
(10, './BigImg/9.jpg'),
(11, './BigImg/10.jpg'),
(12, './BigImg/11.jpg'),
(13, './BigImg/12.jpg'),
(14, './BigImg/13.jpg'),
(15, './BigImg/14.jpg'),
(16, './BigImg/15.jpg'),
(17, './BigImg/16.png'),
(18, './BigImg/17.jpg'),
(19, './BigImg/18.jpg'),
(20, './BigImg/19.png'),
(21, './BigImg/20.jpg'),
(22, './BigImg/21.jpg'),
(23, './BigImg/22.jpg'),
(24, './BigImg/23.jpg'),
(25, './BigImg/24.jpg'),
(26, './BigImg/25.jpg'),
(27, './BigImg/26.jpg'),
(28, './BigImg/27.jpg'),
(29, './BigImg/28.jpg'),
(30, './BigImg/29.jpg'),
(31, './BigImg/30.jpg'),
(32, './BigImg/31.jpg'),
(33, './BigImg/32.jpg'),
(34, './BigImg/33.jpg'),
(35, './BigImg/34.jpg'),
(36, './BigImg/35.jpg'),
(37, './BigImg/36.jpg'),
(38, './BigImg/37.jpg'),
(39, './BigImg/38.jpg'),
(40, './BigImg/39.jpg'),
(41, './BigImg/40.jpg'),
(42, './BigImg/41.jpg'),
(43, './BigImg/42.jpg'),
(44, './BigImg/43.jpg'),
(45, './BigImg/44.jpg'),
(46, './BigImg/45.jpg'),
(47, './BigImg/46.jpg'),
(48, './BigImg/47.jpg'),
(49, './BigImg/48.jpg'),
(50, './BigImg/49.jpg'),
(51, './BigImg/50.jpg'),
(52, './BigImg/51.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
