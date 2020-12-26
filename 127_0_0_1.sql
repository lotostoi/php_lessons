-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 26 2020 г., 07:24
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
CREATE DATABASE IF NOT EXISTS `my_portfolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `my_portfolio`;

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_and_ext` varchar(200) NOT NULL,
  `number_of_views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `name_and_ext`, `number_of_views`) VALUES
(73, 'look.com.ua-114009', 'look.com.ua-114009.jpg', 2),
(74, 'look.com.ua-114013', 'look.com.ua-114013.jpg', 14),
(75, 'look.com.ua-114236', 'look.com.ua-114236.jpg', 1),
(76, 'look.com.ua-114358', 'look.com.ua-114358.jpg', 4),
(77, 'look.com.ua-114400', 'look.com.ua-114400.jpg', 14),
(78, 'look.com.ua-114402', 'look.com.ua-114402.jpg', 2),
(79, 'look.com.ua-114443', 'look.com.ua-114443.jpg', 1),
(80, 'look.com.ua-114445', 'look.com.ua-114445.jpg', 5),
(81, 'look.com.ua-114499', 'look.com.ua-114499.jpg', 1),
(82, 'look.com.ua-114504', 'look.com.ua-114504.jpg', 0),
(83, 'look.com.ua-114505', 'look.com.ua-114505.jpg', 0),
(84, 'look.com.ua-114553', 'look.com.ua-114553.jpg', 1),
(85, 'look.com.ua-114555', 'look.com.ua-114555.jpg', 11),
(86, 'look.com.ua-114566', 'look.com.ua-114566.jpg', 2),
(87, 'look.com.ua-114683', 'look.com.ua-114683.png', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `user` varchar(200) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user`, `review`) VALUES
(1, 'ytuty', 'tutyuerterter'),
(17, 'lotos_toi@mail.ru', 'insertAdjacentHTML() разбирает указанный текст как HTML или XML и вставляет полученные узлы (nodes) в DOM дерево в указанную позицию. Данная функция не переписывает имеющиеся элементы, что предотвращает дополнительную сериализацию и поэтому работает быстрее, чем манипуляции с innerHTML.');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'js'),
(2, 'Vue.js'),
(3, 'php'),
(4, 'node.js'),
(5, 'html'),
(6, 'css'),
(7, 'scss');

-- --------------------------------------------------------

--
-- Структура таблицы `works`
--

CREATE TABLE `works` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `git` varchar(500) NOT NULL,
  `project` varchar(500) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `works`
--

INSERT INTO `works` (`id`, `title`, `img`, `git`, `project`, `description`) VALUES
(6, 'Адаптивная верстка', 'Скриншот 26-12-2020 135014.jpg', 'https://github.com/lotostoi/E-Shop.io', 'https://lotostoi.github.io/E-Shop.io/', 'Пример адаптивной верстки. html, css, scss, js, gulp.\r\nПример адаптивной верстки интернет магазина. Слайдер написан на ванильном js. Для работы с scss использовался gulp.  '),
(7, 'Простая верстка статической страницы', 'Скриншот 26-12-2020 135735.png', ' https://github.com/lotostoi/html5-css3.io', 'https://lotostoi.github.io/html5-css3.io/', 'Простая верстка статической страницы. html, css.\r\nПример верстки статической страницы без адаптива.'),
(8, 'Интернет магазин на php', 'Скриншот 26-12-2020 140157.png', 'https://github.com/lotostoi/startMVC', 'http://lotose.ru/', 'Простой интернет магазин на php.\r\nВ магазине реализован, поиск, простая авторизация, простая админка с возможностью добавлять и редактировать товары.  Админка доступна под логином admin 12345. Дизайн произвольный, верстка без адаптива. Код написан в OOП стиле. Фреймворки не используются.'),
(9, 'Пример адаптивной вертски интернет магазина.', 'Скриншот 26-12-2020 140557.png', 'https://github.com/lotostoi/index.io/tree/lesson4', 'https://lotostoi.github.io/index.io/', 'Пример адаптивной вёрстки интернет магазина.\r\nHtml, scss, js, vue.js.\r\nВерстка интернет магазина по макету. По ссылка показана верстка главной страницы, в репозитории можно посмотреть вёрстку других страниц. При верстке часть функционала была реализована с помощью js, vue.js(простой слайдер), ползунок для фильтрации цен на странице product.html,  реализован на основе плагина https://refreshless.com/nouislider/. ');

-- --------------------------------------------------------

--
-- Структура таблицы `works_to_tags`
--

CREATE TABLE `works_to_tags` (
  `id` int NOT NULL,
  `id_work` int NOT NULL,
  `id_tag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `works_to_tags`
--

INSERT INTO `works_to_tags` (`id`, `id_work`, `id_tag`) VALUES
(207, 6, 1),
(208, 6, 5),
(209, 6, 6),
(210, 6, 7),
(223, 8, 1),
(224, 8, 2),
(225, 8, 5),
(226, 8, 6),
(227, 8, 7),
(228, 7, 5),
(229, 7, 6),
(230, 9, 1),
(231, 9, 2),
(232, 9, 5),
(233, 9, 6),
(234, 9, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `works_to_tags`
--
ALTER TABLE `works_to_tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `works`
--
ALTER TABLE `works`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `works_to_tags`
--
ALTER TABLE `works_to_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
