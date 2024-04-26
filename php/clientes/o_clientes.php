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
    public function select($conn){
        $sql = "SELECT * FROM clientes";
        $result = $conn->query($sql);
        while ($resultado = $result->fetch_row()){
            echo "<tr>
            <td>$resultado[1]</td>
            <td>$resultado[2]</td>
            <td>$resultado[3]</td>
            <td>$resultado[4]</td>
            <td>$resultado[5]</td>
            <td>$resultado[6]</td>
            <td>$resultado[7]</td>
            <td>
            <a class='edit' href='../php/clientes/update.php?id=$resultado[0]&cc=$resultado[1]&nom=$resultado[2]&tel=$resultado[3]&dir=$resultado[4]&ciudad=$resultado[5]&correo=$resultado[6]&date=$resultado[7]'>Edit</button>
            <a class='delete' href='../php/clientes/delete.php?id=$resultado[0]'>Delete</button></td>
            </tr>";
        }
    }
}

$cliente = new cliente();