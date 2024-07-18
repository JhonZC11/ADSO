<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Balances</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" refer></script>


    <link rel="stylesheet" href="../../css/nav-bar.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/buttons.css">

</head>

<body>

<?php 
    require("../php/db.php");
    require("i-balance/o_balance.php");
    $v = $balance->all($conn);   
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
                            <li><a class="dropdown-item" href="../informes/inventarios.php">Inventarios</a></li>
                            <li><a class="dropdown-item" href="../informes/balances.php">Contabilidad</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="../consulta-documentos/ordenes-proceso.php">
                            Consulta Documentos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../consulta-documentos/ordenes-proceso.php">Ordenes de Proceso</a></li>
                            <li><a class="dropdown-item" href="../consulta-documentos/transacciones.php">Transacciones</a></li>
                            <li><a class="dropdown-item" href="../consulta-documentos/analisis-inventarios.php">Análisis de Inventarios</a></li>
                            <li><a class="dropdown-item" href="../consulta-documentos/devoluciones.php">Notas Crédito</a></li>
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
                        <a class="nav-link" aria-current="page" href="../php/sessiondestroy.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-5 bg-white mt-5">
        <div class="row mb-3">
            <div class="col">
                <h1 class="fw-bold text-center" >Busca lo que gustes:</h1>
            </div>
        </div>
        <div class="row fw-bold">
            <div class="col">
                <h3 class="fw-bold">Reporte por movimiento:</h3>                
            </div>
        </div>
        <div class="row fw-bold p-3">
            <div class="col">
                <form action="i-balance/i-movimiento.php" method="post">
                    <label for="fecha_inicio">Fecha de inicio:</label>
                    <input type="date"  class="fw-bold" name="fecha_inicio">
                    <label for="fecha_fin">Fecha fin:</label>
                    <input type="date" class="fw-bold" name="fecha_fin">
                    <label for="motivo">Motivo:</label>
                    <select name="motivo" id="" class="fw-bold">
                        <option value="EAC" class="fw-bold">Entrada almacén - EAC</option>
                        <option value="DB" class="fw-bold">Dar baja - DB</option>
                        <option value="FC" class="fw-bold">Factura Compra - FC</option>
                    </select>
                    <input type="submit" class="registrar float-end" value="Buscar">
                </form>
            </div>
        </div>
        <hr>
        <div class="row fw-bold">
            <div class="col">
                <h3 class="fw-bold">Reporte por procesos:</h3>
            </div>
        </div>
        <div class="row fw-bold p-3">
            <div class="col">
                <form action="">
                    <label for="fecha_inicio">Fecha de inicio:</label>
                    <input type="date" class="fw-bold" name="fecha_inicio">
                    <label for="fecha_fin">Fecha fin:</label>
                    <input type="date" class="fw-bold" name="fecha_fin">
                    <label for="operario">Operario: </label>
                    <input type="text" class="fw-bold" name="operario">
                    <input type="submit" class="registrar float-end" value="Buscar">
                </form>
            </div>
        </div>
        <hr>
        <div class="row fw-bold">
            <div class="col">
                <h3 class="fw-bold">Reporte por facturas de venta: </h3>
            </div>
        </div>
        <div class="row fw-bold p-3">
            <div class="col">
                <form action="" class="">
                    <label for="fecha_inicio">Fecha de inicio:</label>
                    <input type="date" class="fw-bold"  name="fecha_inicio">
                    <label for="fecha_fin">Fecha fin:</label>
                    <input type="date" class="fw-bold" name="fecha_fin" >
                    <label for="operario">Operario: </label>
                    <input type="text" class="fw-bold" name="operario">
                    <label for="cliente">Cliente</label>
                    <input type="text" id="cliente" class="fw-bold" name="cliente">
                    <input type="submit" class="registrar float-end" value="Buscar">
                </form>
            </div>
        </div>
        <hr>
        <div class="row m-5">
            <div class="col">
                <h3 class="text-center fw-bold">Balance total</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 text-center">
                <h4 class="fw-bold">Valores positivos: </h4>
                <p class="fw-bold">
                    <?php
                        echo "$ " . number_format($v[0],0,'.');
                    ?>
                </p>
            </div>
            <div class="col-6 text-center">
                <h4 class="fw-bold">Valores negativos: </h4>
                <p class="fw-bold text-danger">
                    <?php
                        echo "$ " . number_format($v[1], 0, '.') ;
                    ?>
                </p>
            </div>
        </div>
        <hr>
    </div>


    <footer>
        <img src="../../img/bg.png" alt="" width="20%">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>