<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Fruta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
            <li><a href="../ventas/main.php">Ventas</a>
                <ul>
                    <li><a href="../ventas/main.php" id="a">Sala de Ventas</a></li>                    
                </ul>
            </li>
        </ul>
            <li><a href="../../index.php" class="salir">Salir</a></li>
        </div>      
</header>


<script>
    let item = ["1","Fruta Guanabana",
                "2","Guanabana sin cascara",
                "3","Guanabana sin semilla",
                "4","Guanabana limpia",
                "5","Guanabana Bolsa x10kg"]
    let valor = [
                 "1","3000", "Pelar", //Pelar
                 "2","300", "Despulpar", //Despulpar
                 "3","3000", "Limpiar",//Limpiar
                 "4","1000", "Empacar" //Empacar
                ]
    function cargaItem(){
        
        var inp =document.getElementById("item").value;
        var descripcionPrimerItem = document.getElementById("d_item")
        var descripcionSegundoItem =document.getElementById("d_item2")
        var idSegundoItem = document.getElementById("id2")


        var idProceso = document.getElementById("idProceso")
        var proceso = document.getElementById("proceso")

        var horas = document.getElementById("horas")

        var costo = document.getElementById("costo")
        var costoTotal = document.getElementById("costoTotal")
        
        var canti = document.getElementById("cantidad").value;
        var total = canti*0.15;
        var CantidadTotal = document.getElementById("cantidadTotal").value=canti-total;

        var bolsasResultantes = canti/10;
        

        if(inp<5){
            if(inp==item[0]){ //1
                descripcionPrimerItem.innerHTML=item[1] //Fruta guanabana
                descripcionSegundoItem.innerHTML=item[3] //Fruta sin cascara
                idSegundoItem.value=item[2] // 2
                costo.value=valor[1] // 3000
                proceso.innerHTML=valor[2] // pelar
                idProceso.value=valor[0]
                horas.removeAttribute('readonly')
                $('#horas').change(function(){
                    var h = document.getElementById("horas").value;
                    costoTotal.value=  h * valor[1]
                })
            } else if(inp==item[2]){ // 2
                descripcionPrimerItem.innerHTML=item[3] // Sin cascara
                descripcionSegundoItem.innerHTML=item[5] // Sin semilla
                idSegundoItem.value=item[4] // 3
                idProceso.value=valor[3]
                costo.value=valor[4]// 300
                costoTotal.value= canti * valor[4] // multiplicacion
                proceso.innerHTML=valor[5] // pelar
            }else if(inp==item[4]){ // 3
                descripcionPrimerItem.innerHTML=item[5] // Sin semilla
                descripcionSegundoItem.innerHTML=item[7] // Limpia
                idSegundoItem.value=item[6] // 4
                idProceso.value=valor[6]
                costo.value=valor[7]// 3000
                proceso.innerHTML=valor[8] // limpiar
                horas.removeAttribute('readonly')
                $('#horas').change(function(){
                    var h = document.getElementById("horas").value;
                    costoTotal.value=  h * valor[1]
                })
            }else if(inp==item[6]){ // 4
                descripcionPrimerItem.innerHTML=item[7] // Limpia
                descripcionSegundoItem.innerHTML=item[9] // Empacada
                idSegundoItem.value=item[8] // 4
                idProceso.value=valor[9]
                costo.value=valor[10]// 3000
                costoTotal.value=valor[10] // multiplicacion
                proceso.innerHTML=valor[11] // limpiar
                var inputTotal = document.getElementById("cantidadTotal").value = bolsasResultantes;
            }else{
                alert("Item desconocido!")
                inp.focus();
            }
        } else {
            alert("Item fuera de rango")
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
    if(valorInput>=5){
        valorInput="";
        alert("Item fuera de rango")
        window.location.reload()
    } else {
        $.ajax({
        url: 'procesos/consulta_cantidad.php',
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
            if(resultadoTexto<=0){
                alert("No hay cantidad suficiente para operar!")
                window.location.reload();
            }else if(valorInput==4 && resultadoTexto < 10){
                alert("No hay cantidad suficiente para empacar\nTienes "+resultadoTexto+"kg de Guanabana Limpia")
                window.location.reload();
            }else{
                $('#operario-label').html(operario);
                $('#d_item').html(nombre);
                $('#c').val(resultadoTexto);
                $('#operario-label').html(usuario);
                
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
    }
    
}

function realizarSolicitudAjax2() {
    // Obtener el valor del input
    var valorInput = $('#cc').val();
    $.ajax({
        url: 'procesos/consulta_operario.php',
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
    <form action="procesos/procesos.php" method="post">
        <div class="head">
            <label for="">Operario:</label>    
            <input type="text" id="cc" name="cc" require>
            <span id="operario-label" class="label">.</span>
            <label for="">Fecha:</label>
            <input type="date" name="fecha">
        </div>
        <hr>
        <table>
            <tr class="tableheads">
                <td class="d">ID</td><td class="">Descripción</td><td>Cantidad a procesar</td><td>Cantidad Stock</td>
            </tr>
            <tr>
                <td><input type="text" class="inp" id="item" name="item"></td>
                <td class="t" id="d_item"></td>
                <td><input type="text" name="cantidad" id="cantidad" class="inp" onchange="cargaItem();"></td>
                <td><input type="text" class="inp" id="c" name="cantidadStock" readonly></td>
            </tr>
            
            <tr class="tableheads">
                <td class="d">ID</td><td>Genera</td><td>Costo por hora/kg</td><td>Costo por proceso</td>
            </tr>
            <tr>
                <td><input type="text" id="id2" class="inp" name="nextId" readonly></td>
                <td id="d_item2" class="t"></td>
                <td><input type="text" id="costo" name="costo" class="inp" readonly></td>
                <td><input type="text" id="costoTotal" name="costoTotal" class="inp" readonly></td>
            </tr>
            <tr class="tableheads">
                    
                <td colspan="1">Cantidad Resultante: </td>
                <td colspan="1">Horas trabajadas</td>
                <td colspan="2">Proceso realizado: </td>
                
            </tr>
            <tr>
                <td colspan="1"><input type="text" id="cantidadTotal" name="cantidadTotal" class="inp"> kg</td>
                <td colspan="1"><input type="text" id="horas" name="horas" class="inp" readonly></td>
                <td colspan="2" id="proceso" class="t"></td>
                <input type="hidden" name="idProceso" id="idProceso">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>