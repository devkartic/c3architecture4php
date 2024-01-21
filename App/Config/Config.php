<?php

namespace App\Config;

class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'database' => [
                'driver' => $env['DB_DRIVER'] ?? 'mysql',
                'host' => $env['DB_HOST'],
                'user' => $env['DB_USER'],
                'password' => $env['DB_PASSWORD'],
                'database' => $env['DB_NAME']
            ],
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}