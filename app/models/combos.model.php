<?php
    require_once('models/base.model.php');

class CombosModel extends BaseModel {

   private $db;

   public function __construct(){
    $this->db=$this->crearConexion ();
   }

   public function getCombos(){
    $sql = "select * from combos";//seleccioname todo de la tabla combos asterisco todo.
    $query = $this->db->prepare($sql);
    $query->execute();
    $combos = $query->fetchAll(PDO::FETCH_OBJ);//muchos combos trae todos
    return $combos;
}

    public function getById($id){
    $sql = "SELECT * FROM combos JOIN chocolate ON combos.FK_CHOCOLATE=chocolate.ID where combos.ID = ?";//seleccioname todo de la tabla combos asterisco todo.
    $query = $this->db->prepare($sql);
    $query->execute([$id]);
    $filadelatabla = $query->fetch(PDO::FETCH_OBJ);//muchos combos trae todos
    return $filadelatabla;
}
    public function guardarCombo($nombre, $fk_chocolate){
    $sql = "INSERT INTO combos (NOMBRE, FK_CHOCOLATE) VALUES (?, ?)"; 
    $query = $this->db->prepare($sql);
    $query->execute([$nombre, $fk_chocolate]);
}
public function prueba() {
    $query=$this->db->prepare('select * from combos '); //donde vuelvo a definir bd?
    $query->execute([3]);
    $combos =$query->fetchAll(PDO::FETCH_OBJ);//Selecciono algunos objetos
    //echo '<p>'.$combo.'</p>';
    return var_dump($combos);
}

public function getComboById($id){
    $sql = "SELECT * FROM combos where combos.ID = ?";//seleccioname todo de la tabla combos asterisco todo.
    $query = $this->db->prepare($sql);
    $query->execute([$id]);
    $filadelatabla = $query->fetch(PDO::FETCH_OBJ);//muchos combos trae todos
    return $filadelatabla;
}
public function guardarComboEditado ($id,$nombre, $fk_chocolate){
    
    $sentence=$this->db->prepare("UPDATE combos SET NOMBRE= ?, FK_CHOCOLATE= ? WHERE combos.ID= ?");
    $sentence->execute([$nombre,$fk_chocolate,$id]);
}
public function eliminarCombo ($id){
    $sentence=$this->db->prepare("DELETE FROM combos WHERE combos.ID= ?");
    $sentence->execute([$id]);
 }

}