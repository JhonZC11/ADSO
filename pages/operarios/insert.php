<?php
require "../php/db.php";
require "o_operarios.php";
/*$cc=$_POST["iden"];
$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$tel=$_POST["telefono"];
$dir=$_POST["direccion"];
$correo=$_POST["mail"];*/

if($_SERVER['REQUEST_METHOD'] == 'POST' 
&& isset($_POST['cc']) && isset($_POST['nombres']) && isset($_POST['apellidos'])  && isset($_POST['tele']) && isset($_POST['dir']) && isset($_POST['correo'])){
    $operario->insert($_POST['cc'],$_POST['nombres'], $_POST['apellidos'], $_POST['tele'], $_POST['dir'], $_POST['correo']);
}