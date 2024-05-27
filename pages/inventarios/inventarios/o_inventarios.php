<?php
class inventario {

    public function insertaInventario($conn, $n_inventario, $fecha, $tipo, $detalle, $user){
        $estado = "Revision";
        $sql = "INSERT INTO inventarios 
        (n_inventario, fecha, estado, tipo, detalle, usuarios_idusuarios) 
        VALUES ('$n_inventario', '$fecha','$estado', '$tipo', '$detalle', '$user')";
        if ($conn->query($sql) === TRUE) {
            header ("location: ../ingresos-fisicos.php");
        } else {
            echo "Error al almacenar el JSON en la base de datos: " . $conn->error;
        }
    }

    public function buscaInventario($conn, $fecha){
        $sql = "SELECT * FROM inventarios WHERE fecha = '$fecha'";
        $resultado = $conn->query($sql);
        while ($a = $resultado->fetch_row()) {
            $json = json_decode($a[5], true);
            $json_content = '';
            print_r($json);
            // Iterar sobre los datos del JSON
            foreach ($json as $key => $value) {
                // Concatenar los datos del registro en la variable
                $json_content .= $key . ": " . $value . "<br>";
            }
            echo 
                "<tr>
                    <td>
                        $a[2]
                    </td>
                    <td>
                        $a[3]
                    </td>
                    <td>
                        $a[4]
                    </td>
                    <td class='d'>
                        <details><hr>
                            $json_content<hr>
                        </details>
                    </td>
                </tr>";
        }
    }
    public function muestraInventarios($conn){
        $sql = "SELECT * FROM (SELECT inventarios.*, 
            operarios.nombres AS nombre_u
            FROM inventarios 
            INNER JOIN operarios ON inventarios.usuarios_idusuarios = operarios.idoperarios)AS querysub";
        $resultado = $conn->query($sql);
        while ($a = $resultado->fetch_row()) {
            $json = json_decode($a[5], true);
            $json_content = '';
            // Iterar sobre los datos del JSON
            foreach ($json as $key => $value) {
                // Concatenar los datos del registro en la variable
                $json_content .= $key . ": " . $value . "<br>";
            }
            echo 
                "<tr>                    
                    <td class='text-center'>
                        $a[1]
                    </td>
                    <td class='text-center'>
                        $a[2]
                    </td>
                    <td class='text-center'>
                        $a[3]
                    </td>
                    <td class='text-center'>
                        $a[4]
                    </td>
                    <td class='text-center'>
                        $a[7]
                    </td>
                    <td class='d'>
                        <details><hr>
                            $json_content<hr>
                        </details>
                    </td>
                </tr>"
            ;
        }
    }

    public function inventariosByFecha($conn, $fecha){
        $sql = "SELECT * FROM (SELECT inventarios.*, 
            operarios.nombres AS nombre_u
            FROM inventarios 
            INNER JOIN operarios ON inventarios.usuarios_idusuarios = operarios.idoperarios
            WHERE inventarios.fecha = '$fecha') AS querysub";
        $resultado = $conn->query($sql);
        while ($a = $resultado->fetch_row()) {
            $json = json_decode($a[5], true);
            $json_content = '';
            // Iterar sobre los datos del JSON
            foreach ($json as $key => $value) {
                // Concatenar los datos del registro en la variable
                $json_content .= $key . ": " . $value . "<br>";
            }
            echo 
                "<tr>                    
                    <td class='text-center'>
                        $a[1]
                    </td>
                    <td class='text-center'>
                        $a[2]
                    </td>
                    <td class='text-center'>
                        $a[3]
                    </td>
                    <td class='text-center'>
                        $a[4]
                    </td>
                    <td class='text-center'>
                        $a[7]
                    </td>
                    <td class='d'>
                        <details><hr>
                            $json_content<hr>
                        </details>
                    </td>
                </tr>"
            ;
        }

    }

}