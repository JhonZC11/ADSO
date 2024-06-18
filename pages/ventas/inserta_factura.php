<?php
require("o_ventas.php");
require("../php/db.php");
require("../general/o_balance.php");
$n_factura = $_POST['n_factura'];
$fecha = $_POST['f_factura'];

$idStock = $_POST['id_item'];
$cantidadStock = $_POST['cantidadStock'];
if($cantidadStock=="0"){
    echo "No hay stock disponible para este item";
    setcookie("stock", "error",  time() + 3600, "/");
    header("location: main.php");
    die;
}
$cantidad = $_POST['cant'];
$cantidadUpdate = $cantidadStock - $cantidad;

$valorUnitario = $_POST['v_kg'];
$total = $cantidad * $valorUnitario;

$operario = isset($_COOKIE['user']) ? $operario = $_COOKIE['user'] : 0;
$cliente = $_POST['cliente'];
//$venta->updateStock($conn, $idStock, $cantidad);
if (isset($_POST) && isset($_COOKIE['user'])) {
    setcookie("bien", "hecho",  time() + 3600, "/");
    $idCliente = $venta->buscaCliente($conn, $cliente);
    $venta->insertaFactura($conn, $n_factura, $fecha, $idStock, $cantidad, $valorUnitario, $total, $operario, $idCliente);
    $venta->updateStock($conn, $idStock, $cantidadUpdate);
    //Usamos el objeto del balance para actualizarlo desde el movimiento que hagamos
    $valor_db = $general->traeBalance($conn);
    $general->actualizaBalance($conn, $valor_db, $total, "1"); //Ganancias id 1
} else {
    print_r($_POST);
    echo "Error no se encontró la cookie que permite el registro";
    setcookie("mensaje", "error",  time() + 3600, "/");
    header("location: main.php");
}
