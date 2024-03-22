<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de orden</title>
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
    <link rel="stylesheet" href="../../css/registroxorden.css">


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

<div id="ad" class="ad">
    <div class="bar" id="">
        <div class="txt-m">Registro de ordernes</div><div class="close"><button id="closeUsuarios" onclick="cierra();" >X</button></div>
    </div>
    <div class="head">
        <label for="" class="ope">Opeario: </label>
        <input type="text">
        <label for="" class="date">Fecha:</label>
        <input type="date">
    </div>
    <hr>
    <table>
        <tr class="tableheads">
            <td>ID</td><td>Cantidad</td><td>Producto procesado</td><td>Valor proceso</td><td>Operario</td><td>Opciones</td>
        </tr>
        <tr>
            <td>.</td><td></td><td></td><td></td>
        </tr>
        
    </table>
        <hr>
    
    
    <div class="buttons2">
        <button class="cancel" id="close" onclick="cierra();">Cerrar</button>
    </div>    

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