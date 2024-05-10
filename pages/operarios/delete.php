<?php
require "../php/db.php";
require "o_operarios.php";
//$id=$_GET["id"];
if($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id']) ){
    $operario->delete($_GET['id']);
    header("location: ../operarios.php");
}