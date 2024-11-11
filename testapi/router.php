<?php
    
    
    
    require_once 'router/router2.php';
    require_once 'controlador/controlador.php';
   
    
   
    $router = new Router();

             
 
    $router->addRoute('listar', 'GET', 'controlador', 'GetList_GetDesc');
    $router->addRoute('listar/:id', 'GET', 'controlador', 'GetId');
    $router->addRoute('listar/:id', 'PUT', 'controlador', 'editCars');
    $router->addRoute('listar', 'POST', 'controlador', 'InsertCars');
    $router->addRoute('paginar', 'GET', 'controlador', 'Paginar');
    $router->addRoute('crear-columna', 'POST', 'controlador', 'CreateColumn');
    $router->addRoute('autos/:id/oferta', 'PUT', 'controlador', 'ModifyOferta');


    

    
   
    
   

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);