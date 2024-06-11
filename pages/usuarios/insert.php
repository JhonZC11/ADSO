<?php
require "../php/Database.class.php";
require "o_operarios.php";
/*$cc=$_POST["iden"];
$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$tel=$_POST["telefono"];
$dir=$_POST["direccion"];
$correo=$_POST["mail"];*/
$operario->insert($_POST['iden'],$_POST['nombres'], $_POST['apellidos'], $_POST['telefono'], $_POST['direccion'], $_POST['mail']);
header("location: ../operarios.php");
