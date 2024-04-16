<?php
require "../db.php";
require "o_clientes.php";
$id = $_GET['id'];
$cliente->delete($conn, $id);