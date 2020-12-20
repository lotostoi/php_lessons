<?php
define("PUBLIC_FOLDER", $_SERVER['CONTEXT_DOCUMENT_ROOT']);
define("TEMPLATES", PUBLIC_FOLDER . "/../templates/");
define("CONFIG", PUBLIC_FOLDER . "/../config/");
define("CORE", PUBLIC_FOLDER . "/../core/");
define("BIG", "./src/bigimages/");
define("SMALL", "./src/smallimages/");

// const for data base

define("HOST", "localhost:3306");
define("USER", "lotos");
define("PASS", "XrTA2B2Igm3AzBPR");
define("DB_NAME", "my_portfolio");
define("PICTURES", "pictures");

// функция для поключения всех фалов из папки
include CONFIG . 'include_all.php';

// подключаем все файлы из папки /core
include_all(CORE);


