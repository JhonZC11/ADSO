<?php
class inventario {

    public function insertaInventario($conn, $n_inventario, $fecha, $tipo, $detalle, $stock, $user){
        $estado = "Revision";
        $sql = "INSERT INTO inventarios 
        (n_inventario, fecha, estado, tipo, detalle, stock, usuarios_idusuarios) 
        VALUES ('$n_inventario', '$fecha','$estado', '$tipo', '$detalle', '$stock', '$user')";
        if ($conn->query($sql) === TRUE) {
            header ("location: ../ingresos-fisicos.php");
        } else {
            echo "Error al almacenar el JSON en la base de datos: " . $conn->error;
        }
    }
    public function traeStockJSON($conn){
        $arr = array();
        $sql = "SELECT id, cantidad FROM stock LIMIT 5";
        $resultado = $conn->query($sql);
        while($fila = $resultado->fetch_row()){
            $arr[$fila[0]]=$fila[1];
        }
        $json = json_encode($arr);
        return $json;
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

            $stockJSON = json_decode($a[6], true);
            $stock_content = '';
            foreach ($stockJSON as $key => $value) {
                $stock_content .= $key . ": " . $value . "<br>";
            }

            $td = '';
            $total = count($json);
            echo $total;
            for($i = 1; $i < $total+1; $i++){
                $td .= "<tr><td>". $i ."</td><td>". $json[$i]."</td><td>".$stockJSON[$i]."</td><td>". $json[$i]-$stockJSON[$i] ."</td></tr>";
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
                        $a[8]
                    </td>
                    <td class='d text-center'>
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                        Ver detalles
                    </button>
                    </td>
                </tr>"
            ;
        }
        return $td;
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
                        $a[8]
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