<?php
//require "../php/Database.class.php";
class operario{
    public static function insert($cc, $nombres, $apellidos, $tel, $dir, $correo){
        $data = new Database();
        $conn = $data->getConnection();
        $sql = "INSERT INTO operarios (cedula, nombres, apellidos, telefono, direccion, correo) VALUES ('$cc', '$nombres','$apellidos','$tel','$dir','$correo')";
        if (!$conn->query($sql)) {
            header('HTTP/1.1 404 Cliente no se ha creado correctamente');
        } else {
            header('HTTP/1.1 201 Cliente creado correctamente');
            echo '<script>window.location.href = "../operarios.php";</script>';
        }
    }

    public function update($id, $nombres, $apellidos, $tel, $dir, $correo) {
        $data = new Database();
        $conn = $data->getConnection();
        $sql = "UPDATE operarios SET nombres='$nombres', apellidos='$apellidos', telefono='$tel', direccion='$dir', correo='$correo' WHERE idoperarios='$id'";
        if (!$conn->query($sql)) {
            // Si la consulta falla, devuelve un error 404
            header('HTTP/1.1 404 Cliente no se ha actualizado correctamente');
        } else {
            // Si la consulta se ejecuta correctamente, devuelve un éxito 201
            header('HTTP/1.1 201 Cliente actualizado correctamente');
            echo '<script>window.location.href = "../operarios.php";</script>';
        }
    }


    public function delete( $id){
        $data = new Database();
        $conn = $data->getConnection();
        $sql = "DELETE FROM operarios WHERE idoperarios = $id";
        if (!$conn->query($sql)) {
            header('HTTP/1.1 404 Cliente no se ha creado correctamente');
        } else {
            header('HTTP/1.1 201 Cliente borrado correctamente');
            echo '<script>window.location.href = "../operarios.php";</script>';
        }
    }
}

$operario = new operario();