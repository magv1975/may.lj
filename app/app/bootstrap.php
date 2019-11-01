<?php

session_start();

/**
 * 
 * @return string app path from server root
 */
function getAppPath() {
    return $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR;
}

/**
 * Возвращает указанныйпуть на текущем сайте
 * 
 * @param string $path дополнительный путь сайта
 */
function url(string $path = null) {
    if ($_SERVER['SERVER_PORT'] === '80') {
	$scheme = 'http';
    } else if ($_SERVER['SERVER_PORT'] === '443') {
	$scheme = 'https';
    }
    return $scheme . '://' . $_SERVER['HTTP_HOST'] . $path;
}

spl_autoload_register(function($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $classPath = getAppPath() . $class . '.php';
    if (file_exists($classPath)) {
	include_once $classPath;
	return true;
    }
    return false;
});

include_once 'config.php';

\core\Route::init();
