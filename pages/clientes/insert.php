<?php
require "../db.php";
require "o_clientes.php";
$cc=$_POST['cc'];
$nombres=$_POST['nombres']; 
$telefono=$_POST['telefono']; 
$direccion=$_POST['direccion']; 
$ciudad=$_POST['ciudad'];
$correo=$_POST['mail']; 
$fecha=$_POST['fecha'];
$cliente->insert($conn, $cc, $nombres, $telefono, $direccion, $ciudad, $correo, $fecha);