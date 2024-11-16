<?php
require_once 'models/ofertasCombo.model.php';
require_once 'views/api-view.php';


class CombosApiController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ChocoModel();
        $this->view = new APIView();
    }

    public function getOfertaCombos(){
        $ofertas = $this->model->getOfertasCombos();

        return $this->view->response($ofertas, 200);
    }
    public function getOfertaCombo($req){
        $id = $req[':ID'] ?? null;

        $oferta = $this->model->getOfertaCombo($id);

        if(!$oferta){
            return $this->view->response("No existe la oferta con el id = $id", 404);
        }

        return $this->view->response($oferta, 200);
    }
    public function nuevaOfertaCombo($req){
        $body = json_decode(file_get_contents("php://input"));
        
        $nombre = $body->nombre;
        $descuento = $body->descuento;
        $id_combo = $body->id_combo;

        if(empty($nombre) || empty($descuento) || empty($id_combo)){
            return $this->view->response("Faltan completar campos", 401);
        }

        $oferta = $this->model->nuevaOfertaCombo($nombre, $descuento, $id_combo);

        return $this->view->response($oferta, 200);
    }  
    public function editarOfertaCombo($req){
        $id = $req[':ID'] ?? null;  

        if ($id === null) {
            return $this->view->response("Id de oferta no proporcionado", 400);
        }
        

        $oferta = $this->model->getOfertaCombo($id);

        if(!$oferta){
            return $this->view->response("No existe tarea con id = $id", 404);
        }
        $body = json_decode(file_get_contents("php://input"));
        $nombre = $body->nombre;
        $descuento = $body->descuento;
        $id_combo = $body->id_combo;

        if(empty($nombre) || empty($descuento) || empty($id_combo)){
            return $this->view->response("Faltan completar campos", 401);
        }

        $idEditado = $this->model-> editarOfertaCombo($id,$nombre, $descuento, $id_combo);

        return $this->view->response("Oferta editada con éxito, ID = $idEditado" , 200);
    }

    public function getOfertasCombosPorChocolate($req){
        $id = $req[':ID'] ?? null;  

        $combos = $this->model->getOfertasCombosPorChocolate($id);

        if(empty($combos)){
            return $this->view->response("No existe oferta de combo  con el id del chocolate = $id", 404);
        }

        return $this->view->response($combos, 200);
    }

}



  