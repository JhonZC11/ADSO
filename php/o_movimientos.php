<?php
require "db.php";
$motivo = $_POST["motivo"];
if($motivo=="EAC"){
    $motivo_real = "1";
}
$n_factura = $_POST["n_factura"];
$proveedor = $_POST["proveedor"];
$f_factura = $_POST["f_factura"];
$id_item = $_POST["id_item"];
$cant = intval($_POST["cant"]);
$v_kg = intval($_POST["v_kg"]);
$total = $cant * $v_kg;
$n_movimiento = $n_factura.$motivo_real;
class movimiento{

    public function proveedor($conn, $proveedor){

        $sql = "SELECT idproveedores FROM proveedores WHERE nit='$proveedor'";
        $ejecuta = $conn->query($sql);
        while ($fila = $ejecuta->fetch_row()){
            $proveedor_real = $fila[0];
        }
        return $proveedor_real;
    }

    public function insert(
        $conn, 
        $id_item,
        $motivo,
        $n_factura,
        $proveedor,
        $f_factura,
        $cant, 
        $v_kg, 
        $total,
        $n_movimiento 
        )
        {
        if($motivo==""||
        $n_factura==""||
        $proveedor==""||
        $f_factura==""||
        $id_item==""||
        $cant==""||
        $v_kg=="")
        {
            echo "Error, campos errados";
        }
        else{
            $sql1 = "SELECT CANTIDAD FROM inventario_stock WHERE productos_idproductos='$id_item'";
            $eje = $conn->query($sql1);
            while($fila = $eje->fetch_row()){
                $cantidad = intval($fila[0]);
            }
            $canti = $cant + $cantidad;
            $sql = "INSERT INTO movimientos 
            (n_movimiento, n_factura, fecha_factura, fecha_actual, cantidad, valor_kg, valor_total, proveedores_idproveedores, motivos_idmotivos, productos_idproductos, usuarios_idusuarios) 
            VALUES 
            ('$n_movimiento', '$n_factura', '$f_factura', CURRENT_TIMESTAMP, '$cant', '$v_kg', '$total', '$proveedor', '$motivo', '$id_item', '1')";
            $sql2 = "UPDATE inventario_stock SET  
            cantidad = '$canti' WHERE productos_idproductos = '$id_item'";
            $exe = $conn->query($sql);
            $e = $conn ->query($sql2);
            header("location:../pages/transacciones/movimientos.php");
        }

    }

    public function trae($conn){
        $sql = "SELECT nit, nombre FROM proveedores";
        $resultado = $conn->query($sql);
        $proveedores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $proveedores[] = $fila;
        }
        $json =json_encode($proveedores); 
        return $json;
    }
}
$a = new movimiento();
$proveedor_real = $a->proveedor($conn, $proveedor);
$a->insert($conn, $id_item, $motivo_real, $n_factura, $proveedor_real, $f_factura, $cant, $v_kg, $total, $n_movimiento);