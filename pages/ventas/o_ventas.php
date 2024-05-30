<?php
class venta {

    public function updateStock($conn, $idStock, $cantidad){

    }

    public function insertaFactura($conn,$n_factura,$fecha,$idStock,$cantidad,$valor_unitario,$total,$operario,$cliente){
        $sql = "INSERT INTO factura_venta (n_factura, fecha, stock_id, cantidad, valor_unitario, total, operarios_idoperarios, clientes_idclientes) 
                VALUES ('$n_factura','$fecha','$idStock','$cantidad','$valor_unitario','$total','$operario','$cliente')";
    }
}
$venta = new venta;