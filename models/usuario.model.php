<?php
require_once('./config.php');

class UsuarioModel {

    private $bd;
//es lo que conecta y consulta a la BD
    public function __construct(){ 
         try {
            $this->bd = new PDO("mysql:host=" . HOST . ";dbname=" . BD . ";charset=utf8", USER, PASS);
        } catch (PDOException $e) {
            die("Error de coneccion");

        }
 }

    //Función que pide a la DB todos los usuarios
    public function getUsuario($nombre){
        $sql = "SELECT * from usuarios where nombre = ?"; 
        $query = $this->bd->prepare($sql);
        $query->execute([$nombre]);
    
        $usuario = $query->fetch(PDO::FETCH_OBJ);
    
        return $usuario;
    }

}