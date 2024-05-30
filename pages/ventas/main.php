<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
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
    <link rel="stylesheet" href="../../css/sala-ventas.css">
   <style>
        .vT{
            margin-left: 350px;
        }
        .a{
            margin-left: 20px;
            text-decoration: none;
            padding: 9px 19px;
            border: 2px solid blue;
            border-radius: 0px 10px 0px 10px;
            font-size: 18px;
            position: absolute;
            left: 80%;
            top: 13%;
            transition: ease-out 0.5s;
        }
        .a:hover{
            color: white;
            background-color: blue;
            box-shadow: inset 0 -100px 0 0 blue;
        }
        .th {
            background-color: #dbf7d9;
            color: black;
        }
        .th>th{
            padding: 10px;
            
        }
   </style>
</head>
<body>
    <?php
        if(isset($_COOKIE['bien'])){
            $well = '';
            $well.= "<script>";
            $well.="$(document).ready(function(){
                Swal.fire({
                    title: 'Venta registrada',
                    text:  'Genial, venta realizada!',
                    icon: 'success'
                  });
            })";
            $well.="</script>";
            echo $well;
            setcookie("bien", "", time()-3600,"/");
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




<form action="inserta_factura.php" method="post">
    <table>
        <tr>
            <th colspan="5" class="mem"><hr><br>GUANABANA LTDA <br> NIT: 29849149 <br> Tel: 3117928284 <br> Correo: ceneida146@gmail.com <br> Dirección: Calle 13 # 1-57 <br>Ciudad: Toro - Valle del cauca <br><br><hr></th>
        </tr>
        <tr class="d">
            <td colspan="1">Cliente: </td><td colspan="1">
                <input type="text" name="cliente" id="cliente" required>
            </td>
            <td colspan="1" class="table-cell"><label for="" id="resultado">.</label></td>
            <td colspan="1">Número Factura: </td>
            <td colspan="1"><input type="text" name="n_factura" id="nf"></td>
        </tr>
        <tr>               
            <td colspan="2">Tipo de pago: </td>

        
            <td colspan="1">Fecha Factura: </td>
            <td colspan="1"><input type="date" name="f_factura" required id="ff"></td>


        </tr>
    </table>
    <br><br>
    <table class="table-items">
        <thead>
            <tr class="th">
                <th>Item</th><th>Descripción</th><th>Unidades Disponibles</th><th>Cantidad</th><th>Valor Unidad</th><th>Valor Total</th>
            </tr>
        </thead>
        <tbody id = "datos">
            <tr>
                <td class="d">
                    <input type="text" style="width:50px;" id="item" name="id_item" value="5" readonly>
                </td>
                <td class="table-desc-item">
                    <label for="" id="d_item"> Guanabana Bolsa x10kg</label>
                </td>
                <td class="u">
                    <input type="number" id="unidadesD" class="u" name="cantidadStock" readonly>
                </td>
                <td class="d">
                    <input type="text" style="width:50px;" id="cantidad" name="cant">
                </td>
                <td class="d">
                    <input type="text" style="width:80px;" id="v_kg"  name="v_kg" onchange="vTotal();">
                </td>
                <td class="d">
                    <input for="" id="v_total" class="inp" name="v_total" readonly> $
                </td>
            </tr>

        </tbody>
    </table>
    <br>
    <div class="buttons">
        <button class="cancel" id="close">Cancelar</button>
        <input type="submit" class="registrar" value="Registrar">
    </div>    
</form>


<footer>
<img src="../../img/bg.png" alt="" width="20%">
</footer>
<script src="../../js/ventas.js" refer></script>

</body>
</html>