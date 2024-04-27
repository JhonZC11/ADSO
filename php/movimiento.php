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
                        //$sql = "UPDATE inventario_secos SET stock='$cantidades[$key]' WHERE id_secos='$idopcion'";
                        $sql3 = "SELECT cantidad FROM stock WHERE id='$idopcion'";
                        $eje = $conn->query($sql3);
                        while($fila = $eje->fetch_row()){
                            $cantidad = intval($fila[0]);
                        }
                        $canti = $cantidades[$key] + $cantidad;
                        $sql2 = "UPDATE stock SET cantidad='$canti' WHERE id='$idopcion'";
                       // $conn->query($sql);
                        $conn->query($sql2);
                }   
                echo $total;
            }
                $jsonDatos = json_encode($datos);
                $sql = "INSERT INTO facturas_compras (n_fc, fecha_factura, fecha_actual, vTotal, proveedores_idproveedores, usuarios_idusuarios, detalle) 
                VALUES  ('$n_factura', '$f_factura', CURRENT_TIMESTAMP, '$total', '$proveedor', '1', '$jsonDatos')";
                $conn->query($sql);
                header("location:../pages/transacciones/facturas.php");
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
            $sql1 = "SELECT CANTIDAD FROM stock WHERE id='$id_item'";
            $eje = $conn->query($sql1);
            while($fila = $eje->fetch_row()){
                $cantidad = intval($fila[0]);
            }
            $canti = $cant + $cantidad;
            $sql = "INSERT INTO movimientos 
            (n_movimiento, n_factura, fecha_factura, fecha_actual, cantidad, valor_kg, valor_total, proveedores_idproveedores, motivos_idmotivos, productos_idproductos, usuarios_idusuarios) 
            VALUES 
            ('$n_movimiento', '$n_factura', '$f_factura', CURRENT_TIMESTAMP, '$cant', '$v_kg', '$total', '$proveedor', '$motivo', '$id_item', '1')";
            $sql2 = "UPDATE stock SET  
            cantidad = '$canti' WHERE id = '$id_item'";
            $sql3 = "UPDATE stock SET cantidad='$canti' WHERE id='$id_item'";
            $exe = $conn->query($sql);
            $e = $conn ->query($sql2);
            $eje=$conn->query($sql3);
            
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
        $numElementosPorPagina = 10;
        $sqlTotal = "SELECT COUNT(*) AS total FROM movimientos";
        $resultadoTotal = $conn->query($sqlTotal);
        $total = $resultadoTotal->fetch_assoc()['total'];
        $numPaginas = ceil($total / $numElementosPorPagina);

        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $paginaActual = max(1, min($numPaginas, $paginaActual));

        $indiceInicio = ($paginaActual - 1) * $numElementosPorPagina;
        intval($indiceInicio);
        $consultaSQL = "SELECT * FROM (
            SELECT movimientos.*,
                motivos.descripcion AS nombre_motivo, 
                stock.descripcion AS nombre_producto, 
                proveedores.nombre AS nombre_proveedor, 
                operarios.cedula AS nombre_usuario
            FROM movimientos
            INNER JOIN motivos ON movimientos.motivos_idmotivos = motivos.idmotivos
            INNER JOIN stock ON movimientos.productos_idproductos = stock.id
            INNER JOIN proveedores ON movimientos.proveedores_idproveedores = proveedores.idproveedores
            INNER JOIN operarios ON movimientos.usuarios_idusuarios = operarios.idoperarios
        ) AS movimientos_con_joins
        ORDER BY movimientos_con_joins.fecha_actual DESC
        LIMIT $indiceInicio, $numElementosPorPagina";
        $resultadoConsulta = $conn->query($consultaSQL);
        // Mostrar los datos obtenidos de la consulta
        while ($a = $resultadoConsulta->fetch_row()) {
            $precio = "$" . number_format($a[7], 0, '.') ; 
            $c = number_format($a[5],0,'.');
            $v = number_format($a[6],0,'.');
            echo 
                "<tr>
                    <td>
                        $a[1]
                    </td>
                    <td>
                        $a[2]
                    </td>
                    <td>
                        $a[3]
                    </td>
                    <td>
                        $a[4]
                    </td>
                    <td>
                        $a[14]
                    </td>
                    <td>
                        $a[12]
                    </td>
                    <td>
                        $a[13]
                    </td>
                    <td>
                        $c
                    </td>
                    <td>
                        $v
                    </td>
                    <td>
                        $precio
                    </td>
                    <td>
                        $a[15]
                    </td>
                </tr>";
        }?>
        </table><br><br><?php
    echo '<div class="paginacion">';
    for ($i = 1; $i <= $numPaginas; $i++) {
        echo '<a href="?pagina=' . $i . '" id="a">' . $i . '</a> ';
    }
    echo '</div>';
    }

    public function muestraFacturas($conn){
        $numElementosPorPagina = 10;
        $sqlTotal = "SELECT COUNT(*) AS total FROM facturas_compras";
        $resultadoTotal = $conn->query($sqlTotal);
        $total = $resultadoTotal->fetch_assoc()['total'];
        $numPaginas = ceil($total / $numElementosPorPagina);

        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $paginaActual = max(1, min($numPaginas, $paginaActual));

        $indiceInicio = ($paginaActual - 1) * $numElementosPorPagina;
        intval($indiceInicio);
        $consultaSQL = "SELECT * FROM (
            SELECT facturas_compras.*,
                proveedores.nombre AS nombre_proveedor, 
                operarios.cedula AS nombre_usuario
            FROM facturas_compras
            INNER JOIN proveedores ON facturas_compras.proveedores_idproveedores = proveedores.idproveedores
            INNER JOIN operarios ON facturas_compras.usuarios_idusuarios = operarios.idoperarios
        ) AS movimientos_con_joins
        ORDER BY movimientos_con_joins.fecha_actual DESC
        LIMIT $indiceInicio, $numElementosPorPagina";
        $resultadoConsulta = $conn->query($consultaSQL);
 
        // Mostrar los datos obtenidos de la consulta
        while ($a = $resultadoConsulta->fetch_row()) {
            $precio = "$" . number_format($a[4], 0, '.') ; 
            $json = json_decode($a[7], true);
            $json_content = '';

            // Iterar sobre los datos del JSON
            foreach ($json as $registro) {
                $vU = "$" . number_format($registro['valor'], 0, '.');
                // Concatenar los datos del registro en la variable
                $json_content .= "<hr>Nombre: " . $registro['descripcion'] . "<br>Cantidad: " . $registro['cantidad'] . "<br>Valor Unidad: " . $vU . "<br><hr>";
            }
            echo 
                "<tr>
                    <td>
                        $a[1]
                    </td>
                    <td>
                        $a[2]
                    </td>
                    <td>
                        $a[3]
                    </td>
                    <td>
                        $precio
                    </td>
                    <td>
                        $a[8]
                    </td>
                    <td>
                        $a[9]
                    </td>
                    <td class='d'>
                        <details><hr>
                            $json_content<hr>
                        </details>
                    </td>
                </tr>";
        }?>
        </table><br><br><?php
    echo '<div class="paginacion">';
    for ($i = 1; $i <= $numPaginas; $i++) {
        echo '<a href="?pagina=' . $i . '" id="a">' . $i . '</a> ';
    }
    echo '</div>';
    }

    public function valorTotalFacturas($conn){
        $t = 0;
        $sql = "SELECT SUM(vTotal) AS total FROM facturas_compras";
        $e = $conn->query($sql);
        while($fila = $e->fetch_assoc()){
            $t = $fila['total'];
        }
        return $t;
    }

    public function valorTotal($conn){
        $t = 0;
        $sql = "SELECT SUM(valor_total) AS total FROM movimientos";
        $e = $conn->query($sql);
        while($fila = $e->fetch_assoc()){
            $t = $fila['total'];
        }
        return $t;
    }
}
$m = new movimiento();