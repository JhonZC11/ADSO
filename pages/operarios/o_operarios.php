<?php
class operario{
    public function insert($conn, $cc, $nombres, $apellidos, $tel, $dir, $correo){
        $sql = "INSERT INTO operarios (cedula, nombres, apellidos, telefono, direccion, correo) VALUES ('$cc', '$nombres','$apellidos','$tel','$dir','$correo')";
        if ($conn->query($sql) === TRUE) {
            header("location: ../operarios.php");
        } else {
            echo "Algo salió mal";
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


    public function delete($conn, $id){
        $sql = "DELETE FROM operarios WHERE idoperarios = $id";
        if ($conn->query($sql) === TRUE) {
            header("location: ../operarios.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

$operario = new operario();