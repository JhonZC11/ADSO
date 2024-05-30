<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Movimientos</title>
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
    <link rel="stylesheet" href="../../css/movimientos.css">
   <style>
    .a{
        margin-left: 20px;
        text-decoration: none;
        padding: 10px 19px;
        border: 2px solid blue;
        border-radius: 0px 10px 0px 10px;
        font-size: 18px;
        position: relative;
        left: 0%;
        top: 7%;
        
        transition: ease-out 0.5s;
        background-color: white;
        color: gray;
        font-weight: bolder;
    }
    .a:hover{
        color: white;
        background-color: blue;
        box-shadow: inset 0 -100px 0 0 blue;
    }
   </style>

</head>
<body>
    
<?php 
    session_start();
    if(isset($_SESSION['Campos'])){
        $campos = $_SESSION['Campos'];
        ?>
        
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Hello!',
                    text: 'Bienvenido<?php echo $campos; ?>',
                    icon: 'info',
                    confirmButtonText: 'Cool'
                });
            });
        </script>
        <?php 
        session_destroy();
    } else if (isset($_SESSION["error_motivo"])){
        ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Motivo errado!',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                });
            });
        </script>
        <?php 
        session_destroy();
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



<div class="proveedores" id="form2">
    <div class="bar" id="">
        <div class="txt-m">Proveedores</div><div class="close"><button id="closeUsuarios" onclick="cierraForm2();" >X</button></div>
    </div>
    <table>
        <thead>
            <th>Nit</th><th>Nombre</th><th>Categoría</th>
        </thead>
        <tbody id="dato">

        </tbody>
    </table>
</div>


<div id="modalItems" class="lista-items w-25">
    <div class="bar" id="">
        <div class="txt-m">Lista Items</div><div class="close"><button id="closeUsuarios" onclick="cierraForm2();" >X</button></div>
    </div>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Item</th><th>Descripcion</th>
            </tr>
        </thead>
        <tbody id="tableBody">

        </tbody>
    </table>
</div>


<div class="modal modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Movimientos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="movimientos/o_movimientos.php" method="POST">
                    <!-- Datos principales -->
                    <div class="row pe-5">
                        <div class="col-6 text-center">
                            <label for="" class=" pt-2">Motivo: </label>
                            <select name="motivo" id="motivo" class="p-1 m-1 w-50 float-end">
                                <option value="">--Seleccione--</option>
                                <option value="EAC">EAC-Entrada Almacén</option>
                                <option value="FC">FC-Factura Compra</option>
                                <option value="DB">DB-Dar baja</option>
                            </select>
                        </div>
                        <div class="col-6 text-center">
                            <label for="" class=" pt-2">Número Factura</label><input type="number" name="n_factura"  id="numeroFactura" class="p-1 m-1 w-50 ms-5">
                        </div>
                    </div>
                    <div class="row pe-5">
                        <div class="col-4 text-center">
                            <label for="" class=" pt-2">Proveedor: </label><input type="text" id="inputProveedor" name="proveedor" class="p-1 m-1 w-50 float-end">
                        </div>
                        <div class="col-4 text-center">
                            <label for="" id="resultado" class=" pt-2">Sin proveedor aún</label>
                        </div>
                        <div class="col-4 text-center">
                            <label for="" class=" pt-2">Fecha Factura: </label><input type="date" id="fecha" name="f_factura" class="p-1 m-1 w-50 float-end" required>
                        </div>
                    </div>
                    <!-- Datos Items -->
                    <div class="row m-5 ps-3 text-center">
                        <div class="row p-1">
                            <div class="col border border-dark-subtle text-center p-2 h">
                                Item
                            </div>
                            <div class="col-4  border border-dark-subtle text-center p-2 h">
                                Descripcion
                            </div>
                            <div class="col  border border-dark-subtle text-center p-2 h">
                                Cantidad
                            </div>
                            <div class="col  border border-dark-subtle text-center p-2 h">
                                Valor U
                            </div>
                            <div class="col  border border-dark-subtle text-center p-2 h">
                                Valor Total
                            </div>
                        </div>
                        <div class="row p-1" id="filaInputs">                        
                                <div class="col border border-dark-subtle text-center">
                                    <input type="number" name="id_item" id="item" class="p-1 w-50 ms-4 m-2" required>
                                </div>
                                <div class="col-4 border border-dark-subtle">
                                    <label for="" id="d_item" class="p-1 w-25 m-2"></label>
                                </div>
                                <div class="col border border-dark-subtle text-center">
                                    <input type="number" name="cant" id="cant" class="p-1 w-50 m-2" required>
                                </div>
                                <div class="col border border-dark-subtle text-center">
                                    <input type="number" name="v_kg" id="v_kg" class="p-1 w-50 m-2">
                                </div>
                                <div class="col border border-dark-subtle text-center">
                                    <input type="number" name="" id="v_total" class="p-1 w-75 m-2" readonly>
                                </div>
                        </div>
                        <div class="row p-1" id="datos">

                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="" id="cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="agregar" id="registrar" >Registrar</button>
                    </div>
            </form>
        </div>
    </div>
</div>


<?php
    require("../php/db.php");
    require("movimientos/movimiento.php");
    $movimiento = new movimiento();
    $number = $movimiento->valorTotal($conn);
    if($number==null){
        $t=0;
    }else{
        $t = "$" . number_format($number, 0, '.'); 
    }
    
?>


<div class="container mt-5">
    <div class="row">
        <main class="p-5">

        <h1><strong> Transacciones <span class="vT">EAC y DB hasta ahora: <?php echo $t;?></strong></span></h1>
        <hr><br>
        <div class="row">
            <div class="col">
                <button type="button" id="abreModal" class="agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
                <a href="facturas.php" class="a">FC</a>
            </div>
        </div>


        <br><hr>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th class="text-center">N Movimiento</th>
                    <th class="text-center">N Factura</th>
                    <th class="text-center">F Factura</th>
                    <th class="text-center">F Registro</th>
                    <th class="text-center">Proveedor</th>
                    <th class="text-center">Motivo</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Valor kg</th>
                    <th class="text-center">Valor total</th>
                    <th class="text-center">Usuario</th>
                </tr>
                </thead>
                <?php
                    $movimiento->muestraMovimientos($conn);
                ?>
            </table>
        </div>  
        </main>
    </div>
</div>




<footer>
    <img src="../../img/bg.png" alt="" width="20%">
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="../../js/general.js" refer></script>

<script src="../../js/movimientos.js" refer></script> 

<script>
        $(document).ready(function(){
            $("#exampleModal").draggable();
        })
</script>

</body>
</html>