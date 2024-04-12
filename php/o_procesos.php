<?php
require "db.php";

class proceso{

    public function inserta($conn, $operario){
        
    }



    public function buscaOperario($conn, $operario){
        $sql = "SELECT idoperarios FROM operarios WHERE cedula='$operario'";
        $resultado = $conn->query($sql);
        while($fila = $resultado->fetch_row()){
            $idusuario = $fila[0];
        }
        return $idusuario;
    }



}

$proceso = new proceso();