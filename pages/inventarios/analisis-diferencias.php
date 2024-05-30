<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Diferencias</title>
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
    <link rel="stylesheet" href="../../css/a-inv.css">
    <style>
        td{
            font-weight: bolder;
        }
        
        .agregar{
            padding: 10px 19px;
            border: 2px solid #72CA5F;
            border-radius: 0px 10px 0px 10px;
            background-color: white;
            color: #72CA5F;
            font-weight: bolder;
            transition: ease-out 0.5s;

        }
        .agregar:hover{
            color: white;
            background-color: white;
            box-shadow: inset 0 -100px 0 0 #72CA5F;
        }
    </style>

</head>
<body>
    <?php
        require "../php/db.php";
        require("inventarios/busca.php");
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





<div class="container mt-5 bg-white p-5">

    <div class="row text-center">
        <div class="col">
            <form action="inventarios/filtra.php">
                <label class="fw-bold" for="">Busqueda por fecha: </label><input class="p-1 m-2" type="date" id="inputFiltro" name="inputFiltro" >
                <input type="submit" class="agregar" value = "Buscar">
            </form>
        </div>
    </div>
    <div class="row">
        <main class="p-1">
        <br><hr>
            <div class="table-responsive overflow-x-hidden">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th class="text-center">Id Inventario</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Detalles</th>
                    </tr>
                    </thead>
                    <tbody id="datos">
                        <?php
                            if(isset($_COOKIE['value'])){
                                $m = $_COOKIE['value'];
                                $inv->inventariosByFecha($conn,$m);
                            } else {
                                $td = $inv->muestraInventarios($conn);
                            }                            
                        ?>
                    </tbody>
                </table>
            </div>  
        </main>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




<footer>
<img src="../../img/bg.png" alt="" width="20%">
</footer>



<script>
$(document).ready(function() {
    $("#usuarios").draggable();
    $("#form").draggable();
    $("#ad").draggable();
});
function cierra(){
    $("#ad").hide();
}
$("#danger").click(function(e){
    e.preventDefault();
    
    // Obtener el ID del registro desde el atributo data-id
    var recordId = $(this).data("id");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            }).then(() => {
                // Redirigir a elimina.php con el ID del registro
                window.location.href = "inventarios/elimina.php?id=" + recordId;
            });
        }
    });
});

</script>
</body>
</html>