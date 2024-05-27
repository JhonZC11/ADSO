<?php
require "../../php/db.php";
require "o_inventarios.php";
if(isset($_COOKIE['user'])){
    $user = $_COOKIE['user'];
    echo $user;
}else{
    echo "No existe la cookie";
}
$fecha = $_POST["d"];
$tipo = $_POST["t"];
$itemUno = $_POST["1"];
$itemDos = $_POST["2"];
$itemTres = $_POST["3"];
$itemCuatro = $_POST["4"];
$itemCinco = $_POST["5"];
$array = array ("1"=>$itemUno, 
                "2"=>$itemDos, 
                "3"=>$itemTres, 
                "4"=>$itemCuatro, 
                "5"=>$itemCinco);
$detalle = json_encode($array);
$n_inventario = $user . $tipo . $fecha;
$in = new inventario();
$in->insertaInventario($conn, $n_inventario, $fecha, $tipo, $detalle, $user);