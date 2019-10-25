<?php

spl_autoload_reqister(function($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $classPath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($classPath)) {
        include_once '$classPath';
        return TRUE;
    }
    return FALSE;
});

include_once 'config.php';

\core\Route::init();
