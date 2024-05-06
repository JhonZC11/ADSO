<?php
require "db.php";
require "o_proveedores.php";
$identifiacion = $_POST["iden"];
$nombres = $_POST["nombres"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$mail = $_POST["mail"];
$proveedor->insert($conn, $identifiacion, $nombres, $telefono, $direccion, $ciudad, $mail);