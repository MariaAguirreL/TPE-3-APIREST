<?php


class BaseModel {

    public function crearConexion () {

        $host='localhost';
        $user='root';
        $password='';
        $database='chocoaras';

         try {
            $pdo= new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user, $password);
        } catch (PDOException $e) {
            die("Error de coneccion");

        }
        return $pdo;
    }
}
