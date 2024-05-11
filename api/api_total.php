<?php
require("../pages/php/Database.class.php");

$db = new Database;
$conn = $db->getConnection();
header("Content-type: application/json");
$metodo = $_SERVER['REQUEST_METHOD'];

$url =isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';
$b = explode('/', $url);
$fc = ($url!=='/')?end($b):null;

switch($metodo){
    case 'GET':
        vt($conn, $fc);
        break;
    default:
        header("HTTP/1.1 405 Método no permitido");
        break;
}

function vt($conn, $fc){
    if($fc===null){
        $sql = "SELECT SUM(valor_total) AS total FROM movimientos";
        $variable = " los movimientos";
    } else if($fc === "fc") {
        $sql = "SELECT SUM(vTotal) AS total FROM facturas_compras";
        $variable = " las facturas de compras";
    }
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
            $t = $fila['total'];
        }
        echo "El valor total de ". $variable . " es: ".json_encode($t);
    }        
}