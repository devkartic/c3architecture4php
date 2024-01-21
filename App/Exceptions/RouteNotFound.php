<?php

namespace App\Exceptions;

class RouteNotFound extends \Exception
{
    protected $message = 'Route not found!';
}