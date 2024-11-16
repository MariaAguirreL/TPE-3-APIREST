<?php
require_once('./config.php');

class ChocoModel {

    private $bd;
//es lo que conecta y consulta a la BD
    public function __construct(){ 
         try {
            $this->bd = new PDO("mysql:host=" . HOST . ";dbname=" . BD . ";charset=utf8", USER, PASS);
        } catch (PDOException $e) {
            die("Error de coneccion");

        }
 }

    //Función que pide a la DB todos los chocolates
    public function getOfertasCombos(){
        $sql = "select * from ofertas"; 
        $query = $this->bd->prepare($sql);
        $query->execute();
    
        $chocolates = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $chocolates;
    }



    public function getOfertaCombo($id) { 
   $sql = "SELECT * FROM ofertas WHERE oferta_ID=?"; // Quizás quieras traer todos los datos del chocolate

   $query = $this->bd->prepare($sql);
    
    // Ejecutamos la consulta
   $query->execute([$id]);

    //Obtenemos el resultado
    $chocolateOferta = $query->fetch(PDO::FETCH_ASSOC);

    return $chocolateOferta;
}
   
public function nuevaOfertaCombo($nombre, $descuento, $id_choco){
        $sql = "INSERT INTO oferta (NOMBRE, DESCUENTO, ID_COMBO) VALUES (?, ?, ?)"; 
        $query = $this->bd->prepare($sql);
        $query->execute([$nombre, $descuento, $id_choco]);
    }



public function editarOfertaCombo($id,$nombre, $descuento, $id_choco){
    $sentence=$this->bd->prepare("UPDATE oferta SET nombre= ?, descuento= ?, id_COMBO= ? WHERE ID_oferta= ?");
    $sentence->execute([$nombre, $descuento, $id_choco, $id]);
    }





public function getOfertasCombosPorChocolate($Id_chocolate){
        
    
        $sql = ("select c.*, ch.SABOR as SABOR from combos c INNER JOIN chocolate ch on c.FK_CHOCOLATE = ch.ID where c.FK_CHOCOLATE = $chocolate");

       
        //SELECT * FROM chocolate JOIN combos ON chocolate.ID=combos.FK_CHOCOLATE WHERE chocolate.ID = ?;
        $query = $this->bd->prepare($sql);
        $query->execute([$Id_chocolate]); //la variable chocolate debe pasarse como parametro al execute
    
        return $query->fetch(PDO::FETCH_OBJ);
 
    }
     






//public function eliminarChocolate($id) {
   //$sentence=$this->bd->prepare("DELETE FROM chocolate WHERE chocolate.ID= ?");
    //$sentence->execute([$id]);
//}
}
    