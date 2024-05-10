<?php
    require_once('Client.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_GET['cc']) && isset($_GET['nombres']) && isset($_GET['apellidos'])  && isset($_GET['tele']) && isset($_GET['dir']) && isset($_GET['correo'])){
            Client::create_client($_GET['cc'],$_GET['nombres'], $_GET['apellidos'], $_GET['tele'], $_GET['dir'], $_GET['correo']);
        }

?>