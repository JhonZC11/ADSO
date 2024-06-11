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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="stylesheet" href="../../css/nav-bar.css">
    <link rel="stylesheet" href="../../css/barra.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../../css/clientes.css">
    <style>
        .navbar {
            font-weight: lighter;
        }
    </style>
</head>

<body>


    <nav class="navbar p-0 navbar-expand-xl bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-md-0 d-md-flex d-lg-flex flex-lg-row">
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


    <?php
    $id = $_GET["id"];
    $identificador = $_GET["cc"];
    $nom = $_GET["nom"];
    $tel = $_GET["tel"];
    $dir = $_GET["dir"];
    $ciudad = $_GET["ciudad"];
    $mail = $_GET["correo"];
    $date = $_GET["date"];


    ?>
    <div class="modal modal-sm" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización</h1>
                    <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-5">
                    <form action="process_update.php" id="form" method="POST">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <label for="">Identificación: </label>
                                <input type="" id="iden" name="cc" readonly value="<?= $identificador ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label for="">Nombres: </label>
                            <input type="text" id="nombre" name="nombres" value="<?= $nom ?>">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Mail: </label>
                                <input type="mail" id="cc" name="mail" value="<?= $mail ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Dirección: </label>
                                <input type="text" id="cc" name="direccion" value="<?= $dir ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Ciudad: </label>
                                <input type="text" id="cc" name="ciudad" value="<?= $ciudad ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Telefono: </label>
                                <input type="text" id="cc" name="telefono" value="<?= $tel ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Fecha Nacimiento: </label>
                                <input type="date" id="cc" name="fecha" value="<?= $date ?>">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="cancel" id="cancel">Cancelar</button>
                    <input type="submit" class="registrar" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {
            $("#exampleModal").draggable();
            
            $('#exampleModal').show()
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>