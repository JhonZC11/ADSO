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
        session_start();
        $_SESSION['Campos'] = " Soy session";
        setcookie("user", $idLogeado,time() + (86400 * 30), "/");
        header ("location: ../transacciones/movimientos.php");
    } else {
        /*echo "    
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
        </div>";*/
        session_start();
        $_SESSION['error'] = "No estoy";
        header("location: ../../index.php");
    }
} else {
    echo "Error en la consulta: " . $conn->error;
}
