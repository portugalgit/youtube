<?php

namespace Core;

/**
 * Classe Router responsável por registrar e gerenciar
 * as rotas de requisições HTTP (GET e POST).
 */
 class Router
 {
    /**
     * @var array $routes Armazena todas as rotas registradas da aplicação
     */
    private $routes = [];

    /**
     * Registra uma rota do tipo GET
     *
     * @param string $path Caminho da rota
     * @param string $handler Controlador associado à rota
     */
    public function get(string $path, string $handler):void
    {
        $this->routes['GET'][] = ['path'=>$path, 'handler'=>$handler];
    }

    /**
     * Registra uma rota do tipo POST
     *
     * @param string $path Caminho da rota
     * @param string $handler Controlador associado à rota
     */
     public function post(string $path, string $handler):void
    {
        $this->routes['POST'][] = ['path'=>$path, 'handler'=>$handler];
    }

    /**
     * Executa a lógica de roteamento, verificando a URI requisitada
     * e incluindo o controlador correspondente, se existir.
     */
    public function run()
    {
        // Obtém o método HTTP (GET ou POST)
        $method = $_SERVER['REQUEST_METHOD'];
        // Obtém e trata a URI requisitada
        $pathURL  = rtrim($_SERVER['REQUEST_URI'],'/') ?: '/';

        // Verifica se há rotas registradas para o método
        if(!isset($this->routes[$method])){

            http_response_code(405); // Método não permitido
            echo "metodo não permitido";
            return;
        }
            // Percorre as rotas registradas para o método atual
            foreach($this->routes[$method] as $route){
                // Converte parâmetros de rota como {id} para regex
                $pattern = preg_replace("#\{[\w-]+\}#", '([\w-]+)', $route['path']);
                $pattern = '#^'.$pattern.'$#';

                // Verifica se a URI requisitada bate com o padrão da rota
                if(preg_match($pattern, $pathURL, $varMatches))
                {
                    array_shift($varMatches);
                    preg_match_aLL("#\{([\w-]+)\}#",$route['$path'],$keyMatches);
                    // Monta o caminho completo para o controlador
                    $file = '../private/controllers/'.$route['handler'];
                    // Verifica se o controlador existe
                    if(file_exists($file)){

                       $params = array_combine($varMatches[1], $varMatches);
                       require $file;
                    }else{
                        redirect('404');
                    }
                    return;
                }
            }

            // Se nenhuma rota corresponder, retorna erro 404
            http_response_code(404);
            redirect('404');
    }
 }