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
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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


<div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bar">
        <h5 class="modal-title fw-bold">Registra Inventario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="inventarios/inserta_inventario.php" method="post"><br>
        <label for="" class="fw-bold " >Estado:  Revisión</label><br><br>
        <label for="" class="fw-bold">Fecha: </label><input type="date" class="ms-3 fw-bold" name="d" id="" required>
        <label for="" class="fw-bold">Tipo: </label>
        <select name="t" id="" class="ms-3 fw-bold">
            <option value="Diario">Diario</option>
            <option value="Mensual">Semanal</option>
        </select>    
        
        <br><br>
        <table class="table">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th><th>DESCRIPCIÓN</th><th>CANTIDAD FISICA</th>
                </tr>
            </thead>
            <tbody class="fw-bold text-center">
                <tr>
                    <td>01</td><td>FRUTA</td><td><input type="text" name="1" class="inp" required></td>
                </tr>
                
                <tr>
                    <td>02</td><td>FRUTA SIN CASCARA</td><td><input type="text" name="2" class="inp" required></td>
                </tr>
                
                <tr>
                    <td>03</td><td>FRUTA SIN SEMILLA</td><td><input type="text" name="3" class="inp" required></td>
                </tr>
                
                <tr>
                    <td>04</td><td>FRUTA LIMPIA</td><td><input type="text" name="4" class="inp" required></td>
                </tr>
                
                <tr>
                    <td>05</td><td>FRUTA BOLSA X10KG</td><td><input type="text" name="5" class="inp" required></td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
          <button type="button" id="closeModal2" class="cancel" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="registrar" value="Registrar">
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<footer>
<img src="../../img/bg.png" alt="" width="20%">
</footer>

<script src="../../js/usuarios.js" refer></script>
<script src="../../js/general.js" refer></script>
<script>
$(document).ready(function() {
    $("#usuarios").draggable();
    $("#modal").draggable();
    $("#modal").show();
});
$("#closeModal").click(function(){
    $("#modal").hide();
})
$("#closeModal2").click(function(){
    $("#modal").hide();
})
</script>
</body>
</html>