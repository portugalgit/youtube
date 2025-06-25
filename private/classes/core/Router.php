<?php

namespace Core;

/**
 * Declaração da classe Router, que será usada para registrar e gerenciar 
 * rotas de requisições HTTP (como GET e POST).
 */
 class Router
 {
    //Atributo privado $routes: armazena todas as rotas da aplicação.
    private $routes = [];

    //Registra uma rota do tipo GET.
    public function get(string $path, string $handler):void
    {
        $this->routes['GET'][] = ['path'=>$path, 'handler'=>$handler];
    }

    //Registra uma rota do tipo POST.
     public function post(string $path, string $handler):void
    {
        $this->routes['POST'][] = ['path'=>$path, 'handler'=>$handler];
    }

    //Responsável por executar a lógica de roteamento.
    public function run()
    {
        //Verificar se há rotas registradas para esse método
        $method = $_SERVER['REQUEST_METHOD'];
        $method = rtrim($_SERVER['REQUEST_URI'],'/') ? '/';

        if(!isset($this->routes[$method])){

            http_response_code(405);
            echo "metodo não permitido";
            return;

        }
            
            foreach($this->routes[$method] as $route){

                $pattern = preg_replace("#\{[\w-]+\}#", '[\w-]+', $route['path']);
                $pattern = '#^'.$pattern.'$#';

                if(preg_match($pattern, $pathURL))
                {
                    $file = '../private/controllers/'.$route['handler'];
                    if(file_exists($file))
                       require $file;
                    else
                        redirect('404');
                    return;
                }
            }

            http_response_code(404);
            redirect('404');
    }
 }