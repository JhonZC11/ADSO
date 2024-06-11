<?php
require "../php/Database.class.php";
require "o_operarios.php";
$id=$_GET["id"];
$operario->delete($id);