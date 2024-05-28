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
        $count = 0;
        $sql = "SELECT * FROM (SELECT inventarios.*, 
            operarios.nombres AS nombre_u
            FROM inventarios 
            INNER JOIN operarios ON inventarios.usuarios_idusuarios = operarios.idoperarios)AS querysub";
        $resultado = $conn->query($sql);
        while ($a = $resultado->fetch_row()) {
            $json = json_decode($a[5], true);
            $stockJSON = json_decode($a[6], true);
            $td = '';
            $total = count($json);
            for($i = 1; $i < $total + 1; $i++){
                if (isset($json[$i]) && isset($stockJSON[$i])) {
                    $td .= "<div class='row'><div class='col p-1'>" . $i . "</div><div class='col'> " . $json[$i] . "</div><div class='col'> " . $stockJSON[$i] . " </div><div class='col'>" . ($json[$i] - $stockJSON[$i]) . "</div> </div>";
                }
            }
    
            $modalId = 'exampleModal' . $count;
            echo "
                <tr>                    
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
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$modalId'>
                            Ver detalles
                        </button>
                        <div class='modal fade' id='$modalId' tabindex='-1' aria-labelledby='$modalId' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h1 class='modal-title fs-5 fw-bold' id='$modalId'>Inventario Físico</h1>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='row text-bg-dark p-1'>
                                            <div class='col'>Id Item</div>
                                            <div class='col'>Fisico</div>
                                            <div class='col'>Stock</div>
                                            <div class='col'>Diferencia</div>
                                        </div>
                                        $td
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                        <a class='btn btn-danger' id='danger' data-id='$a[0]' href='elimina.php'>Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>";
    
            $count++;   
        }
    }
    public function inventariosByFecha($conn, $fecha){
        $count = 0;
        $sql = "SELECT * FROM (SELECT inventarios.*, 
            operarios.nombres AS nombre_u
            FROM inventarios 
            INNER JOIN operarios ON inventarios.usuarios_idusuarios = operarios.idoperarios
            WHERE inventarios.fecha = '$fecha') AS querysub";
        $resultado = $conn->query($sql);
        while ($a = $resultado->fetch_row()) {
            $json = json_decode($a[5], true);
            $stockJSON = json_decode($a[6], true);
            $td = '';
            $total = count($json);
            for($i = 1; $i < $total + 1; $i++){
                if (isset($json[$i]) && isset($stockJSON[$i])) {
                    $td .= "<div class='row'><div class='col p-1'>" . $i . "</div><div class='col'> " . $json[$i] . "</div><div class='col'> " . $stockJSON[$i] . " </div><div class='col'>" . ($json[$i] - $stockJSON[$i]) . "</div> </div>";
                }
            }
    
            $modalId = 'exampleModal' . $count;
            echo "
                <tr>                    
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
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$modalId'>
                            Ver detalles
                        </button>
                        <div class='modal fade' id='$modalId' tabindex='-1' aria-labelledby='$modalId' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h1 class='modal-title fs-5 fw-bold' id='$modalId'>Inventario Físico</h1>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='row text-bg-dark p-1'>
                                            <div class='col'>Id Item</div>
                                            <div class='col'>Fisico</div>
                                            <div class='col'>Stock</div>
                                            <div class='col'>Diferencia</div>
                                        </div>
                                        $td
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                        <a class='btn btn-danger' id='danger' data-id='$a[0]' href='elimina.php'>Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>";
    
            $count++;   
        }

    }
    public function borrarInventario($conn, $idBorrar){
        $sql = "DELETE FROM inventarios WHERE idinventarios = '$idBorrar'";
        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } else {
            header("location: ../analisis-diferencias.php");
        }
    }
    

}