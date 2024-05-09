<?php
require "../php/db.php";
require "o_operarios.php";
$cc=$_POST["iden"];
$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$tel=$_POST["telefono"];
$dir=$_POST["direccion"];
$correo=$_POST["mail"];
$operario->insert($conn, $cc, $nombres, $apellidos, $tel, $dir, $correo);