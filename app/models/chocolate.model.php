<?php
    require_once('models/base.model.php');

class ChocolateModel extends BaseModel {

   private $db;

   public function __construct(){
    $this->db=$this->crearConexion ();
   }
 

    //Función que pide a la DB todos los chocolates
    public function getChocolates(){
        $sql = "select * from chocolate"; 
        $query = $this->db->prepare($sql);
        $query->execute();
    
        $chocolates = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $chocolates;
    }

    
    public function getCombosPorChocolate($chocolate){
        
         
        $sql = ("select c.*, ch.SABOR as SABOR from combos c INNER JOIN chocolate ch on c.FK_CHOCOLATE = ch.ID where c.FK_CHOCOLATE = $chocolate");

       
        //SELECT * FROM chocolate JOIN combos ON chocolate.ID=combos.FK_CHOCOLATE WHERE chocolate.ID = ?;
        $query = $this->db->prepare($sql);
        $query->execute(); //la variable chocolate debe pasarse como parametro al execute
    
        $combos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $combos;
    }

    public function guardarChocolate($sabor, $relleno, $empaque){
        $sql = "INSERT INTO chocolate (SABOR, RELLENO, EMPAQUE) VALUES (?, ?, ?)"; 
        $query = $this->db->prepare($sql);
        $query->execute([$sabor, $relleno, $empaque]);
     }

     //Función para traer un chocolate por id
     public function GetByIdChocolate($id) { 
        $sql = "SELECT * FROM chocolate WHERE chocolate.ID=?"; // Quizás quieras traer todos los datos del chocolate
     
        $query = $this->db->prepare($sql);
         
         // Ejecutamos la consulta
        $query->execute([$id]);
     
         //Obtenemos el resultado
         $chocolate = $query->fetch(PDO::FETCH_ASSOC);
     
         return $chocolate;
     }

     public function ChocolateEditado($sabor, $relleno, $empaque){

       
        $sql = "UPDATE chocolate SET(SABOR, RELLENO, EMPAQUE) VALUES (?, ?, ?) WHERE id_chocolate"; 
        $query = $this->db->prepare($sql);
        $query->execute([$sabor, $relleno, $empaque]);
    }

    public function eliminarChocolate($id) {

       
        $sql="DELETE FROM chocolate WHERE chocolate.ID= ?";
        $query = $this->db->prepare($sql);
         $query->execute([$id]);
     }
}
