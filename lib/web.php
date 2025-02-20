<?php

use lib\Router;


$router = new Router();

// Registry url 
$router->get('/', 'HomeController', 'index');

//$router->get('/about', 'HomeController', 'about');
//$router->get('/cookie', 'HomeController', 'cookie');
//$router->get('/terms', 'HomeController', 'terms');
//$router->get('/contactus', 'HomeController', 'contactus');


// url Admin
$router->get('/admin', 'AdminController', 'home', 'Admin');
$router->post('/admin/saveimage', 'Controller', 'saveImageAction', 'Admin');
$router->get('/admin/{urlCategory}', 'Controller', 'default', 'Admin');
$router->get('/admin/{urlCategory}/page-{i}', 'Controller', 'default', 'Admin');
$router->get('/admin/{urlCategory}/add', 'Controller', 'addAction', 'Admin');
$router->post('/admin/{urlCategory}/add', 'Controller', 'insert', 'Admin');
$router->get('/admin/{urlCategory}/edit/{id}', 'Controller', 'editAction', 'Admin');
$router->post('/admin/{urlCategory}/edit', 'Controller', 'update', 'Admin');
$router->get('/admin/{urlCategory}/delete/{id}', 'Controller', 'removeAction', 'Admin');
$router->post('/admin/{urlCategory}/delete', 'Controller', 'delete', 'Admin');




// url AUth
$router->get('/login', 'LoginController', 'login', 'Auth');

$router->post('/logout', 'LogoutController', 'logout', 'Auth');

$router->post('/login', 'LoginController', 'checkLogin', 'Auth');

$router->get('/registry', 'RegistryController', 'registry', 'Auth');

$router->post('/registry', 'RegistryController', 'checkRegistry', 'Auth');




$router->get('/{url}', 'HomeController', 'section');
$router->get('/{catUrl}/{urlBlog}', 'HomeController', 'article');

$router->run();
