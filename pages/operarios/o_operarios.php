<?php
require "../php/db.php";
class operario{
    public static function insert($cc, $nombres, $apellidos, $tel, $dir, $correo){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO operarios (cedula, nombres, apellidos, telefono, direccion, correo) VALUES ('$cc', '$nombres','$apellidos','$tel','$dir','$correo')";
        if ($conn->query($sql) === TRUE) {
            header("location: ../operarios.php");
            header('HTTP/1.1 201 Cliente creado correctamente');

        } else {
            echo "Algo salió mal";
            header('HTTP/1.1 404 Cliente no se ha creado correctamente');
        }
    }

    public function update($conn, $id, $nombres, $apellidos, $tel,$dir, $correo){
        $sql = "UPDATE operarios SET nombres='$nombres', apellidos='$apellidos', telefono='$tel', direccion='$dir', correo='$correo' WHERE idoperarios='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location: ../operarios.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }


    public function delete( $id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "DELETE FROM operarios WHERE idoperarios = $id";
        if ($conn->query($sql) === TRUE) {
            header('HTTP/1.1 201 Cliente borrado correctamente');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

$operario = new operario();