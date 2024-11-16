<?php
  
   require_once 'libs/Router/Router.php';
   require_once 'api/controllers/chocolates-api.controller.php';   // Controlador de ofertas de chocolates
   
   $router = new Router();
   
   // Definir las rutas para ofertas
   $router->addRoute('ofertas', 'GET', 'ChocolatesApiController', 'getOfertasChocolates');  // Listar ofertas
   $router->addRoute('ofertas/:ID', 'GET', 'ChocolatesApiController', 'getOfertaChocolate');  // Obtener oferta por ID
   $router->addRoute('ofertas', 'POST', 'ChocolatesApiController', 'nuevaOfertaChocolate');  // Crear una nueva oferta
   $router->addRoute('ofertas/:ID', 'PUT', 'ChocolatesApiController', 'editarOfertaChocolate');  // Editar una oferta existente
   $router->addRoute('ofertas/categoria/{id}', 'GET', 'ChocolatesApiController', 'getOfertasChocolatesPorCategoria');

   // Rutar la solicitud a la acción correspondiente en el controlador
   $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
