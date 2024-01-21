<?php

namespace App\Library;

use App\Exceptions\ViewNotFound;

class View
{

    /**
     * @param string $string
     */
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public static function make(string $view, $params = [])
    {
        return new static($view, $params);
    }

    public function render(): false|string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        if(!file_exists($viewPath)){
            throw new ViewNotFound();
        }

        foreach ($this->params as $key => $value){
            $$key = $value;
        }

        ob_start();
        include $viewPath;
        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}