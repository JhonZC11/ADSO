<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/barra.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/clientes.css">
    <style>
        td, label, input{font-weight: bolder; color:gray;}
    </style>
</head>
<body>
<header>
        <div id="header">
        <ul class="nav">
            
            <li><a href="transacciones/movimientos.php" id="M_Inventario">Transacciones</a>
                <ul>
                    <li><a href="transacciones/movimientos.php" id="M_Inventario">Movimientos de Inventarios</a></li>
                </ul>
            </li>

            <li><a href="inventarios/ingresos-fisicos.php">Inventarios</a>
                <ul>
                    <li><a href="inventarios/ingresos-fisicos.php">Ingreso Físico</a></li>
                    <li><a href="inventarios/analisis-diferencias.php">Análisis de Diferencias</a></li>
                </ul>        
            </li>
                
                                  
            <li><a href="centro-procesos/procesar.php">Centro de Procesos</a>
                <ul>
                    <li><a href="centro-procesos/procesar.php">Procesar Fruta</a></li>
                    <li><a href="centro-procesos/registroxorden.php">Registro por Orden</a></li>
                </ul>
            </li>    
            <li><a href="informes/ventas.php">Informes</a>
                <ul>
                    <li><a href="informes/ventas.php">Ventas</a></li>
                    <li><a href="informes/inventarios.php">Inventarios</a></li>
                    <li><a href="informes/balances.php">Contabilidad</a></li>
                </ul>
            </li>
            <li><a href="consulta-documentos/ordenes-proceso.php">Consulta Documentos</a>
                <ul>
                    <li><a href="consulta-documentos/ordenes-proceso.php">Ordenes de Proceso</a></li>
                    <li><a href="consulta-documentos/transacciones.php">Transacciones</a></li>
                    <li><a href="consulta-documentos/analisis-inventarios.php">Análisis de Inventarios</a></li>
                    <li><a href="consulta-documentos/devoluciones.php">Notas Crédito</a></li>
                </ul>
            </li>
            <li><a href="usuarios.php">Usuarios</a>
                <ul>
                    <li><a href="usuarios.php" id="a">Gestión usuarios</a></li>                    
                </ul>
            </li>
            <li><a href="clientes.php">Clientes</a>
                <ul>
                    <li><a href="clientes.php" id="a">Gestión clientes</a></li>                    
                </ul>
            </li>
            <li><a href="proveedores.php">Proveedores</a>
                <ul>
                    <li><a href="proveedores.php" id="a">Gestión proveedores</a></li>                    
                </ul>
            </li>
            <li><a href="operarios.php">Operarios</a>
                <ul>
                    <li><a href="operarios.php" id="a">Gestión operarios</a></li>                    
                </ul>
            </li>
            <li><a href="ventas/main.php">Ventas</a>
                <ul>
                    <li><a href="ventas/main.php" id="a">Sala de Ventas</a></li>                    
                </ul>
            </li>
        </ul>
        <li><a href="../index.php" class="salir">Salir</a></li>
        </div>      
</header>

<div class="usuarios" id="usuarios">

    <div class="bar" id="">
        <div class="txt-m">Registro Clientes</div><div class="close"><button id="closeUsuarios" onclick="cierraForm();" >X</button></div>
    </div>

    <div class="tabla">

        <table id = "tabla">
            <thead>
                <tr>
                    <th>Cedula</th><th>Nombres</th><th>Telefono</th><th>Direccion</th><th>Ciudad</th><th>Correo</th><th>Fecha Nacimiento</th><th>Opciones</th>
                </tr>
                <hr>
            </thead>
            <tbody>
                <?php
                    require ("php/db.php");
                    require ("clientes/o_clientes.php");
                    $resultados = $cliente->select($conn);
                ?>
            </tbody>
        </table>
    </div>
    <div class="ingresar">
        <button class="registrar" id="registroCRUD" onclick="muestraForm();" >Agregar Usuario</button>
    </div>


</div>

<form action="clientes/insert.php" id="form" method="POST">

    <div class="bar">
        <div class="txt">Registro Cliente</div><div class="close"><button  id="close">X</button></div>
    </div>
    
    <div class="content"><br>
        <label for="">Identificación: </label><input type="text" id="iden" name="cc" required><br><br>
        <label for="">Nombres: </label><input type="text" id="nombre" name="nombres" required><br><br>
        <label for="">Telefono: </label><input type="text" id="telefono" name="telefono" required><br><br>
        <label for="">Direccion</label><input type="text" name="direccion" id="direccion"><br><br>
        <label for="">Ciudad: </label><input type="text" name="ciudad" id="ciudad" required><br><br>
        <label for="">Correo: </label><input type="mail" id="mail" name="mail"  required><br><br>
        <label for="">Fecha Nacimiento: </label><input type="date" id="mail" name="fecha"  required><br><br>
       <br><br><hr> 
    </div>
    <div class="buttons">
        <button class="cancel" id="cancel">Cancelar</button>
        <input type="submit" class="registrar" value="Registrar">
        <br><br><hr><br>
    </div>
</form>





<!--

EN ESTA SECCIÓN SE DARÁ ESTILO A LAS VENTANAS PARA INFORMAR AL USUARIO

-->
<footer>
<img src="../img/bg.png" alt="" width="20%">
</footer>



<script src="../js/usuarios.js" refer></script>    
<script>
$(document).ready(function() {
    $("#usuarios").draggable();
    $("#form").draggable();
});
</script>
    
</body>
</html>