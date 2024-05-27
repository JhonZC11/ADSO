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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
    $file = file_get_contents("../php/user.txt");
?>
<nav class="navbar p-0 navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../transacciones/movimientos.php">Transacciones</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="../inventarios/ingresos-fisicos.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Inventarios
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../inventarios/ingresos-fisicos.php">Ingreso Físico</a></li>
                    <li><a class="dropdown-item" href="../inventarios/analisis-diferencias.php">Análisis de Diferencias</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="../centro-procesos/procesar.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Centro de Procesos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../centro-procesos/procesar.php">Procesar Fruta</a></li>
                    <li><a class="dropdown-item" href="../centro-procesos/registroxorden.php">Registro por Orden</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="../informes/ventas.php">
                    Informes</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../informes/ventas.php">Ventas</a></li>
                    <li><a class="dropdown-item"  href="../informes/inventarios.php">Inventarios</a></li>
                    <li><a class="dropdown-item"  href="../informes/balances.php">Contabilidad</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="../consulta-documentos/ordenes-proceso.php">
                    Consulta Documentos</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item"  href="../consulta-documentos/ordenes-proceso.php">Ordenes de Proceso</a></li>
                    <li><a class="dropdown-item"  href="../consulta-documentos/transacciones.php">Transacciones</a></li>
                    <li><a  class="dropdown-item" href="../consulta-documentos/analisis-inventarios.php">Análisis de Inventarios</a></li>
                    <li><a  class="dropdown-item" href="../consulta-documentos/devoluciones.php">Notas Crédito</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../clientes.php">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../proveedores.php">Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../operarios.php">Operarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../ventas/main.php">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../../index.php">Salir</a>
            </li>
        </ul>
        </div>
    </div>
</nav>


<div id="form" class="inv">
    <div class="bar" id="">
        <div class="txt-m">Ingreso Inventario Físico</div><div class="close"><button id="closeUsuarios" onclick="cierraForm();" >X</button></div>
    </div>
    <form action="inventarios/inserta_inventario.php" method="post"><br>
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
<script src="../../js/general.js" refer></script>
<script>
$(document).ready(function() {
    $("#usuarios").draggable();
    $("#form").draggable();
});
</script>
</body>
</html>