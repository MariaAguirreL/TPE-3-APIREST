<?php

require_once ('./libs/Smarty.class.php');

//
class UsuarioView{
    private $smarty;


    public function __construct(){
        // ininicializo smarty
        $this->smarty = new Smarty();

    }
    private function getSmarty(){
        //creo una funcion privada para asignarle variables a la vista y luego se dispare esa views
        return $this->smarty;

    }

    public function mostrarFormulario(){
        
        $this->getSmarty()->display('mostrarFormulario.tpl');
    }

    public function mostrarPanelDeControl($chocolates,$combos) {
        $this->getSmarty()->assign('chocolates', $chocolates);
        $this->getSmarty()->assign('combos', $combos);
        
        $this->getSmarty()->display('paneldecontrol.tpl');
    }

}