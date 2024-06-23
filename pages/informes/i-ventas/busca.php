<?php
require("../../php/db.php");
require("o_ventas.php");
if(isset($_POST['fecha_inicio'])&&isset($_POST['fecha_fin'])){
    $fi = $_POST['fecha_inicio'];
    $ff = $_POST['fecha_fin'];
    session_start();
    setcookie("fecha_inicio", $fi, time() + (86400 * 30), "/");
    setcookie("fecha_fin", $ff, time() + (86400 * 30), "/");
    header("location: ../ventas.php");   
    //buscarFecha
} else if(isset($_POST['fecha_inicio'])){
    $f = $_POST['fecha_inicio'];
    session_start();
    setcookie("f", $f, time() + (86400 * 30), "/");
    header("location: ../ventas.php");   
    //buscaFecha
}else if($_POST['operario']){
    $op = $_POST['operario'];
    setcookie("op", $op, time() + (86400 * 30), "/");
    header("location: ../ventas.php");   
    //buscaOperario
}else if($_POST['fecha_inicio']&&$_POST['fecha_fin']&&$_POST['operario']){
    $fi = $_POST['fecha_inicio'];
    $ff = $_POST['fecha_fin'];
    $op = $_POST['operario'];
    session_start();
    setcookie("fi", $fi, time() + (86400 * 30), "/");
    setcookie("ff", $ff, time() + (86400 * 30), "/");
    setcookie("op", $op, time() + (86400 * 30), "/");
    header("location: ../ventas.php");   
    //buscarAll
}else {
    session_start();
    $_SESSION['notFound'];
    header("location: ../ventas.php");  
}