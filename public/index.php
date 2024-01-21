<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

include 'App/bootstrap.php';

use App\Config\Config;
use App\Library\App;
use App\Library\Router;

$router = new Router();

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';

$router
    ->get('/', [\App\Controllers\HomeController::class, 'index']);


(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();



