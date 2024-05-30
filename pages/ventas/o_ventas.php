<?php
class venta {

    public function updateStock($conn, $idStock, $cantidad){
        $sql = "UPDATE `stock` SET cantidad='$cantidad' WHERE id='$idStock'";
        if($conn->query($sql)=== TRUE){

            header("location: main.php");
        } else{
            echo "error";
        }
    }

    public function insertaFactura($conn,$n_factura,$fecha,$idStock,$cantidad,$valor_unitario,$total,$operario,$cliente){
        $sql = "INSERT INTO factura_venta (n_factura, fecha, stock_id, cantidad, valor_unitario, total, operarios_idoperarios, clientes_idclientes) 
                VALUES ('$n_factura','$fecha','$idStock','$cantidad','$valor_unitario','$total','$operario','$cliente')";
        if($conn->query($sql)=== TRUE){
            
            header("location: main.php");
        } else{
            echo "error";
        }
    }

    public function buscaCliente($conn, $cliente){
        $idCliente = '';
        $sql = "SELECT idclientes FROM clientes WHERE identificacion = '$cliente'";
        $resultado = $conn->query($sql);
        while ($fila = $resultado->fetch_row()) {
            $idCliente = $fila[0];
        }
        return $idCliente;
    }
}
$venta = new venta;