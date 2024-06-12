<?php
class general{
    public function traeBalance($conn){
        $sql = "SELECT valor FROM balance";
        $result = $conn->query($sql);
        while($row = $result->fetch_row()){
            $valor_db = $row[0];
        }
        return $valor_db;
    }
    public function actualizaBalance($conn, $valor_db, $valor, $tipo){
        if($tipo=="1"||$tipo=="2"){
            $valorActualizado = $valor_db + $valor;
            $sql = "UPDATE balance SET valor='$valorActualizado' WHERE id='$tipo'";
            $conn->query($sql);
        }else {
            die;
        }
    }
}
$general = new general();