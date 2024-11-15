<?php
    require_once 'controllers/chocolates.controller.php';
    require_once 'controllers/combos.controller.php';
    require_once 'controllers/usuario.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (empty($_GET['action'])) {
    $_GET['action']="home";  // 
}

// parsea la accion 
$action = $_GET['action'];
$params = explode('/', $action); // genera un arreglo
    
switch ($params[0]) {
    case 'home':
        $controller = new ChocolatesController();
        $controller->mostrarChocolates();
        break;
    case 'chocolates':
        $controller = new ChocolatesController();
        $controller->mostrarChocolates();
        break;
    case 'combosporchocolate'://HAY QUE MODIFICAR ESTE NOMBRE
        $controller = new ChocolatesController();
        $controller->mostrarCombosPorChocolate($params[1]);
        break;
    case 'combos':
        if(isset($params[1])){
            $controller = new CombosController();
            $controller->mostrarCombo($params[1]);
        }
        else {
            $controller = new CombosController();
            $controller->mostrarCombos();
        }
    break;
    case 'loggin': //a chequear 
        $controller=new UsuarioController();
        $controller->mostrarFormularioDeLoggin();
        break;
    case 'Iniciarsesion':
        $controller=new UsuarioController();
        $controller->verificarInicioDeSesion();
        break;
    case 'paneldecontrol':
            $controller=new UsuarioController();
            $controller->mostrarPanelDeControl();
            break;
    case 'logout':
        $controller=new UsuarioController();
        $controller->logout();
        break;
    case 'formnuevochocolate':
        $controller=new UsuarioController();
        $controller->mostrarformnuevochocolate();
        break;
        case 'agregarchocolate':
            $controller=new UsuarioController();
            $controller->agregarchocolate();
            break;
        case 'formnuevocombo':
            $controller=new UsuarioController();
            $controller->mostrarformnuevocombo();
            break;
        case 'agregarcombo':
             $controller=new UsuarioController();
             $controller->agregarcombo();
            break;

        case 'formeditarcombo':
             $controller=new UsuarioController();
             if($params[1]=="guardarcomboeditado"){
               
                $controller->guardarComboEditado();
            
             }
             else {
             $controller->mostrarformeditarCombo($params[1]);
             }
            break;
       
        case 'borrarcombo':
            $controller=new UsuarioController();
              
            $controller->eliminarCombo($params[1]);
           
        break;
        case 'formeditarchocolate':
            $controller=new UsuarioController();
            if($params[1]=="guardarchocolateeditado"){
                
            $controller->guardarChocolateEditado();
    
            }
            else {
        
            $controller->mostrarformeditarChocolate($params[1]);
            }
           break;
          //  $controller=new UsuarioController();
            //if(isset($params[1])){
            //$controller->mostrarformeditarChocolate($params[1]);
            //}
           // break;
        //case 'editarchocolate':
           // $controller=new UsuarioController();
           // if(isset($params[1])){
           // $controller->editarchocolate($params[1]);
            
           // }
           // break;
        //case 'formeditarchocolate':
           // $controller=new UsuarioController();
           // $controller->mostrarformeditarChocolate();
    
          // break;
        //case 'editarchocolate':
          // $controller=new UsuarioController();
          // if(isset($id)){
          // $controller->editarChocolate($id);
           // }
         //break;
         case 'borrarchocolate':
            $controller=new UsuarioController();
              
            $controller->eliminarChocolate($params[1]);
           
        break;
            //if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'eliminarChocolate') {
               // $id = $_GET['id']; // Asegúrate de validar y sanitizar este valor
               // $controller = new UsuarioController();
               // $controller->eliminarChocolate($id);
           // }
           //break;
    default:
        echo "404 not found";
        break;
}




