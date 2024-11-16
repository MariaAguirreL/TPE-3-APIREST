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

 public function getOfertasCombos($filtros = [], $ordenarPor = null, $orden = 'ASC') {
    $sql = "SELECT * FROM ofertas";
    $valores = [];//array donde se van a guardar para reemplazar los valores en cada ? de la consulta SQL

    // Aplicar filtros opcionales
    if (!empty($filtros['id_combo'])) {//Si se pasa un valor para id_combo, se añade una cláusula AND id_producto = ? a la consulta SQL, y el valor de id_producto se guarda en el array $valores.
        $sql .= " AND id_combo = ?";
        $valores[] = $filtros['id_combo'];
    }
    if (!empty($filtros['descuento_min'])) {//combos con descuentos minimos de x
        $sql .= " AND descuento >= ?";
        $valores[] = $filtros['descuento_min'];
    }
   
    // Si el $ordenarPor esta pasado por parametro
    if ($ordenarPor) {
        $sql .= " ORDER BY $ordenarPor $orden";
    }

    $query = $this->bd->prepare($sql);
    $query->execute($valores);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

    //Función que pide a la DB todos los chocolates
    /*public function getOfertasCombos(){
        $sql = "select * from ofertas"; 
        $query = $this->bd->prepare($sql);
        $query->execute();
    
        $chocolates = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $chocolates;
    }*/



    public function getOfertaCombo($id) { 
   $sql = "SELECT * FROM ofertas WHERE id=?"; // Quizás quieras traer todos los datos del chocolate

   $query = $this->bd->prepare($sql);
    
    // Ejecutamos la consulta
   $query->execute([$id]);

    //Obtenemos el resultado
    $chocolateOferta = $query->fetch(PDO::FETCH_ASSOC);

    return $chocolateOferta;
}
   
public function nuevaOfertaCombo($nombre, $descuento, $id_combo){
        $sql = "INSERT INTO ofertas (nombre, descuento, id_combo) VALUES (?, ?, ?)"; 
        $query = $this->bd->prepare($sql);
        $ofertas=$query->execute([$nombre, $descuento, $id_combo]);
        return $ofertas;
        
    }



public function editarOfertaCombo($id,$nombre, $descuento, $id_choco){
    $sentence=$this->bd->prepare("UPDATE ofertas SET nombre= ?, descuento= ?, id_combo= ? WHERE id= ?");
    $sentence->execute([$nombre, $descuento, $id_choco, $id]);
    return $id;
    }





public function getOfertasCombosPorChocolate($Id_chocolate){

    $sql = "SELECT o.*, c.nombre AS combo_nombre, ch.sabor AS chocolate_nombre 
    FROM ofertas o 
    INNER JOIN combos c ON o.id_combo = c.id 
    INNER JOIN chocolate ch ON c.id= ch.id 
    WHERE ch.id = ?";  


$query = $this->bd->prepare($sql);
$query->execute([$Id_chocolate]);

$c=$query->fetchAll(PDO::FETCH_ASSOC);
return $c;
        
 
}
}
    