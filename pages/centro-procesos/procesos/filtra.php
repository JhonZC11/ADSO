<?php
require("../../php/db.php");
require("o_procesos.php");
if(isset($_GET['inputFiltro'])){
    $m = $_GET['inputFiltro'];
    session_start();
    setcookie("value", $m, time() + (86400 * 30), "/");
    header("location: ../registroxorden.php");    
} else {
    session_start();
    $_SESSION['notFound'];
    header("location: ../registroxorden.php");    
}
