<?php
require "db.php";

class proceso{

    public function inserta(
        $conn, 
        $fecha,
        $operario,
        $itemProcesado,
        $cantidadProcesada,
        $cantidadStock,
        $siguienteItem,
        $costo,
        $costoTotal,
        $cantidadResultado,
        $horas,
        $idProceso,
        $idUsuario
        ){
        $sql = "INSERT INTO procesos(fecha_proceso, fecha_registro, operarios_idoperarios, stock_id, next_item, cantidad_procesada, cantidad_stock, costo, costo_total, cantidad_resultado, horas, usuarios_idusuarios, procesos_id) VALUES ('$fecha',CURRENT_TIMESTAMP,'$operario','$itemProcesado','$siguienteItem','$cantidadProcesada','$cantidadStock','$costo','$costoTotal','$cantidadResultado','$horas','$idUsuario','$idProceso')";        

        if($conn->query($sql)==TRUE){
            echo "Registros ingresados";
        } else {
            echo "Algo salio mal " . $conn->error();
        }

        
    }

    public function stockNextItem($conn, $siguienteItem){
        $sql = "SELECT cantidad FROM stock WHERE id='$siguienteItem'";
        $resultado = $conn -> query($sql);
        while($fila = $resultado -> fetch_row()){
            $nextCantidadStock = $fila[0];
        }
        return $nextCantidadStock;
    }

    public function updateStock($conn, $itemProcesado, $siguienteItem, $cantidadResultado, $cantidadStock, $nextCantidadStock){
        $c = $cantidadStock - $cantidadResultado;
        $cantidad = number_format($c, 2);
        $n = $cantidadResultado + $nextCantidadStock;
        $nextCantidad = number_format($n, 2);
        $sql = "UPDATE stock SET cantidad = '$cantidad' WHERE id = '$itemProcesado'";
        $sql2 = "UPDATE stock SET cantidad = '$nextCantidad' WHERE id = '$siguienteItem'";
        if($conn->query($sql)==TRUE && $conn->query($sql2)==TRUE){
            header("location: ../pages/centro-procesos/procesar.php");
        } else {
            echo "Algo salio mal " . $conn->error();
        }
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