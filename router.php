<?php
  
   require_once 'libs/Router/Router.php';
   require_once 'controllers/combo.api.controller.php';   // Controlador de ofertas de chocolates
   
   $router = new Router();
   
   // Definir las rutas para ofertas
   $router->addRoute('ofertas', 'GET', 'CombosApiController', 'getOfertaCombos');  // Listar ofertas
   $router->addRoute('ofertas/:ID', 'GET', 'CombosApiController', 'getOfertaCombo');  // Obtener oferta por ID
   $router->addRoute('ofertas', 'POST', 'CombosApiController', 'nuevaOfertaCombo');  // Crear una nueva oferta
   $router->addRoute('ofertas/:ID', 'PUT', 'CombosApiController', 'editarOfertaCombo');  // Editar una oferta existente
   $router->addRoute('ofertas/chocolate/:ID', 'GET', 'CombosApiController', 'getOfertasCombosPorChocolate');

   // Rutar la solicitud a la acción correspondiente en el controlador
   $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
