<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "mydb");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el valor del input
$p = $_GET['inputValue'];

// Consulta SQL para obtener los datos de la tabla de proveedores
$sql = "SELECT nombre, productos FROM proveedores WHERE nit = '$p'";
$resultado = $conexion->query($sql);

// Convertir los resultados a un arreglo asociativo
$proveedores = array();
while ($fila = $resultado->fetch_assoc()) {
    $proveedores[] = $fila;
}

// Cerrar la conexión
$conexion->close();

// Devolver los datos como JSON
echo json_encode($proveedores);
?>
