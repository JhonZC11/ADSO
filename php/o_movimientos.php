<?php
require "db.php";
require "movimiento.php";
$a = new movimiento();
$n_factura = $_POST["n_factura"];
$proveedor = $_POST["proveedor"];
$f_factura = $_POST["f_factura"];
$id_item = $_POST["id_item"];
$items = $_POST['items'];
$cantidades = $_POST['cantd'];
$cant = intval($_POST["cant"]);
$v_kg = intval($_POST["v_kg"]);
$total = $cant * $v_kg;

$motivo = $_POST["motivo"];
if($motivo=="EAC"){
    $motivo_real = "1";
    $n_movimiento = $n_factura.$motivo_real;
    $proveedor_real = $a->proveedor($conn, $proveedor);
    $a->insert($conn, $id_item, $motivo_real, $n_factura, $proveedor_real, $f_factura, $cant, $v_kg, $total, $n_movimiento);
} else if ($motivo=="DB") {
    $motivo_real = "2";
    $a->insertaBaja($conn, $id_item, $motivo_real, $cant, $f_factura);
} else if ($motivo=="FC"){
    $motivo_real = "3";
    $n_movimiento = $n_factura.$motivo_real;
    $proveedor_real = $a->proveedor($conn, $proveedor);
    $a->insertFC($conn,$motivo, $n_factura, $proveedor_real, $f_factura, $items,$cantidades);
}



