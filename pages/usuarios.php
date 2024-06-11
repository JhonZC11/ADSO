<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/barra.css">
    <link rel="stylesheet" href="../css/usuarios.css">
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

    <div class="container mt-5 bg-white p-5">
        <div class="row p-5">
            <div class="col text-left">
                <h2 class=" fw-bold">Usuarios</h2>
            </div>
<!--
            <div class="col text-end">
            <button class="registrar" id="registroCRUD">Agregar Usuario</button>
            </div>
-->
        </div>
        <div class="table-responsive fw-bold text-center">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Id Usuario</th>
                        <th>Ultimo Inicio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require("php/db.php");
                    $sql = "SELECT usuarios.*, operarios.*
                        FROM usuarios
                        JOIN operarios ON usuarios.operarios_idoperarios = operarios.idoperarios                        
                        ";

                    $resultados = $conn->query($sql);
                    while ($resultado = $resultados->fetch_row()) {
                        echo "<tr>
                            <td>$resultado[0]</td>
                            <td>$resultado[2]</td>
                            <td>
                            <a class='edit' href='../php/usuarios/update.php?
                            id=$resultado[0]'>Edit</button>
                            <a class='delete' href='../php/usuarios/delete.php?
                            id=$resultado[0]'>Delete</button>
                            </td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal modal-sm" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fw-bold">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registra Usuarios</h1>
                    <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-5">    
                <form action="../php/usuarios/insert.php" id="form" method="POST">

                    <div class="row">
                        <div class="col">
                            <label for="">Nombres: </label>
                            <input type="text" id="nombre" name="nombres" required>                      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Apellidos: </label>
                            <input type="text" id="apellido" name="apellidos" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Cédula: </label>
                            <input type="text" id="cc" name="cc" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="">Contraseña: </label>
                            <input type="password" id="pass" name="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Fecha de nacimiento: </label>
                            <input type="date" id="date" name="date" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="cancel" id="cancel">Cancelar</button>
                    <input type="submit" class="registrar" value="Registrar">
                </form>
                </div>
            </form> 
            </div>
        </div>
    </div>


    






    <!--

        EN ESTA SECCIÓN SE DARÁ ESTILO A LAS VENTANAS PARA INFORMAR AL USUARIO

-->

    <footer>
        <img src="../img/bg.png" alt="" width="20%">
    </footer>


    <script src="../js/usuarios.js" refer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>