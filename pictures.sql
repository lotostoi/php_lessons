-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2020 г., 13:11
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_portfolio`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_and_ext` varchar(200) NOT NULL,
  `namber_of_views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `name_and_ext`, `namber_of_views`) VALUES
(73, 'look.com.ua-114009', 'look.com.ua-114009.jpg', 1),
(74, 'look.com.ua-114013', 'look.com.ua-114013.jpg', 2),
(75, 'look.com.ua-114236', 'look.com.ua-114236.jpg', 1),
(76, 'look.com.ua-114358', 'look.com.ua-114358.jpg', 1),
(77, 'look.com.ua-114400', 'look.com.ua-114400.jpg', 6),
(78, 'look.com.ua-114402', 'look.com.ua-114402.jpg', 0),
(79, 'look.com.ua-114443', 'look.com.ua-114443.jpg', 0),
(80, 'look.com.ua-114445', 'look.com.ua-114445.jpg', 0),
(81, 'look.com.ua-114499', 'look.com.ua-114499.jpg', 0),
(82, 'look.com.ua-114504', 'look.com.ua-114504.jpg', 0),
(83, 'look.com.ua-114505', 'look.com.ua-114505.jpg', 0),
(84, 'look.com.ua-114553', 'look.com.ua-114553.jpg', 0),
(85, 'look.com.ua-114555', 'look.com.ua-114555.jpg', 5),
(86, 'look.com.ua-114566', 'look.com.ua-114566.jpg', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
