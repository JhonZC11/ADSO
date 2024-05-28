<?php
require("../../php/db.php");
require("o_inventarios.php");
$idBorrar = $_GET['id'];
$inv = new inventario();
$inv->borrarInventario($conn,$idBorrar);