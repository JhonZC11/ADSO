<?php
require("../../php/db.php");
require "o_procesos.php";
require("../../general/o_balance.php");
$operario = $_POST['cc'];
$fecha = $_POST['fecha'];
$itemProcesado = $_POST['item'];
$cantidadProcesada = $_POST['cantidad'];
$cantidadStock = $_POST['cantidadStock'];
$siguienteItem = $_POST['nextId'];
$costo = $_POST['costo'];
$costoTotal = $_POST['costoTotal'];
$cantidadResultado = $_POST['cantidadTotal'];
$horas = $_POST['horas'];
$idProceso = $_POST['idProceso'];
print_r($_POST);
$idUsuario = $proceso->buscaOperario($conn, $operario);
$proceso->inserta($conn, $fecha, $operario, $itemProcesado, $cantidadProcesada, $cantidadStock, $siguienteItem, $costo, $costoTotal, $cantidadResultado, $horas, $idUsuario, $idProceso);
$nextCantidadStock = $proceso->stockNextItem($conn, $siguienteItem);
$proceso->updateStock($conn, $itemProcesado, $siguienteItem, $cantidadResultado, $cantidadStock, $nextCantidadStock);
//Usamos el objeto del balance para actualizarlo desde el movimiento que hagamos
$valor_db = $general->traeBalance($conn);
$general->actualizaBalance($conn, $valor_db, $costoTotal, "2");