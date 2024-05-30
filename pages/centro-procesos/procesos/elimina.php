<?php
require("../../php/db.php");
require("o_procesos.php");
$idBorrar = $_GET['id'];
$proceso->borraProceso($conn,$idBorrar);