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
   <style>
        .vT{
            margin-left: 450px;
        }
        .a{
            margin-left: 20px;
            text-decoration: none;
            padding: 9px 19px;
            border: 2px solid blue;
            border-radius: 0px 10px 0px 10px;
            font-size: 18px;
            position: absolute;
            left: 80%;
            top: 13%;
            transition: ease-out 0.5s;
        }
        .a:hover{
            color: white;
            background-color: blue;
            box-shadow: inset 0 -100px 0 0 blue;
        }
        .d{
            width: 200px;
        }
        .table-main{
            margin-left: 250px;
        }        
   </style>
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
                    <input type="text" style="width:50px;" id="item" name="id_item" onchange="cargaItem();" >
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
});

function realizarSolicitudAjax() {
    // Obtener el valor del input
    var valorInput = $('#p').val();
    var m = $('#motivo').val();

    $.ajax({
        url: 'consultar_proveedores.php',
        type: 'GET',
        data: { inputValue: valorInput, motivo: m},
        dataType: 'json',
        success: function (data) {
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
                datos += '<tr><td class="d"><input type="checkbox" name="items[]" value="' + item.id_secos + '_'+ item.descripcion+ '_'+ item.valor +'"></td><td>' + item.descripcion + ' / ' + item.unidad +
                '</td><td class="d"><input type="text" class="cant" name="cantd[]" style="width:50px;"></td><td><input type="text" class="v_kg" readonly value="' + item.valor + '"></td><td class="d"><input type="text" class="v_total" readonly></td></tr>';
            });

            $('#datos').html(datos);

            // Agregar el evento change a los campos de cantidad
            $('.cant').change(function() {
                calcularVtotal($(this).closest('tr')); // Pasar la fila correspondiente a la función calcularVtotal
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
}

function calcularVtotal(fila) {
    var cantidad = parseInt(fila.find('.cant').val());
    var valorUnidad = parseInt(fila.find('.v_kg').val());

    if (!isNaN(cantidad) && !isNaN(valorUnidad)) {
        var vtotal = cantidad * valorUnidad;
        fila.find('.v_total').val(vtotal);
    } else {
        fila.find('.v_total').val('');
    }
}
</script>
<?php
    require("../../php/db.php");
    require("../../php/movimiento.php");
    $movimiento = new movimiento();
    $t = "$" . number_format($movimiento->valorTotalFacturas($conn), 0, '.');

?>

<main class="">
    <h1>Transacciones <span class="vT">FC hasta ahora: <?php echo $t;?></span></h1><a href="movimientos.php" class="a">EAC</a><button class="registrar" id="re" onclick="muestraForm();">Agregar</button><br><hr>
    <table class="table-main">
        <tr>
            <th>N Factura</th>
            <th>F Factura</th>
            <th>F Registro</th>
            <th>Valor total</th>
            <th>Proveedor</th>
            <th>Usuario</th>
            <th>Detalle</th>
        </tr>
<?php
    $movimiento->muestraFacturas($conn);
?>}


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