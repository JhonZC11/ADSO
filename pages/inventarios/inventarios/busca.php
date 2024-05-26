<?php
require "../../php/db.php";
require "o_inventarios.php";
$fecha = $_POST['fInventario'];
$inv = new inventario();
$inv->buscaInventario($conn, $fecha);