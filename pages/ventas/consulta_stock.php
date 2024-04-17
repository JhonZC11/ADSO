<?php
require "../../php/db.php";

$item = $_GET['inputValue'];
$sql = "SELECT cantidad FROM stock WHERE id = '$item'";
$resultado = $conn->query($sql);
$proveedores = array();
while ($fila = $resultado->fetch_assoc()) {
    $proveedores[] = $fila;
}
$conn->close();

echo json_encode($proveedores);
