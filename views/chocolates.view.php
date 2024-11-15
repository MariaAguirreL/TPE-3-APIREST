<?php

require_once ('./libs/Smarty.class.php');

//
class ChocoView{
    private $smarty;


    public function __construct(){
        // ininicializo smarty
        $this->smarty = new Smarty();

    }

    private function getSmarty(){
        //creo una funcion privada para asignarle variables a la vista y luego se dispare esa views
      
        return $this->smarty;

    }

    function mostrarChocolates($chocolates){
        $this->getSmarty()->assign("chocolates", $chocolates);
        $this->getSmarty()->display('mostrarChocolates.tpl');

    }

    function mostrarCombosPorChocolate($combos){
        $this->getSmarty()->assign("combos", $combos);
        $this->getSmarty()->display('mostrarCombosPorChocolates.tpl');
    }
    function mostrarformnuevochocolate(){
        $this->getSmarty()->display('mostrarformularioNuevoChocolate.tpl');
    }
    function mostrarformeditarchocolate($chocolate){
        $this->getSmarty()->assign('chocolate', $chocolate);
        $this->getSmarty()->display('mostrarformeditarChocolate.tpl'); 
    }
    //$this->smarty->assign('chocolate', $chocolate);
    function BorrarChocolate($chocolate){
        $this->getSmarty()->assign('chocolate', $chocolate);
        $this->getSmarty()->display('mostrarFormBorrarChocolate.tpl');

    }
}
