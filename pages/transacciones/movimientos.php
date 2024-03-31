<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/nav-bar.css">
    <link rel="stylesheet" href="../../css/barra.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/movimientos.css">
   
</head>
<body>
<header>
        <div id="header">
        <ul class="nav">
            
            <li><a href="../transacciones/movimientos.php" id="M_Inventario">Transacciones</a>
                <ul>
                    <li><a href="../transacciones/movimientos.php" id="M_Inventario">Movimientos de Inventarios</a></li>
                </ul>
            </li>

            <li><a href="../inventarios/ingresos-fisicos.php">Inventarios</a>
                <ul>
                    <li><a href="../inventarios/ingresos-fisicos.php">Ingreso Físico</a></li>
                    <li><a href="../inventarios/analisis-diferencias.php">Análisis de Diferencias</a></li>
                </ul>        
            </li>
                
                                  
            <li><a href="../centro-procesos/procesar.php">Centro de Procesos</a>
                <ul>
                    <li><a href="../centro-procesos/procesar.php">Procesar Fruta</a></li>
                    <li><a href="../centro-procesos/registroxorden.php">Registro por Orden</a></li>
                </ul>
            </li>    
            <li><a href="../informes/ventas.php">Informes</a>
                <ul>
                    <li><a href="../informes/ventas.php">Ventas</a></li>
                    <li><a href="../informes/inventarios.php">Inventarios</a></li>
                    <li><a href="../informes/balances.php">Contabilidad</a></li>
                </ul>
            </li>
            <li><a href="../consulta-documentos/ordenes-proceso.php">Consulta Documentos</a>
                <ul>
                    <li><a href="../consulta-documentos/ordenes-proceso.php">Ordenes de Proceso</a></li>
                    <li><a href="../consulta-documentos/transacciones.php">Transacciones</a></li>
                    <li><a href="../consulta-documentos/analisis-inventarios.php">Análisis de Inventarios</a></li>
                    <li><a href="../consulta-documentos/devoluciones.php">Notas Crédito</a></li>
                </ul>
            </li>
            <li><a href="../usuarios.php">Usuarios</a>
                <ul>
                    <li><a href="../usuarios.php" id="a">Gestión usuarios</a></li>                    
                </ul>
            </li>
            <li><a href="../clientes.php">Clientes</a>
                <ul>
                    <li><a href="../clientes.php" id="a">Gestión clientes</a></li>                    
                </ul>
            </li>
            <li><a href="../proveedores.php">Proveedores</a>
                <ul>
                    <li><a href="../proveedores.php" id="a">Gestión proveedores</a></li>                    
                </ul>
            </li>
            <li><a href="../operarios.php">Operarios</a>
                <ul>
                    <li><a href="../operarios.php" id="a">Gestión operarios</a></li>                    
                </ul>
            </li>
        </ul>
        <li><a href="../index.php" class="salir">Salir</a></li>
        </div>      
</header>


<div class="movimientos" id="form">
<div class="bar" id="">
        <div class="txt-m">Movimientos</div><div class="close"><button id="closeUsuarios" onclick="cierraForm();" >X</button></div>
</div>
<form action="../../php/o_movimientos.php" method="post">
    <table>
        <tr>
            <td colspan="1">Motivo: </td><td colspan="1">
                <input type="text" name="motivo" id="motivo" required onchange="cargaMotivo();">
            </td>
            <td colspan="1" class="table-cell"><label for="" id="d_motivo">.</label></td>
            <td colspan="1">Número Factura: </td>
            <td colspan="1"><input type="text" name="n_factura" id="nf"></td>
        </tr>
        <tr>
            <td colspan="1">Proveedor: </td>
            <td colspan="1"><input type="text" name="proveedor" id="p"></td>
            <td colspan="1" class="table-cell"><label for="" id="resultado">.</label></td>
                        

            <td colspan="1">Fecha Factura: </td>
            <td colspan="1"><input type="date" name="f_factura" required id="ff"></td>
        </tr>
    </table>
    <br><br>
    <table class="table-items">
        <thead>
            <tr>
                <th>Item</th><th>Descripción</th><th>Cantidad</th><th>Valor Unidad</th><th>Valor Total</th>
            </tr>
        </thead>
        <tbody id = "datos">
            <tr>
                <td class="d">
                    <input type="text" style="width:50px;" id="item" name="id_item" >
                </td>
                <td class="table-desc-item">
                    <label for="" id="d_item"></label>
                </td>
                <td class="d">
                    <input type="text" style="width:50px;" id="cant" name="cant">
                </td>
                <td class="d">
                    <input type="text" style="width:80px;" id="v_kg"  name="v_kg" onchange="vTotal();">
                </td>
                <td class="d">
                    <input for="" id="v_total" name="v_total" readonly> $
                </td>
            </tr>

        </tbody>
    </table>
    <br>
    <div class="buttons">
        <button class="cancel" id="close">Cancelar</button>
        <input type="submit" class="registrar" value="Registrar">
    </div>    
</form>
</div>
<script>
    $(document).ready(function(){
        $('#p').change(function(){
            realizarSolicitudAjax();
        });
        $('#cantidad, #valor_unidad').change(function() {
            calcularVtotal();
        });
    });
    
    function calcularVtotal() {
        var cantidad = parseFloat($('#cant').val());
        var valorUnidad = parseFloat($('#vU').val());

        // Verificar si ambos valores son numéricos
        if (!isNaN(cantidad) && !isNaN(valorUnidad)) {
            var vtotal = cantidad * valorUnidad;
            $('#v_total').val(vtotal.toFixed(2)); // Redondear a 2 decimales y mostrar en el campo
        } else {
            $('#v_total').val(''); // Si uno o ambos valores no son numéricos, borrar el campo vtotal
        }
    }


    function realizarSolicitudAjax() {
    // Obtener el valor del input
    var valorInput = $('#p').val();

    $.ajax({
        url: 'consultar_proveedores.php',
        type: 'GET',
        data: { inputValue: valorInput }, // Pasar el valor del input como datos
        dataType: 'json',
        success: function (data) {
            // Manipula los datos obtenidos como desees
            var resultadoTexto = '';
            var json = '';
            var datos = '';
            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.nombre;
                json += proveedor.productos;
            });
            $('#resultado').text(resultadoTexto);
            const productos = JSON.parse(json);
            productos.forEach(function(item){
                datos += '<tr><td class="d"><input type="checkbox" value="' + item.id_secos + '"></td><td>' + item.descripcion +' / '+  item.unidad  +
                '</td><td class="d"><input type="text" style="width:50px;" id="cant" name="cant" onchange="vTotal();"></td><td id="vU">'+ item.valor + '</td><td class="d"><input for="" id="v_total" name="v_total" readonly>$</td></tr>';
            })
            document.getElementById("datos").innerHTML = datos;
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
}
</script>
<?php
    require("../../php/db.php");
    require("../../php/movimiento.php");
    $movimiento = new movimiento();
    $resultados = $movimiento->muestraMovimientos($conn);
?>

<main class="">
    <h1>Transacciones</h1><button class="registrar" id="re" onclick="muestraForm();">Agregar</button><br><hr>
    <table class="table-main">
        <tr>
            <th>N Movimiento</th>
            <th>N Factura</th>
            <th>F Factura</th>
            <th>F Registro</th>
            <th>Proveedor</th>
            <th>Motivo</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor kg</th>
            <th>Valor total</th>
            <th>Usuario</th>
        </tr>
        <?php
        $numElementosPorPagina = 10;
        $sqlTotal = "SELECT COUNT(*) AS total FROM movimientos";
        $resultadoTotal = $conn->query($sqlTotal);
        $total = $resultadoTotal->fetch_assoc()['total'];
        $numPaginas = ceil($total / $numElementosPorPagina);

        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $paginaActual = max(1, min($numPaginas, $paginaActual));

        $indiceInicio = ($paginaActual - 1) * $numElementosPorPagina;
        intval($indiceInicio);
        $consultaSQL = "SELECT * FROM (
            SELECT movimientos.*,
                motivos.descripcion AS nombre_motivo, 
                productos.descripcion AS nombre_producto, 
                proveedores.nombre AS nombre_proveedor, 
                operarios.cedula AS nombre_usuario
            FROM movimientos
            INNER JOIN motivos ON movimientos.motivos_idmotivos = motivos.idmotivos
            INNER JOIN productos ON movimientos.productos_idproductos = productos.idproductos
            INNER JOIN proveedores ON movimientos.proveedores_idproveedores = proveedores.idproveedores
            INNER JOIN operarios ON movimientos.usuarios_idusuarios = operarios.idoperarios
        ) AS movimientos_con_joins
        LIMIT $indiceInicio, $numElementosPorPagina";
        $resultadoConsulta = $conn->query($consultaSQL);
// Mostrar los datos obtenidos de la consulta
        while ($a = $resultadoConsulta->fetch_row()) {
            echo 
                "<tr>
                    <td>
                        $a[1]
                    </td>
                    <td>
                        $a[2]
                    </td>
                    <td>
                        $a[3]
                    </td>
                    <td>
                        $a[4]
                    </td>
                    <td>
                        $a[14]
                    </td>
                    <td>
                        $a[12]
                    </td>
                    <td>
                        $a[13]
                    </td>
                    <td>
                        $a[5]
                    </td>
                    <td>
                        $a[6]
                    </td>
                    <td>
                        $a[7]
                    </td>
                    <td>
                        $a[15]
                    </td>
                </tr>";
        }?>
        </table><br><br><?php
// Construir la paginación
    echo '<div class="paginacion">';
    for ($i = 1; $i <= $numPaginas; $i++) {
        echo '<a href="?pagina=' . $i . '" id="a">' . $i . '</a> ';
    }
    echo '</div>';
?>

</main>





<footer>
<img src="../../img/bg.png" alt="" width="20%">
</footer>

   <script src="../../js/usuarios.js" refer></script>

    <script>
        $(document).ready(function() {
            $("#form").draggable();
        });
    </script>
    <script src="../../js/movimientos.js" refer></script> 
</body>
</html>