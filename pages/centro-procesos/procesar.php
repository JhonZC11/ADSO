<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Fruta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" refer></script>
    
    <script src="../../js/proceso.js"></script>

    <link rel="stylesheet" href="../../css/nav-bar.css">
    <link rel="stylesheet" href="../../css/barra.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/procesar.css">
    <style>
        .txt-m{
            left: 90%;
        }
    </style>
</head>
<body>
<?php
    if(isset($_COOKIE['done'])){
        $alert = '';
        $alert.= "<script>
        $(document).ready(function(){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
            });
            Toast.fire({
            icon: 'success',
            title: 'Proceso realizado correctamente'
            });
        })
        </script>";
        echo $alert;
        setcookie("done", "", time() - 3600, "/");
    }

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
                <a class="nav-link" aria-current="page" href="../php/sessiondestroy.php">Salir</a>
            </li>
        </ul>
        </div>
    </div>
</nav>

<div class="modal modal-xl mt-5" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bar">
        <h5 class="modal-title fw-bold">Procesar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
      </div>
      <form action="procesos/procesos.php" method="post">
        <div class="head">
            <label for="" class="fw-bold">Operario:</label>    
            <input type="text" class="fw-bold ms-5" id="cc" name="cc" require>
            <span id="operario-label" class="label">.</span>
            <label for="" class="fw-bold me-5" >Fecha:</label>
            <input type="date" class="fw-bold" name="fecha">
        </div>
        <hr>
        <table >
            <tr class="tableheads fw-bold" >
                <td class="d">ID</td><td class="">Descripción</td><td>Cantidad a procesar</td><td>Cantidad Stock</td>
            </tr>
            <tr>
                <td><input type="text" class="inp" id="item" name="item"></td>
                <td class="t" id="d_item"></td>
                <td><input type="text" name="cantidad" id="cantidad" class="inp" onchange="cargaItem();"></td>
                <td><input type="text" class="inp" id="c" name="cantidadStock" readonly></td>
            </tr>
            
            <tr class="tableheads  fw-bold">
                <td class="d">ID</td><td>Genera</td><td>Costo por hora/kg</td><td>Costo por proceso</td>
            </tr>
            <tr>
                <td><input type="text" id="id2" class="inp" name="nextId" readonly></td>
                <td id="d_item2" class="t"></td>
                <td><input type="text" id="costo" name="costo" class="inp" readonly></td>
                <td><input type="text" id="costoTotal" name="costoTotal" class="inp" readonly></td>
            </tr>
            <tr class="tableheads  fw-bold">
                    
                <td colspan="1">Resultante: </td>
                <td colspan="1">Horas trabajadas</td>
                <td colspan="2">Proceso realizado: </td>
                
            </tr>
            <tr>
                <td colspan="1" class="fw-bold"><input type="text" id="cantidadTotal" name="cantidadTotal" class="inp"> kg</td>
                <td colspan="1"><input type="text" id="horas" name="horas" class="inp" readonly></td>
                <td colspan="2" id="proceso" class="t"></td>
                <input type="hidden" name="idProceso" id="idProceso">
            </tr>
        </table>
      <div class="modal-footer">
          <button type="button" id="closeModal2" class="cancel" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="registrar" value="Registrar">
      </div>
    </div>
  </div>
</div>


<footer>
<img src="../../img/bg.png" alt="" width="20%">
</footer>


<script>
$(document).ready(function() {
    $("#modal").show();
    $("#modal").draggable();
});
$("#closeModal").click(function(){
    $("#modal").hide();
})
$("#closeModal2").click(function(){
    $("#modal").hide();
})
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>