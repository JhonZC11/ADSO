<?php
require("../../php/db.php");
require("o_inventarios.php");
$m = $_GET['inputFiltro'];
$inv = new inventario();
session_start();
setcookie("value", $m, time() + (86400 * 30), "/");
header("location: ../analisis-diferencias.php");
