<?php

namespace App\Config;
use Symfony\Component\Dotenv\Dotenv;

$envObject = new Env(new Dotenv());

return [
    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    */

    'driver' => 'mysql',
    'url' => $envObject->env('DATABASE_URL'),
    'host' => $envObject->env('DB_HOST', '127.0.0.1'),
    'port' => $envObject->env('DB_PORT', '3306'),
    'database' => $envObject->env('DB_DATABASE', 'forge'),
    'username' => $envObject->env('DB_USERNAME', 'forge'),
    'password' => $envObject->env('DB_PASSWORD', ''),
    'unix_socket' => $envObject->env('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null
];
