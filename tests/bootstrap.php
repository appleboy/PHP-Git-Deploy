<?php

// Errors on full!
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
$dir = realpath(dirname(__FILE__));

function loader($class)
{
    $file = $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_register('loader');