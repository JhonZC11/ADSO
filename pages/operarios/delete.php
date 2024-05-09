<?php
require "../php/db.php";
require "o_operarios.php";
$id=$_GET["id"];
$operario->delete($conn, $id);