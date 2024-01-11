<?php

namespace App\Config;

use Symfony\Component\Dotenv\Dotenv;

class Env
{
    public function __construct(Dotenv $dotenv)
    {
        $EnvPath = __DIR__ . '/../../.env';
        // Load environment variables from .env file (if not already loaded)
        $dotenv->load($EnvPath);
    }

    public function env($envConstantKey, $defaultValue = null): string|null
    {
        // Access environment variables or set default value
        return $_ENV[$envConstantKey] ?? $defaultValue;
    }
}