<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "mydb");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el valor del input
$p = $_GET['inputValue'];
$m = $_GET['motivo'];

    $sql = "SELECT nombre, productos FROM proveedores WHERE nit = '$p' AND categoria='$m'";
    $resultado = $conexion->query($sql);
    $proveedores = array();
    while ($fila = $resultado->fetch_assoc()) {
        $proveedores[] = $fila;
    }

    $conexion->close();

    echo json_encode($proveedores);

?>
