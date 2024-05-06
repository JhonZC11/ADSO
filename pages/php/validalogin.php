<?php
//header("location:../index.html");
require ("db.php");
$user = $_POST['user'];
$pass = $_POST['pass'];
$sql = "SELECT usuarios.*, 
operarios.cedula AS cedula_o
FROM usuarios
INNER JOIN operarios ON usuarios.operarios_idoperarios = operarios.idoperarios
WHERE operarios.cedula = '$user' AND usuarios.pass = '$pass'";
$resultado = $conn->query($sql);

if ($resultado) {
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_array()) {
            $usuarioLogeado = $fila[5];
            $idLogeado = $fila[3];
        }
        file_put_contents("id.txt",$idLogeado);
        file_put_contents("user.txt", $usuarioLogeado);

        header ("location: ../main.php");
    } else {
        echo "    
        <style>
            .err{
                width: 40%;
                margin: 70px auto;
                border: 1px solid red; 
                padding: 10px;
                text-align: center;
                color: red;
            }
            a{
                text-decoration: none;
                color: red;
            }
        </style>";
        echo "<div class='err'>No se encontraron registros.</div>";
        echo "
        <div class='err'>
        <a href='../../index.php'>
            Volver a intentarlo.
        </a>
        </div>";
    }
} else {
    echo "Error en la consulta: " . $conn->error;
}
