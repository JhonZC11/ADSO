<?php
class inventario {

    public function insertaInventario($conn, $n_inventario, $fecha, $tipo, $detalle, $user){
        $estado = "Revision";
        $sql = "INSERT INTO inventarios 
        (n_inventario, fecha, estado, tipo, detalle, usuarios_idusuarios) 
        VALUES ('$n_inventario', '$fecha','$estado', '$tipo', '$detalle', '$user')";
        if ($conn->query($sql) === TRUE) {
            header ("location: ../pages/inventarios/ingresos-fisicos.php");
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

}