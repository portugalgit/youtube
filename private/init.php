<?php


// Autoload: registra uma função para carregar automaticamente classes
spl_autoload_register(function($className) {

     // Transforma namespace em caminho de pasta
    // Exemplo: App\Controllers\Home => App/Controllers/Home.php
    $file = '../private/classes/' . str_replace('\\', '/', $className) . '.php';

    // Verifica se o arquivo existe
    if (file_exists($file)) {
        require $file;
    }else {
        // Mensagem de erro caso o arquivo não seja encontrado
        echo 'Classe não encontrada: ' . $file;
    }

});

// Carrega arquivos essenciais para iniciar a aplicação
require 'config.php';     // Configurações (banco, constantes, ambiente, etc.)
require 'functions.php';  // Funções auxiliares globais
require 'routes.php';     // Definição das rotas da aplicação