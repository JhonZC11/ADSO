<?php
require "../php/Database.class.php";
require "o_operarios.php";
$id = $_POST["id"];
$nombres=$_POST["nombres"];
$apellidos=$_POST["ape"];
$dir=$_POST["direccion"];
$tel=$_POST["telefono"];
$correo=$_POST["mail"];
$operario->update($id, $nombres, $apellidos, $tel, $dir, $correo);
header("location: ../operarios.php");
