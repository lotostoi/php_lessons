<?php
define("PUBLIC_FOLDER", $_SERVER['CONTEXT_DOCUMENT_ROOT']);
define("TEMPLATES", PUBLIC_FOLDER . "/../templates/");
define("CONFIG", PUBLIC_FOLDER . "/../config/");
define("MODELS", PUBLIC_FOLDER . "/../models/");
define("CONTROLLERS", PUBLIC_FOLDER . "/../controllers/");
define("CORE", PUBLIC_FOLDER . "/../core/");
define("API", PUBLIC_FOLDER . "/../api/");
define("BIG", "src/bigimages/");
define("SMALL", "src/smallimages/");

/* define("DOMEN", "https://lotos.spb.ru/");
// const for data base

define("HOST", "localhost");
define("USER", "u1048424_root");
define("PASS", "XrTA2B2Igm3AzBPR");
define("DB_NAME", "u1048424_my_portfolio");
define("PICTURES", "pictures");
define("REVIEWS", "reviews");
define("WORKS", "works");
define("WORKS_TO_TAGS", "works_to_tags");
define("TAGS", "tags");
 */

define("DOMEN", "https://php/");
// const for data base

define("HOST", "localhost:3307");
define("USER", "lotos");
define("PASS", "XrTA2B2Igm3AzBPR");
define("DB_NAME", "my_portfolio");
define("PICTURES", "pictures");
define("REVIEWS", "reviews");
define("WORKS", "works");
define("WORKS_TO_TAGS", "works_to_tags");
define("TAGS", "tags");

// VK 
define("VK_ID", "7715811");
define("VK_SICRET_KEY", "G5vf0RSuP1I9aRx41eSM");
define("VK_REDIRECT", DOMEN . "api-auth-vk");

// FB 
define("FB_ID", "836893896877665");
define("FB_SICRET_KEY", "a71ee9339580a71db101ac7f5b35e01c");
define("FB_REDIRECT", DOMEN . "api-auth-fb");


// функция для поДключения всех фалов из папки
include CONFIG . 'include_all.php';

// подключаем все файлы из папки /core
//include_all(CORE);
include_all(MODELS);
include_all(CONTROLLERS);
