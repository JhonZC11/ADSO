<?php
require("../pages/php/Database.class.php");

$db = new Database;
$conn = $db->getConnection();
header("Content-type: application/json");
$metodo = $_SERVER['REQUEST_METHOD'];


$url =isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';
$b = explode('/', $url);
$fc = ($url!=='/')?end($b):null;

switch($metodo){
    case 'GET':
        getall($conn, $fc);
    break;
    default:
        header("HTTP/1.1 405 Método no permitido");
    break;
}

function getall($conn, $fc){
    if($fc===null){
        $sql = "SELECT * FROM (
            SELECT movimientos.*,
                motivos.descripcion AS nombre_motivo, 
                stock.descripcion AS nombre_producto, 
                proveedores.nombre AS nombre_proveedor, 
                operarios.nombres AS nombre_usuario
            FROM movimientos
            INNER JOIN motivos ON movimientos.motivos_idmotivos = motivos.idmotivos
            INNER JOIN stock ON movimientos.productos_idproductos = stock.id
            INNER JOIN proveedores ON movimientos.proveedores_idproveedores = proveedores.idproveedores
            INNER JOIN operarios ON movimientos.usuarios_idusuarios = operarios.idoperarios
        ) AS movimientos_con_joins
        ORDER BY movimientos_con_joins.fecha_actual DESC";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                $registro = [
                    'idmovimientos' => $fila['idmovimientos'],
                    'n_movimiento' => $fila['n_movimiento'],
                    'n_factura' => $fila['n_factura'],
                    'fecha_factura' => $fila['fecha_factura'],
                    'cantidad' => $fila['cantidad'],
                    'valor_kg' => $fila['valor_kg'],
                    'valor_total' => $fila['valor_total'],
                    'nombre_motivo' => $fila['nombre_motivo'],
                    'nombre_producto' => $fila['nombre_producto'],
                    'nombre_proveedor' => $fila['nombre_proveedor'],
                    'nombre_usuario' => $fila['nombre_usuario']
                ];
                    $result[] = $registro;
                }
                echo json_encode($result);
            }
    } else if($fc === "fc"){
        $sql = "SELECT * FROM (
            SELECT facturas_compras.*,
                proveedores.nombre AS nombre_proveedor, 
                operarios.cedula AS nombre_usuario
            FROM facturas_compras
            INNER JOIN proveedores ON facturas_compras.proveedores_idproveedores = proveedores.idproveedores
            INNER JOIN operarios ON facturas_compras.usuarios_idusuarios = operarios.idoperarios
        ) AS movimientos_con_joins
        ORDER BY movimientos_con_joins.fecha_actual DESC";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                $registro = [
                    'id' => $fila['id'],
                    'n_fc' => $fila['n_fc'],
                    'fecha_factura' => $fila['fecha_factura'],
                    'valor_total' => $fila['vTotal'],
                    'nombre_proveedor' => $fila['nombre_proveedor'],
                    'nombre_usuario' => $fila['nombre_usuario']
                ];
                    $result[] = $registro;
                }
            echo json_encode($result);
        }
    } else {
        header("HTTP/1.1 400 Error");
    }
}