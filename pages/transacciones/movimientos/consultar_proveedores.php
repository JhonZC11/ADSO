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
    // Verificar si se encontraron proveedores
    if (count($proveedores) > 0) {
        echo json_encode($proveedores);
    } else {
        // Enviar un mensaje de error si no se encontraron proveedores
        echo "<script>alert('No se encontró el proveedor para el motivo seleccionado!');</script>";
    }
    $conexion->close();

?>
