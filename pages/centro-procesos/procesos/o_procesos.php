<?php

class proceso{

    public function inserta(
        $conn, 
        $fecha,
        $operario,
        $itemProcesado,
        $cantidadProcesada,
        $cantidadStock,
        $siguienteItem,
        $costo,
        $costoTotal,
        $cantidadResultado,
        $horas,
        $idProceso,
        $idUsuario
        ){
        $sql = "INSERT INTO procesos(fecha_proceso, fecha_registro, operarios_idoperarios, stock_id, next_item, cantidad_procesada, cantidad_stock, costo, costo_total, cantidad_resultado, horas, usuarios_idusuarios, procesos_id) VALUES ('$fecha',CURRENT_TIMESTAMP,'$operario','$itemProcesado','$siguienteItem','$cantidadProcesada','$cantidadStock','$costo','$costoTotal','$cantidadResultado','$horas','$idUsuario','$idProceso')";        

        if($conn->query($sql)==TRUE){
            $alert = '';
            $alert.= "<script>
            $(document).ready(function(){
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
                });
            })
        </script>";
        echo $alert;
        } else {
            echo "Algo salio mal " . $conn->error();
        }

        
    }

    public function stockNextItem($conn, $siguienteItem){
        $sql = "SELECT cantidad FROM stock WHERE id='$siguienteItem'";
        $resultado = $conn -> query($sql);
        while($fila = $resultado -> fetch_row()){
            $nextCantidadStock = $fila[0];
        }
        return $nextCantidadStock;
    }

    public function updateStock($conn, $itemProcesado, $siguienteItem, $cantidadResultado, $cantidadStock, $nextCantidadStock){
        $c = $cantidadStock - $cantidadResultado;
        $cantidad = number_format($c, 2);
        $n = $cantidadResultado + $nextCantidadStock;
        $nextCantidad = number_format($n, 2);
        $sql = "UPDATE stock SET cantidad = '$cantidad' WHERE id = '$itemProcesado'";
        $sql2 = "UPDATE stock SET cantidad = '$nextCantidad' WHERE id = '$siguienteItem'";
        if($conn->query($sql)==TRUE && $conn->query($sql2)==TRUE){
            header("location: ../procesar.php");
            setcookie("done", "well",  time() + (86400 * 30), "/");
        } else {
            echo "Algo salio mal " . $conn->error();
        }
    }


    public function buscaOperario($conn, $operario){
        $sql = "SELECT idoperarios FROM operarios WHERE cedula='$operario'";
        $resultado = $conn->query($sql);
        while($fila = $resultado->fetch_row()){
            $idusuario = $fila[0];
        }
        return $idusuario;
    }

    public function muestraProcesos($conn){
        $horas = '';
        $count = 0;
        $sql = "SELECT * FROM (
            SELECT procesos.*, 
                   stock1.descripcion AS nombre_item,
                   stock2.descripcion AS nombredos
            FROM procesos
            INNER JOIN stock AS stock1 ON procesos.stock_id = stock1.id
            INNER JOIN stock AS stock2 ON procesos.next_item = stock2.id
        ) AS querysub
        ";
    
        $resultado = $conn->query($sql);

        while ($a = $resultado->fetch_row()) {
            if($a[11]==0){
                $horas = "No requiere";
            } else {
                $horas = $a[11];
            }
            $modalId = 'exampleModal' . $count;
            echo "
                <tr class='fw-bold'>                    
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
                        $a[8]
                    </td>
                    <td class='text-center'>
                        $a[9]
                    </td>
                    <td class='text-center'>
                        $horas
                    </td>
                    <td class='d text-center'>
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$modalId'>
                        Ver detalles
                    </button>
                    <div class='modal modal-xl fade' id='$modalId' tabindex='-1' aria-labelledby='$modalId' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5 fw-bold' id='$modalId'>Detalles Proceso</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <div class='row text-bg-dark p-1'>
                                        <div class='col'>Id Item</div>
                                        <div class='col'>Next Item</div>
                                        <div class='col'>Cantidad Procesada</div>
                                        <div class='col'>Cantidad Stock</div>
                                        <div class='col'>Cantidad Resultante</div>
                                    </div>
                                    <div class='row'>
                                        <div class='col'>
                                            $a[14]
                                        </div>
                                        <div class='col'>
                                            $a[15]                                    
                                        </div>
                                        <div class='col'>
                                            $a[6]
                                        </div>
                                        <div class='col'>
                                            $a[7]
                                        </div>
                                        <div class='col'>
                                            $a[10]
                                        </div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                    <a class='btn btn-danger' id='danger' data-id='$a[0]' href='procesos/elimina.php?id=$a[0]'>Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                </tr>"; 
            $count++; 
        }
    }

    public function procesosByFecha($conn, $fecha){
        $horas = '';
        $count = 0;
        $sql = "SELECT * FROM (
            SELECT procesos.*, 
                   stock1.descripcion AS nombre_item,
                   stock2.descripcion AS nombredos
            FROM procesos 
            INNER JOIN stock AS stock1 ON procesos.stock_id = stock1.id
            INNER JOIN stock AS stock2 ON procesos.next_item = stock2.id
            WHERE fecha_proceso = '$fecha'
        ) AS querysub
        ";
    
        $resultado = $conn->query($sql);

        while ($a = $resultado->fetch_row()) {
            if($a[11]==0){
                $horas = "No requiere";
            } else {
                $horas = $a[11];
            }
            $modalId = 'exampleModal' . $count;
            echo "
                <tr class='fw-bold'>                    
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
                        $a[8]
                    </td>
                    <td class='text-center'>
                        $a[9]
                    </td>
                    <td class='text-center'>
                        $horas
                    </td>
                    <td class='d text-center'>
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$modalId'>
                        Ver detalles
                    </button>
                    <div class='modal modal-xl fade' id='$modalId' tabindex='-1' aria-labelledby='$modalId' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5 fw-bold' id='$modalId'>Detalles Proceso</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <div class='row text-bg-dark p-1'>
                                        <div class='col'>Id Item</div>
                                        <div class='col'>Next Item</div>
                                        <div class='col'>Cantidad Procesada</div>
                                        <div class='col'>Cantidad Stock</div>
                                        <div class='col'>Cantidad Resultante</div>
                                    </div>
                                    <div class='row'>
                                        <div class='col'>
                                            $a[14]
                                        </div>
                                        <div class='col'>
                                            $a[15]                                    
                                        </div>
                                        <div class='col'>
                                            $a[6]
                                        </div>
                                        <div class='col'>
                                            $a[7]
                                        </div>
                                        <div class='col'>
                                            $a[10]
                                        </div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                    <a class='btn btn-danger' id='danger' data-id='$a[0]' href='procesos/elimina.php?id=$a[0]'>Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                </tr>"; 
            $count++; 
        }
    
    }

    public function borraProceso($conn, $id){
        $sql = "DELETE FROM procesos WHERE id_proceso = '$id'";
        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } else {
            header("location: ../registroxorden.php");
        }
    }


}

$proceso = new proceso();