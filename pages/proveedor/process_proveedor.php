<?php
require("../php/db.php");
require("o_proveedores.php");
$id = $_POST["id"];
$identificador = $_POST["iden"];
$nom = $_POST["nombres"];
$mail = $_POST["mail"];
$dir = $_POST["dir"];
$ciudad = $_POST["ciudad"];
$tel = $_POST["telefono"];
$proveedor->update($conn, $id, $identificador, $nom, $tel, $dir, $ciudad, $mail);