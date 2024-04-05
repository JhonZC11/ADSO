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

    public function insertaBaja(
        $conn, 
        $id_item,
        $motivo,        
        $cant, $fecha){
            if($motivo==""||$id_item==""||$cant=="")
                {echo "Error, campos errados";}
            else {
                $n = "N/A";
                $sql = "INSERT INTO movimientos 
                        (productos_idproductos, motivos_idmotivos, 
                        cantidad, proveedores_idproveedores, 
                        usuarios_idusuarios, fecha_factura, 
                        fecha_actual, n_movimiento, n_factura) 
                        VALUES 
                        ('$id_item', '$motivo', '$cant', '5', '1', 
                        '$fecha', CURRENT_TIMESTAMP, '2', '$n')";
                         $conn->query($sql);

                $sql1 = "SELECT CANTIDAD FROM stock WHERE id='$id_item'";
                $eje = $conn->query($sql1);
                while($fila = $eje->fetch_row()){
                    $cantidad = intval($fila[0]);
                }
                $canti = $cantidad - $cant;
                $sql2 = "UPDATE stock SET  
                cantidad = '$canti' WHERE id = '$id_item'";
                $conn->query($sql2);
                header("location:../pages/transacciones/movimientos.php");
            }
        }

    public function insertFC(
        $conn, $motivo, $n_factura, $proveedor, $f_factura, $items, $cant) {
            if ($motivo == "" || $cant == "" || $n_factura == "" || $proveedor == "" || $f_factura == "" || $items == "") {
                echo "Error, campos errados";
            } else {
                $cantidades = array_filter($cant);
                $cantidades = array_values($cantidades);
                $datos = array();
                $ids = array();
                $valorT = 0;
                $total =0;
                foreach ($items as $key => $opcion) {
                        $opcionYUnidad = explode('_', $opcion);
                        $idopcion = $opcionYUnidad[0];
                        $opcionSeleccionada = $opcionYUnidad[1];
                        $unidadSeleccionada = $opcionYUnidad[2];
                        $valorT = $unidadSeleccionada * $cantidades[$key];
                        $total += $valorT;
                        $datos[] = array(
                            'id' => $idopcion,
                            'descripcion' => $opcionSeleccionada,
                            'valor' => $unidadSeleccionada,
                            'cantidad'=> $cantidades[$key],
                            'vTotal'=>$valorT
                        );
                        $ids[] = array($idopcion);
                        $sql = "UPDATE inventario_secos SET stock='$cantidades[$key]' WHERE id_secos='$idopcion'";
                        $conn->query($sql);
                }   
                echo $total;
            }
                $jsonDatos = json_encode($datos);
                $sql = "INSERT INTO facturas_compras (n_fc, fecha_factura, fecha_actual, vTotal, proveedores_idproveedores, usuarios_idusuarios, detalle) 
                VALUES  ('$n_factura', '$f_factura', CURRENT_TIMESTAMP, '$total', '$proveedor', '1', '$jsonDatos')";
                $conn->query($sql);
                header("location:../pages/transacciones/movimientos.php");
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
$m = new movimiento();