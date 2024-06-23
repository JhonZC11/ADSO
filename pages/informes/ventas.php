<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="../../css/barra.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/i-ventas.css">
</head>

<body>
    <?php
    require("../php/db.php");
    require("i-ventas/o_ventas.php");
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


    <div class="container bg-white p-5 mt-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center fw-bold">Ventas</h1>
                <hr>
            </div>
        </div>
        <div class="row g-4 fw-bold">
            <form action="i-ventas/busca.php" method="post" class="d-flex p-3">
                <div class="col-md-6 m-1">
                    <label for="fecha_inicio" class="form-label">Fecha Inicio:</label><input class="form-control fw-bold" type="date" id="fecha_inicio" name="fecha_inicio">
                </div>
                <div class="col-md-6 m-1">
                    <label for="fecha_fin" class="form-label">Fecha Fin:</label><input class="form-control fw-bold" type="date" id="fecha_fin" name="fecha_fin">
                </div>
        </div>
        <div class="row g-4 fw-bold">
            <div class="col">
                <label for="operario">Operario: </label><input type="text" class="form-control fw-bold" name="operario">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-1 text-end">
                <hr>
                <input type="submit" class="registrar fw-bold" value="Buscar">
            </div>
        </div>
        </form>
    </div>

    <div class="container bg-white p-5">
            <table class="table">
                <thead class="table-dark text-center">
                    <th>Id Factura</th>
                    <th>N Factura</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Valor Unitario</th>
                    <th>Total</th>
                    <th>Operario</th>
                    <th>Cliente</th>
                </thead>
                <tbody>
                    <?php                        
                        if(isset($_COOKIE['op'])){
                            $operario = $_COOKIE['op'];
                            $venta->buscaOperario($conn, $operario);
                        } else if(isset($_COOKIE['fecha_inicio'])&&isset($_COOKIE['fecha_fin'])){
                            $fi = $_COOKIE['fecha_inicio'];
                            $ff = $_COOKIE['fecha_fin'];
                            $venta->buscarFecha($conn, $fi, $ff);
                        }else if(isset($_COOKIE['fi'])&&isset($_COOKIE['ff'])&&isset($_COOKIE['op'])){
                            $fi = $_COOKIE['fi'];
                            $ff = $_COOKIE['ff'];
                            $operario = $_COOKIE['op'];
                            $venta->buscarAll($conn, $fi, $ff, $operario);
                        }else if(isset($_COOKIE['f'])){
                            $f = $_COOKIE['f'];
                            $venta->buscaFecha($conn, $f);
                        }else{
                            $venta->all($conn);
                        }
                    ?>
                </tbody>
            </table>
    </div>



    <footer>
        <img src="../../img/bg.png" alt="" width="20%">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>