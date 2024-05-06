<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Actualización</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/usuarios.css">
    <link rel="stylesheet" href="../css/barra.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../css/nav-bar.css">
    <link rel="stylesheet" href="../../css/barra.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/proveedores.css">
    <style>
    form{display:block;}
</style>
</head>
<body>
<header>
        <div id="header">
        <ul class="nav">
            
            <li><a href="../a/transacciones/movimientos.php" id="M_Inventario">Transacciones</a>
                <ul>
                    <li><a href="../a/transacciones/movimientos.php" id="M_Inventario">Movimientos de Inventarios</a></li>
                </ul>
            </li>

            <li><a href="../a/inventarios/ingresos-fisicos.php">Inventarios</a>
                <ul>
                    <li><a href="../a/inventarios/ingresos-fisicos.php">Ingreso Físico</a></li>
                    <li><a href="../a/inventarios/analisis-diferencias.php">Análisis de Diferencias</a></li>
                </ul>        
            </li>
                
                                  
            <li><a href="../a/centro-procesos/procesar.php">Centro de Procesos</a>
                <ul>
                    <li><a href="../a/centro-procesos/procesar.php">Procesar Fruta</a></li>
                    <li><a href="../a/centro-procesos/registroxorden.php">Registro por Orden</a></li>
                </ul>
            </li>    
            <li><a href="../a/informes/ventas.php">Informes</a>
                <ul>
                    <li><a href="../a/informes/ventas.php">Ventas</a></li>
                    <li><a href="../a/informes/inventarios.php">Inventarios</a></li>
                    <li><a href="../a/informes/balances.php">Contabilidad</a></li>
                </ul>
            </li>
            <li><a href="../a/consulta-documentos/ordenes-proceso.php">Consulta Documentos</a>
                <ul>
                    <li><a href="../a/consulta-documentos/ordenes-proceso.php">Ordenes de Proceso</a></li>
                    <li><a href="../a/consulta-documentos/transacciones.php">Transacciones</a></li>
                    <li><a href="../a/consulta-documentos/analisis-inventarios.php">Análisis de Inventarios</a></li>
                    <li><a href="../a/consulta-documentos/devoluciones.php">Notas Crédito</a></li>
                </ul>
            </li>
            <li><a href="../a/usuarios.php">Usuarios</a>
                <ul>
                    <li><a href="../a/usuarios.php" id="a">Gestión usuarios</a></li>                    
                </ul>
            </li>
            <li><a href="../a/clientes.php">Clientes</a>
                <ul>
                    <li><a href="../a/clientes.php" id="a">Gestión clientes</a></li>                    
                </ul>
            </li>
            <li><a href="../a/proveedores.php">Proveedores</a>
                <ul>
                    <li><a href="../a/proveedores.php" id="a">Gestión proveedores</a></li>                    
                </ul>
            </li>
            <li><a href="../a/operarios.php">Operarios</a>
                <ul>
                    <li><a href="../a/operarios.php" id="a">Gestión operarios</a></li>                    
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

<?php
$id = $_GET["id"];
$identificador = $_GET["cc"];
$nom = $_GET["nom"];
$tel = $_GET["tel"];
$dir = $_GET["dir"];
$ciudad = $_GET["ciu"];
$mail = $_GET["mail"];


?>


    <form action="process_proveedor.php" id="form" method="POST">
        
        <div class="bar">
            <div class="txt">Actualización</div><div class="close"><button  id="close">X</button></div>
        </div>
        
        <div class="content"><br>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <label for="">Identificación: </label><input type="" id="iden" name="iden" readonly value="<?php echo $identificador?>"><br><br>
            <label for="">Nombres: </label><input type="text" id="nombre" name="nombres" value="<?php echo $nom?>"><br><br>
            <label for="">Mail: </label><input type="mail" id="cc" name="mail" value="<?php echo $mail?>" ><br><br>
            <label for="">Dirección: </label><input type="text" id="cc" name="dir" value="<?php echo $dir?>" ><br><br>
            <label for="">Ciudad: </label><input type="text" id="cc" name="ciudad" value="<?php echo $ciudad?>" ><br><br>
            <label for="">Telefono: </label><input type="text" id="cc" name="telefono" value="<?php echo $tel?>" ><br><br>
        </div>
        <div class="buttons">
            <button class="cancel" id="cancel">Cancelar</button>
            <input type="submit" class="registrar" value="Actualizar">
            <br><br><hr><br>
        </div>
    </form>

        
    <script src="../js/usuarios.js" refer></script>    
    <script>
        $(document).ready(function() {
            $("#usuarios").draggable();
            $("#form").draggable();
        });
    </script>
</body>
</html>