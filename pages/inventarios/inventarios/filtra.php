<?php
require("../../php/db.php");
require("o_inventarios.php");
$inv = new inventario();
if(isset($_GET['inputFiltro'])){
    $m = $_GET['inputFiltro'];
    session_start();
    setcookie("value", $m, time() + (86400 * 30), "/");
    header("location: ../analisis-diferencias.php");    
} else {
    session_start();
    $_SESSION['notFound'];
    header("location: ../analisis-diferencias.php");
}
