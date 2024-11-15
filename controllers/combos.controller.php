<?php

require_once 'models/combos.model.php';
require_once 'views/combos.views.php';


class CombosController
{

    private $model; //atributo
    private $view;

    public function __construct()
    {

        $this->model = new CombosModel();

        $this->view = new CombosView();
    }


    public function mostrarCombos()
    {
        //1. Pedirselo a la base de  datOs ----> Modelo --> CombosModel.php
        $combos = $this->model->getCombos(); //arreglo de Combos
        //2. Una vez q lo tengo, enviarselos a la vista --> CombosView.php
        $this->view->mostrarTodos($combos);
    }
    
    public function mostrarCombo($id){
        $fila = $this->model->getById($id);
        
        $this->view->mostrarCombo($fila);
    }
    

    //public function mostrarPorId(){}

    // public function VerDetalles($Combos){
    //$detalles =  $this->CombosModel->getVerDetalles($Combos);
    //$this->CombosViews->VerDetalles($detalles);
    //}
}
