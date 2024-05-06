<?php
require("db.php");
require("o_proveedores.php");
$id = $_GET['id'];
$proveedor->delete($conn, $id);