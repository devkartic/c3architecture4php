<?php

namespace App\Library;

use App\Config\Config;
use App\Exceptions\RouteNotFound;

class App
{
    private static DatabaseConnection $connection;

    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {
        static::$connection = new DatabaseConnection($config->database ?? []);
    }

    public static function db(): DatabaseConnection
    {
        return static::$connection;
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                strtolower($this->request['method'])
            );
        } catch (RouteNotFound) {
            http_response_code(404);
            echo View::make('error/404');
        }
    }
}