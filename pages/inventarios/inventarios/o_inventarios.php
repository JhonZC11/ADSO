<?php
class inventario {

    public function insertaInventario($conn, $n_inventario, $fecha, $tipo, $detalle, $user){
        $estado = "Revision";
        $sql = "INSERT INTO inventarios 
        (n_inventario, fecha, estado, tipo, detalle, usuarios_idusuarios) 
        VALUES ('$n_inventario', '$fecha','$estado', '$tipo', '$detalle', '$user')";
        if ($conn->query($sql) === TRUE) {
            header ("location: ../pages/inventarios/ingresos-fisicos.php");
        } else {
            echo "Error al almacenar el JSON en la base de datos: " . $conn->error;
        }
    }

}