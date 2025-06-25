<?php

use \Core\Router as Router;

$router = new Router;

$router->get('/','home.php');

$router->get('/login','auth/login.php');
$router->get('/signup','auth/signup.php');

$router->post('/login','auth/login.php');
$router->post('/signup','auth/signup.php');

$router->get('/profile/{id}','profile.php');
$router->get('/profile/edit/{id}','profile.php');
$router->get('/profile/delete/{cat}/{id}','profile.php');

$router->run();