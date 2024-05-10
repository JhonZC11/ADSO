<?php
require_once 'cliente.php';

$cliente = new cliente();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $resultado = $cliente->select($conn);
  echo json_encode($resultado);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $datos = json_decode(file_get_contents('php://input'), true);
  $cliente->insert($conn, $datos['cc'], $datos['nombres'], $datos['telefono'], $datos['direccion'], $datos['ciudad'], $datos['correo'], $datos['fecha']);
  echo json_encode(['mensaje' => 'Registro insertado con éxito']);
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  $datos = json_decode(file_get_contents('php://input'), true);
  $cliente->update($conn, $datos['id'], $datos['cc'], $datos['nombres'], $datos['telefono'], $datos['direccion'], $datos['ciudad'], $datos['correo'], $datos['fecha']);
  echo json_encode(['mensaje' => 'Registro actualizado con éxito']);
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  $id = $_GET['id'];
  $cliente->delete($conn, $id);
  echo json_encode(['mensaje' => 'Registro eliminado con éxito']);
} else {
  echo json_encode(['mensaje' => 'Método no permitido']);
}
?>