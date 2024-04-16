<?php
class cliente {

    public function insert($conn, $cc, $nombres, $telefono, $direccion, $ciudad, $correo, $fecha){
        $sql = "INSERT INTO clientes (identificacion, nombres, telefono, direccion, ciudad, correo, fecha_nacimiento) VALUES ('$cc','$nombres', '$telefono', '$direccion', '$ciudad', '$correo', '$fecha')";
        if($conn->query($sql)){header("location: ../../pages/clientes.php");} else{echo $conn->error();}
    }
    public function update($conn,$id,$cc,$nombres,$telefono,$direccion, $ciudad, $correo,$fecha){
        $sql = "UPDATE clientes SET identificacion='$cc', nombres='$nombres', telefono='$telefono', direccion='$direccion', ciudad='$ciudad', correo='$correo', fecha_nacimiento='$fecha'  WHERE idclientes = '$id'";
        if($conn->query($sql)){header("location: ../../pages/clientes.php");} else{echo $conn->error();}
    }
    public function delete($conn, $id){
        $sql ="DELETE FROM clientes WHERE idclientes = '$id'";
        if($conn->query($sql)){header("location: ../../pages/clientes.php");} else{echo $conn->error();}
    }
}

$cliente = new cliente();