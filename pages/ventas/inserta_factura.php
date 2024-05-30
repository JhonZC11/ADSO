<?php
require("o_ventas.php");
require("../php/db.php");
$n_factura = $_POST['n_factura'];
$fecha = $_POST['f_factura'];

$idStock = $_POST['id_item'];
$cantidadStock = $_POST['cantidadStock'];
$cantidad = $_POST['cant'];
$cantidadUpdate = $cantidadStock - $cantidad;

$valorUnitario = $_POST['v_kg'];
$total = $cantidad * $valorUnitario;

$operario = isset($_COOKIE['user']) ? $operario= $_COOKIE['user'] : 0;
$cliente = $_POST['cliente'];
//$venta->updateStock($conn, $idStock, $cantidad);
if(isset($_POST)&&isset($_COOKIE['user'])){
    setcookie("bien", "hecho",  time() + 3600, "/");
    $idCliente = $venta->buscaCliente($conn, $cliente);
    $venta->insertaFactura($conn,$n_factura,$fecha,$idStock,$cantidad,$valorUnitario,$total,$operario,$idCliente);
    $venta->updateStock($conn, $idStock, $cantidadUpdate);
} else{
    print_r($_POST);
    echo "Error no se encontró la cookie que permite el registro";
}
