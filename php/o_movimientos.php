<?php
require "db.php";
require "movimiento.php";
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
$a = new movimiento();
$proveedor_real = $a->proveedor($conn, $proveedor);
$a->insert($conn, $id_item, $motivo_real, $n_factura, $proveedor_real, $f_factura, $cant, $v_kg, $total, $n_movimiento);