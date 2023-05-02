<?php

require_once BASE_PATH . 'kernel/index.php';
require_once BASE_PATH . "env.php";
require_once BASE_PATH . 'database/index.php';


spl_autoload_register(function($className){
    $path = BASE_PATH . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR;
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    include $path . $className . '.php';
});





