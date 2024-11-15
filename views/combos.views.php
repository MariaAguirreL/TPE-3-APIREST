<?php
require_once ('./libs/Smarty.class.php');//libreria

class CombosView {
    private $smarty;


    public function __construct(){
        // ininicializo smarty
        $this->smarty = new Smarty();

    }

    private function getSmarty(){
        //creo una funcion privada para asignarle variables a la vista y luego se dispare esa views
        return $this->smarty;

    }



    public function mostrarTodos($combos){
        $this->smarty->assign('combos',$combos);
        $this->smarty->display('mostrarCombos.tpl');

    }
    public function mostrarCombo ($fila) {
        $this->smarty->assign('fila',$fila);
        $this->smarty->display('mostrarCombo.tpl'); 
    }
    public function mostrarformnuevocombo($chocolates){
        $this->smarty->assign('chocolates',$chocolates);
        $this->getSmarty()->display('mostrarFormularioNuevoCombo.tpl');
    }
    public function mostrarformeditarCombo($combo,$chocolates){
        
        $this->smarty->assign('combo',$combo);
        $this->smarty->assign('chocolates',$chocolates);
        $this->getSmarty()->display('mostrarFormEditarCombo.tpl');
    }
    //function VerDetalles($combos){

        //$this->getSmarty()->assign("combos", $combos);
        //$this->getSmarty()->display('VerDetalles.tpl');
    //} 
}