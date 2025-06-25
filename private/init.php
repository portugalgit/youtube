<?php

//procura todas as classes
spl_autoload_register(function($className){

    //localização das classes
    $file = '../private/classes/'. str_replace('\\','/', $className).'.php';
    if(file_exists($file))
        require $file;
    else
        echo 'Classe não encontrada: '.$file;
});

//carrega todos os files
require 'config.php';
require 'functions.php';
require 'routes.php';