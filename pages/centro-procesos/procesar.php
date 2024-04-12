<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Fruta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../css/nav-bar.css">
    <link rel="stylesheet" href="../../css/barra.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/procesar.css">
    <style>
        .txt-m{
            left: 90%;
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
<script>
    let item = ["1","Fruta Guanabana",
                "2","Guanabana sin cascara",
                "3","Guanabana sin semilla",
                "4","Guanabana limpia",
                "5","Guanabana Bolsa x10kg"]
    let valor = [
                 "3000", //Pelar
                 "300",  //Despulpar
                 "3000", //Limpiar
                 "1000"  //Empacar
                ]
    function cargaItem(){
        var inp =document.getElementById("item").value;
        var i =document.getElementById("d_item2")
        var id = document.getElementById("id2")
        var costo = document.getElementById("costo")
        var costoTotal = document.getElementById("costoTotal")
        var canti = document.getElementById("cantidad").value;
        var total = canti*0.15;
        var CantidadTotal = document.getElementById("cantidadTotal").value=canti-total;
        if(inp==item[0]){
            i.innerHTML=item[1]
            id.value=item[2]
            costo.value=valor[0]
            costoTotal.value=valor[0]
        } else if(inp==item[2]){
            i.innerHTML=item[3]
            id.value=item[4]
        }else if(inp==item[4]){
            i.innerHTML=item[5]
            id.value=item[6]
        }else if(inp==item[5]){
            i.innerHTML=item[6]
            id.value=item[7]
        }
        else{
            alert("Item desconocido!")
            inp.focus();
        }
    }
</script>
<script>
var usuario ={};

    $(document).ready(function(){
        $('#item').change(function(){
            realizarSolicitudAjax();
        });
        $('#cc').change(function(){
            realizarSolicitudAjax2();
        });
    }); 

function realizarSolicitudAjax() {
    // Obtener el valor del input
    var valorInput = $('#item').val();
    var cc = $('#cc').val();
    $.ajax({
        url: 'consulta_cantidad.php',
        type: 'GET',
        data: { inputValue: valorInput, cc: cc},
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';
            var nombre = '';
            var operario = '';
            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.cantidad;
                nombre += proveedor.descripcion;
            });
            $('#operario-label').html(operario);
            $('#d_item').html(nombre);
            $('#c').val(resultadoTexto);
            $('#operario-label').html(usuario);
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
}

function realizarSolicitudAjax2() {
    // Obtener el valor del input
    var valorInput = $('#cc').val();
    $.ajax({
        url: 'consulta_operario.php',
        type: 'GET',
        data: { inputValue: valorInput},
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';
            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.nombres;
            });
            usuario = resultadoTexto;
            $('#operario-label').html(resultadoTexto);
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
}
</script>


<div class="ad" id="ad">
    <div class="bar" id="">
        <div class="txt-m">Procesar</div><div class="close"><button id="closeUsuarios" onclick="cierra();" >X</button></div>
    </div>
    <form action="../../php/procesos.php" method="post">
        <div class="head">
            <label for="">Operario:</label>    
            <input type="text" id="cc" name="cc">
            <span id="operario-label" class="label">.</span>
            <label for="">Fecha:</label>
            <input type="date" name="fecha">
        </div>
        <hr>
        <table>
            <tr class="tableheads">
                <td>ID</td><td class="t">Descripción</td><td>Cantidad a procesar</td><td>Cantidad Stock</td>
            </tr>
            <tr>
                <td><input type="text" class="inp" id="item" name="item"></td>
                <td class="t" id="d_item"></td>
                <td><input type="text" name="cantidad" id="cantidad" class="inp" onchange="cargaItem();"></td>
                <td><input type="text" class="inp" id="c" readonly></td>
            </tr>
            
            <tr class="tableheads">
                <td>ID</td><td>Genera</td><td>Costo por hora/kg</td><td>Costo por proceso</td>
            </tr>
            <tr>
                <td><input type="text" id="id2" class="inp" name="nextId" readonly></td>
                <td id="d_item2"></td>
                <td><input type="text" id="costo" name="costo" class="inp" readonly></td>
                <td><input type="text" id="costoTotal" name="costoTotal" class="inp" readonly></td>
            </tr>
            <tr class="tableheads">
                <td colspan="4">Cantidad Resultante: </td>
            </tr>
            <tr>
                <td colspan="4"><input type="text" id="cantidadTotal" name="cantidadTotal"> kg</td>
            </tr>
        </table>
            <hr>

        
        <div class="buttons2">
            <button class="cancel" id="close" onclick="cierra();">Cancelar</button>
            <input type="submit" class="registrar" value="Registrar">
        </div>    
    </form>
</div>






<footer>
<img src="../../img/bg.png" alt="" width="20%">
</footer>

<script src="../../js/usuarios.js" refer></script>
<script>
$(document).ready(function() {
    $("#usuarios").draggable();
    $("#form").draggable();
    $("#ad").draggable();
});
function cierra(){
    $("#ad").hide();
}
</script>
</body>
</html>