<?php
class proveedor {

    public function insert($conn, $identificacion, $nombre, $telefono, $direccion, $ciudad, $correo){
        $sql = "INSERT INTO proveedores (nit, nombre, telefono, dirección, ciudad, correo)
        VALUES ('$identificacion', '$nombre', '$telefono', '$direccion', '$ciudad', '$correo')";
        if ($conn->query($sql) === TRUE) {
            header ("location: ../../proveedores.php");
        } else {
            echo "Error al almacenar datos en la base de datos: " . $conn->error;
        }
    }

    public function delete($conn, $id){
        $sql = "DELETE FROM proveedores WHERE idproveedores='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location: ../../proveedores.php");
        } else {
            echo "Error al almacenar datos en la base de datos: " . $conn->error;
        }
    }

    public function update($conn, $id, $cc, $nombre, $telefono, $direccion, $ciudad, $correo){
        $sql = "UPDATE proveedores SET 
                nit = '$cc', 
                nombre = '$nombre', 
                telefono = '$telefono', 
                dirección = '$direccion', 
                ciudad = '$ciudad', 
                correo = '$correo' 
                WHERE idproveedores='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location: ../../proveedores.php");
        } else {
            echo "Error al almacenar datos en la base de datos: " . $conn->error;
        }
    }
}

$proveedor = new proveedor();