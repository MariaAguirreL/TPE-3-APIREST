<?php
    require_once('models/base.model.php');

class UsuarioModel extends BaseModel {

   private $db;

   public function __construct(){
    $this->db=$this->crearConexion ();
   }

    //Función que pide a la DB todos los usuarios
    public function getUsuario($nombre){
        $sql = "SELECT * from usuarios where nombre = ?"; 
        $query = $this->db->prepare($sql);
        $query->execute([$nombre]);
    
        $usuario = $query->fetch(PDO::FETCH_OBJ);
    
        return $usuario;
    }

}