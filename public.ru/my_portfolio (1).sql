-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 04 2021 г., 12:44
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
-- Структура таблицы `hashes`
--

CREATE TABLE `hashes` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `hash` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `hashes`
--

INSERT INTO `hashes` (`id`, `id_user`, `hash`) VALUES
(1, 1, '3606620365fec6cfb6d3c13.78796514'),
(2, 1, '18406584325fec6d57b43df2.10857447'),
(3, 1, '8159489945fed399977e7d3.49239669'),
(4, 1, '6440097005fed39e7ae45b9.23894649'),
(5, 1, '19181778735fed3a3048b482.94370529'),
(6, 1, '18032025505fed3a634382b3.09841545'),
(7, 1, '3472787855fed3dc69ea5e0.21953375'),
(8, 1, '19511532195fed40fe8397e0.49982110'),
(9, 1, '15323348535fed462982f5a3.52932428'),
(10, 1, '7832238545fed5078390bb6.96338424'),
(11, 1, '10997944135fed51bd2add95.71847475'),
(12, 1, '11785044995fed53d2514834.68977176'),
(13, 1, '17340776355fed5458d21d77.73914821'),
(14, 1, '19834853395fed8678046142.98523209'),
(15, 1, '4223723115fed88d2a5cb95.66167903'),
(16, 1, '12569318705fed8bd3092b65.06670629'),
(17, 1, '19262969335fedb32ce6a235.86609203'),
(18, 1, '3394456055fedb5509e5088.03150172'),
(19, 1, '3088304815fedb652a8e9e2.24297965'),
(20, 1, '6410941575fee863280fd67.18149519'),
(21, 1, '18292383705fefe5ff1d69f5.14322083'),
(22, 1, '17780908765fefe62b983e26.33783530'),
(23, 1, '3368099095ff0241fe3f563.61268757'),
(24, 8, '10958223075ff0260668c142.06607248'),
(25, 8, '17705101075ff033266c8201.06309033'),
(26, 2, '5753761995ff08c7da3faf3.90374739'),
(27, 2, '5341460695ff08d0c7750b7.65785359'),
(28, 2, '13370919675ff08e12a57483.29104217'),
(29, 2, '18291640825ff08eb69a5e96.16406447'),
(30, 2, '4439971385ff09109191ed4.93061542'),
(31, 2, '18381979155ff091494595a8.67722569'),
(32, 2, '9857553505ff09176a7b740.93261407'),
(33, 2, '10928178965ff091de9d3538.53512449'),
(34, 2, '1957944275ff09239f3f138.62854504'),
(35, 2, '12968861365ff0924a92bbd8.33600785'),
(36, 2, '11575573155ff0927b596e61.22798412'),
(37, 2, '4864257435ff09bb2b87888.04527451'),
(38, 2, '12270383515ff09cae5fb9f7.20056561'),
(39, 2, '6701292995ff09d2f7a7ab6.00644844'),
(40, 2, '10767385915ff09d3a96ab67.78077122'),
(41, 2, '10273146415ff09d5d01d714.70706120'),
(42, 2, '5399355315ff09d8b10a781.42579377'),
(43, 2, '9184702625ff09e1bb43ab7.45730596'),
(44, 2, '12914908875ff09e541ed539.16780685'),
(45, 2, '11010357155ff10deb534715.01969454'),
(46, 2, '12745220785ff10e5f627aa0.76881701'),
(47, 2, '3841616375ff10ee1afe674.43306640'),
(48, 2, '18846851455ff10eec2fbdb6.72261510'),
(49, 2, '15094910805ff10f20a71d45.46201816'),
(50, 2, '14304400685ff10f6b1738a6.21063806'),
(51, 2, '5429170665ff10f865e1e85.72671897'),
(52, 2, '19438884265ff10f98232637.89426935'),
(53, 2, '14401191665ff10fac5e70d7.19642600'),
(54, 2, '3198744845ff10fc23412a6.65564678'),
(55, 2, '3254643005ff1102b8727b6.13760203'),
(56, 2, '16023154795ff11034f2a0b2.87997663'),
(57, 8, '13394591425ff114601a02a1.47541595'),
(58, 2, '413844385ff117b8aa6250.60704697'),
(59, 8, '4827693035ff117f51f5592.96402839'),
(60, 2, '14881434935ff128d2734b65.94107279'),
(61, 2, '16804952605ff15cfb6a37c6.61631972'),
(62, 2, '1656852015ff16d14ad1f73.56720712'),
(63, 2, '1156138415ff1be07f38e29.54333493'),
(64, 2, '7840105975ff1be1866c4d7.27695254'),
(65, 2, '1059506725ff1bf4f9a9f17.97423264'),
(66, 2, '2212095735ff1c20cc7b099.71800394'),
(67, 9, '6169019115ff1c4c18fa424.02968944'),
(68, 2, '6729024675ff1c67055b391.74549454'),
(69, 9, '14352220085ff1c9774c8698.01442586'),
(70, 10, '13294055015ff1c9f55f4761.27200016'),
(71, 10, '1993251355ff1ca17971e47.40973166'),
(72, 11, '16376406395ff1cacb0b50a2.94569063'),
(73, 2, '2872199035ff1cb344080d2.90208841'),
(74, 12, '2824592195ff1cbc71da287.89702833'),
(75, 12, '14077470015ff1cbe6c09686.59971576'),
(76, 2, '21185441085ff1ce02c6cf03.01613837'),
(77, 12, '20706867865ff1d097c5a3c3.14216711'),
(78, 12, '18830860415ff1d477b9b215.81928764'),
(79, 2, '2726430855ff1d4841ca5f0.74334621'),
(80, 11, '8628369115ff1d54e24c7a1.65828452'),
(81, 2, '17806861935ff1d79d323e08.11120782'),
(82, 2, '13826602945ff26af987d646.01588570'),
(83, 11, '15721801665ff26f09c1fa90.00682881'),
(84, 2, '18149329625ff27f7f249ca9.03333255'),
(85, 2, '10847531565ff2834ae2a3c7.87022942'),
(86, 2, '17911061965ff283e16ec6f0.10241167'),
(87, 2, '3878831595ff28b07be73b7.37153438'),
(88, 2, '5865544475ff295e6b07ba3.51778851'),
(89, 2, '5440159385ff2a5410916d8.95772217'),
(90, 2, '18626955205ff2a6d2bb0421.12083550'),
(91, 8, '5394031535ff2a859aefee1.52679824'),
(92, 2, '4988230645ff2aee4ad6054.46685531'),
(93, 2, '20350746725ff2afe44201b6.45905696'),
(94, 2, '7384432505ff2b9f4a21212.65293876'),
(95, 2, '19324357945ff2ba5b2f3f21.26271188'),
(96, 2, '9100925ff2cc56c8ed69.18888767'),
(97, 2, '17926955985ff2cc67626cb6.78415324'),
(98, 2, '15639303685ff2cc7217b438.28815735'),
(99, 2, '7507511445ff2ccc84c2976.09354091'),
(100, 2, '18684418875ff2cce4cdfc76.95887961'),
(101, 2, '537595615ff2cff90a0a95.45204502'),
(102, 2, '7300616595ff2d093d5ee37.45219080'),
(103, 13, '1011989095ff2d62f921768.89500455'),
(104, 13, '3219164305ff2d640839422.24172799');

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
  `link_to_sosial_network` varchar(800) NOT NULL,
  `review` text NOT NULL,
  `img_small` varchar(800) NOT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user`, `link_to_sosial_network`, `review`, `img_small`, `admin`) VALUES
(36, 'Alexander', 'https://vk.com/id631958029', '  Проверка!\n  ', 'https://sun1-25.userapi.com/impg/UDYZmA3sed_oVjVeakMUeIyVnDYS_1dea9nDlw/xKcZ007YYJI.jpg?size=100x0&quality=96&crop=21,21,598,598&sign=9f904ff5cb4fda0aa00b898dff849491&c_uniq_tag=qR8gD6dwqomp1a9hjUJ7BrWTT6SYDhd53xM3VgNCk0I&ava=1', 1),
(41, 'Марина', 'https://facebook.com/3435303603361672', 'tyuuydfgdfgfd', 'https://graph.facebook.com/3435303603361672/picture?width=100', 0),
(58, 'lotos', '\'', 'кенкенек', 'https://sun1-25.userapi.com/impg/UDYZmA3sed_oVjVeakMUeIyVnDYS_1dea9nDlw/xKcZ007YYJI.jpg?size=100x0&quality=96&crop=21,21,598,598&sign=9f904ff5cb4fda0aa00b898dff849491&c_uniq_tag=qR8gD6dwqomp1a9hjUJ7BrWTT6SYDhd53xM3VgNCk0I&ava=1', 1);

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
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `img_small` varchar(600) NOT NULL,
  `img_big` varchar(600) NOT NULL,
  `sosial_network` varchar(100) NOT NULL,
  `id_in_sosial_network` bigint NOT NULL,
  `link_to_sosial_network` varchar(800) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `first_name`, `last_name`, `img_small`, `img_big`, `sosial_network`, `id_in_sosial_network`, `link_to_sosial_network`, `email`, `password`, `admin`) VALUES
(2, 'Alexander', 'Alexander', 'Plotnikov', 'https://sun1-25.userapi.com/impg/UDYZmA3sed_oVjVeakMUeIyVnDYS_1dea9nDlw/xKcZ007YYJI.jpg?size=100x0&quality=96&crop=21,21,598,598&sign=9f904ff5cb4fda0aa00b898dff849491&c_uniq_tag=qR8gD6dwqomp1a9hjUJ7BrWTT6SYDhd53xM3VgNCk0I&ava=1', 'https://sun1-25.userapi.com/impg/UDYZmA3sed_oVjVeakMUeIyVnDYS_1dea9nDlw/xKcZ007YYJI.jpg?size=400x0&quality=96&crop=21,21,598,598&sign=2c46ad8d64911277cf9645740109cea3&c_uniq_tag=grwze31xC46FfvzlVogDLQ3RGb-SVR-mZBQoo8iSh6E&ava=1', 'vk', 631958029, 'https://vk.com/id631958029', 'не указан...', '', 1),
(8, 'lotos', 'Alexander', 'Plotnikov', 'https://sun1-25.userapi.com/impg/UDYZmA3sed_oVjVeakMUeIyVnDYS_1dea9nDlw/xKcZ007YYJI.jpg?size=100x0&quality=96&crop=21,21,598,598&sign=9f904ff5cb4fda0aa00b898dff849491&c_uniq_tag=qR8gD6dwqomp1a9hjUJ7BrWTT6SYDhd53xM3VgNCk0I&ava=1', 'https://sun1-25.userapi.com/impg/UDYZmA3sed_oVjVeakMUeIyVnDYS_1dea9nDlw/xKcZ007YYJI.jpg?size=400x0&quality=96&crop=21,21,598,598&sign=2c46ad8d64911277cf9645740109cea3&c_uniq_tag=grwze31xC46FfvzlVogDLQ3RGb-SVR-mZBQoo8iSh6E&ava=1', 'site', 0, '\'\'', 'lotos_toi@mail.ru', '$2y$10$jJv4zl2Z2XPx01n86ABM.e4SiBs6uzH7fefZNCFrk9atFlpz26/Ne', 1),
(11, 'Марина', 'Марина', 'Чуносова', 'https://graph.facebook.com/3435303603361672/picture?width=100', 'https://graph.facebook.com/3435303603361672/picture?width=300', 'fb', 3435303603361672, 'https://facebook.com/3435303603361672', 'sibysi@mail.ru', '', 0),
(12, 'Александр', 'Александр', 'Плотников', 'https://graph.facebook.com/2768117680107010/picture?width=100', 'https://graph.facebook.com/2768117680107010/picture?width=300', 'fb', 2768117680107010, 'https://facebook.com/2768117680107010', 'lotos_toi@mail.ru', '', 0),
(13, 'Igor', 'Igor', 'Lebedev', 'https://vk.com/images/camera_100.png?ava=1', 'https://vk.com/images/camera_400.png?ava=1', 'vk', 356629958, 'https://vk.com/id356629958', 'не указан', '', 0);

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
(9, 'Пример адаптивной вертски интернет магазина', 'Скриншот 26-12-2020 140557.png', 'https://github.com/lotostoi/index.io/tree/lesson4', 'https://lotostoi.github.io/index.io/', 'Пример адаптивной вёрстки интернет магазина.\r\nHtml, scss, js, vue.js.\r\nВерстка интернет магазина по макету. По ссылка показана верстка главной страницы, в репозитории можно посмотреть вёрстку других страниц. При верстке часть функционала была реализована с помощью js, vue.js(простой слайдер), ползунок для фильтрации цен на странице product.html,  реализован на основе плагина https://refreshless.com/nouislider/. ');

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
(235, 9, 1),
(236, 9, 2),
(237, 9, 5),
(238, 9, 6),
(239, 9, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hashes`
--
ALTER TABLE `hashes`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT для таблицы `hashes`
--
ALTER TABLE `hashes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `works`
--
ALTER TABLE `works`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `works_to_tags`
--
ALTER TABLE `works_to_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
