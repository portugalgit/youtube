<?php

/**
 * Class Router
 */

 class Router
 {
    private $routes = [];

    public function get(string $path, string $handler):void
    {
        $this->routes['GET'][] = ['path'=>$path, 'handler'=>$handler];
    }

     public function post(string $path, string $handler):void
    {
        $this->routes['POST'][] = ['path'=>$path, 'handler'=>$handler];
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if(!isset($this->routes[$method])){

            http_response_code(405);
            echo "metodo não permitido";
            exit;
        }

        
            http_response_code(404);
            echo "pagina não encontrado";
            exit;
    }
 }