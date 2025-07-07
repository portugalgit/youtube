<?php

// Importa (faz uso) da classe Router que está dentro do namespace Core
use \Core\Router as Router;
// Cria uma nova instância do roteador
$router = new Router;

// Registra uma rota do tipo GET para a página inicial ("/") que carrega o arquivo "home.php"
$router->get('/','home.php');

// Registra rotas GET para as páginas de login e cadastro
$router->get('/login','auth/login.php');
$router->get('/signup','auth/signup.php');

// Registra rotas POST para processar o envio dos formulários de login e cadastro
$router->post('/login','auth/login.php');
$router->post('/signup','auth/signup.php');

// Rota para exibir perfil de um usuário com base no ID
$router->get('/profile/{id}','profile.php');
// Rota para editar perfil, também com ID
$router->get('/profile/edit/{id}','profile.php');
// Rota para excluir perfil, recebendo duas variáveis: categoria e ID
$router->get('/profile/delete/{cat}/{id}','profile.php');

// Inicia o roteador para começar a processar as rotas registradas
$router->run();