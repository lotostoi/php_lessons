<?php
define("PUBLIC_FOLDER", $_SERVER['CONTEXT_DOCUMENT_ROOT']);
define("TEMPLATES", PUBLIC_FOLDER . "/../templates/");
define("CORE_FOLDER",   PUBLIC_FOLDER . "/../core/");
define("CORE",   PUBLIC_FOLDER . "/../core/functions.php");


include_once CORE;