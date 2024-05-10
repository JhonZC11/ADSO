<?php
require "../php/Database.class.php";
require "o_operarios.php";


if($_SERVER['REQUEST_METHOD'] == 'POST' 
&& isset($_POST['cc']) && isset($_POST['nombres'])
&& isset($_POST['apellidos'])  && isset($_POST['tele'])
&& isset($_POST['dir']) && isset($_POST['correo'])){
    $operario->insert($_POST['cc'],$_POST['nombres'], $_POST['apellidos'], $_POST['tele'], $_POST['dir'], $_POST['correo']);
}

if($_SERVER['REQUEST_METHOD'] == 'PUT' 
&& isset($_GET['id']) && isset($_GET['nombres']) && isset($_GET['apellidos'])  && isset($_GET['tele']) && isset($_GET['dir']) && isset($_GET['correo'])){
    $operario->update($_GET['id'],$_GET['nombres'], $_GET['apellidos'], $_GET['tele'], $_GET['dir'], $_GET['correo']);
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id']) ){
    $operario->delete($_GET['id']);
}


if($_SERVER['REQUEST_METHOD']== 'GET'){
    function get_all_clients(){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM operarios');
        if($stmt->execute()){
            $result = $stmt->fetchAll();
            header('HTTP/1.1 201 OK');
            echo json_encode($result);
        } else {
            header('HTTP/1.1 404 No se ha podido consultar los clientes');
        }
    }
    get_all_clients();
}