<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

use App\Library\Database;

$obj = new Database();

echo '<h1>CCC Architecture</h1>';