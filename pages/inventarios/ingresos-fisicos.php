<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Físico</title>
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
    <link rel="stylesheet" href="../../css/inv.css">
    <style>
        .txt-m{position: relative;left:51%;}
        th {color:white;background-color: #5E5E5E;}
        td{background-color: #D9D9D9;margin: 10px;}
        .inp{width: 40%;}
    </style>
</head>
<body>
<?php
    $file = file_get_contents("../../php/user.txt");
?>
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
        <li><a href="../index.php" class="salir">Salir</a></li>
        </div>      
</header>
<div id="form" class="inv">
    <div class="bar" id="">
        <div class="txt-m">Ingreso Inventario Físico</div><div class="close"><button id="closeUsuarios" onclick="cierraForm();" >X</button></div>
    </div>
    <form action="../../php/inserta_inventario.php" method="post"><br>
    <label for="">Usuario: </label><span name="usuario"><?php echo $file; ?></span><br><br>
    <label for="">Fecha: </label><input type="date" name="d" id="">
    <label for="">Tipo: </label><input type="text" name="t">
    <table>
        <thead>
            <tr>
                <th>ID</th><th>DESCRIPCIÓN</th><th>CANTIDAD FISICA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td><td>FRUTA</td><td><input type="text" name="1" class="inp"></td>
            </tr>
            
            <tr>
                <td>02</td><td>FRUTA SIN CASCARA</td><td><input type="text" name="2" class="inp"></td>
            </tr>
            
            <tr>
                <td>03</td><td>FRUTA SIN SEMILLA</td><td><input type="text" name="3" class="inp"></td>
            </tr>
            
            <tr>
                <td>04</td><td>FRUTA LIMPIA</td><td><input type="text" name="4" class="inp"></td>
            </tr>
            
            <tr>
                <td>05</td><td>FRUTA BOLSA X10KG</td><td><input type="text" name="5" class="inp"></td>
            </tr>
        </tbody>
    </table>
    <div class="buttons">
        <button class="cancel" id="close">Cancelar</button>
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
});
</script>
</body>
</html>