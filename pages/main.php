<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
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


    <link rel="stylesheet" href="../css/nav-bar.css">

</head>
<body>
<nav class="navbar p-0 navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="transacciones/movimientos.php">Transacciones</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="inventarios/ingresos-fisicos.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inventarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="inventarios/ingresos-fisicos.php">Ingreso Físico</a></li>
                            <li><a class="dropdown-item" href="inventarios/analisis-diferencias.php">Análisis de Diferencias</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="centro-procesos/procesar.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Centro de Procesos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="centro-procesos/procesar.php">Procesar Fruta</a></li>
                            <li><a class="dropdown-item" href="centro-procesos/registroxorden.php">Registro por Orden</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="informes/ventas.php">
                            Informes</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="informes/ventas.php">Ventas</a></li>
                            <li><a class="dropdown-item" href="informes/inventarios.php">Inventarios</a></li>
                            <li><a class="dropdown-item" href="informes/balances.php">Contabilidad</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="../consulta-documentos/ordenes-proceso.php">
                            Consulta Documentos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="consulta-documentos/ordenes-proceso.php">Ordenes de Proceso</a></li>
                            <li><a class="dropdown-item" href="consulta-documentos/transacciones.php">Transacciones</a></li>
                            <li><a class="dropdown-item" href="consulta-documentos/analisis-inventarios.php">Análisis de Inventarios</a></li>
                            <li><a class="dropdown-item" href="consulta-documentos/devoluciones.php">Notas Crédito</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="usuarios.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="proveedores.php">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="operarios.php">Operarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="ventas/main.php">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../php/sessiondestroy.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>    
    <footer>
        <img src="../img/bg.png" alt="" width="20%">
    </footer>


</body>
</html>