<?php
require("o_ventas.php");
require("../php/db.php");
$n_factura = $_POST['n_factura'];
$fecha = $_POST['f_factura'];
$idStock = $_POST['id_item'];
$cantidad = $_POST['cant'];
$valorUnitario = $_POST['v_kg'];
$total = $_POST['v_total'];
$operario = isset($_COOKIE['user']) ? $operario= $_COOKIE['user'] : 0;
$cliente = $_POST['cliente'];
//$venta->updateStock($conn, $idStock, $cantidad);
if(isset($_POST)&&($operarios)){
    $venta->insertaFactura($conn,$n_factura,$fecha,$idStock,$cantidad,$valor_unitario,$total,$operario,$cliente);
}