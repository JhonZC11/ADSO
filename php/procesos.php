<?php
require "o_procesos.php";
require "db.php";
$operario = $_POST['cc'];
$fecha = $_POST['fecha'];
$itemProcesado = $_POST['item'];
$cantidadProcesada = $_POST['cantidad'];
$siguienteItem = $_POST['nextId'];
$costo = $_POST['costo'];
$costoTotal = $_POST['costoTotal'];
$cantidadResultado = $_POST['cantidadTotal'];
$horas = $_POST['horas'];
$idProceso = $_POST['idProceso'];
$idUsuario = $proceso -> buscaOperario($conn, $operario);
if($itemProcesado=="1"){
    
}