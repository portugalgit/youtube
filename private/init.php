<?php

//procura todas as classes
spl_autoload_register(function($className){
    //localização das classes
    $file = '../private/classes/' .$className;
    echo $file;
})
//carrega todos os files
require 'config.php';
require 'functions.php';
require 'routes.php';