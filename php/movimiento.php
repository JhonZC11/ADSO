<?php
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

    public function muestraMovimientos ($conn){
        //$sql = "SELECT * FROM movimientos";
        $sql = "SELECT movimientos.*,
        motivos.descripcion AS nombre_motivo, 
        productos.descripcion AS nombre_producto, 
        proveedores.nombre AS nombre_proveedor, 
        operarios.cedula AS nombre_usuario
        FROM movimientos
        INNER JOIN motivos ON movimientos.motivos_idmotivos = motivos.idmotivos
        INNER JOIN productos ON movimientos.productos_idproductos = productos.idproductos
        INNER JOIN proveedores ON movimientos.proveedores_idproveedores = proveedores.idproveedores
        INNER JOIN operarios ON movimientos.usuarios_idusuarios = operarios.idoperarios";
        $resultado = $conn->query($sql);
        return $resultado;
    }
}