<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "mydb");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener los datos de la tabla de proveedores
$sql = "SELECT nit, nombre FROM proveedores";
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
