<?php
require "../../php/db.php";

$item = $_GET['inputValue'];
$sql = "SELECT nombres FROM operarios WHERE cedula = '$item'";
$resultado = $conn->query($sql);
$proveedores = array();
while ($fila = $resultado->fetch_assoc()) {
    $proveedores[] = $fila;
}
$conn->close();

echo json_encode($proveedores);
