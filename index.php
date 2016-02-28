<?php

use Sire\Router;

require __DIR__ . '/vendor/autoload.php'; // Composer autoloader
require __DIR__ . '/config.php'; // SiRe configuration

$alerts = array();
$router = new Router();

$file = $router->process();

function dpm($var,$label="debug")
{
    global $alerts;
    $alerts[] = "$label: " . ( is_string($var) ? $var : print_r($var,TRUE) );
}


