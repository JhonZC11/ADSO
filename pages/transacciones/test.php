<?php
require "../../php/db.php";
require "../../php/movimiento.php";
$numElementosPorPagina = 10;
$sqlTotal = "SELECT COUNT(*) AS total FROM movimientos";
$resultadoTotal = $conn->query($sqlTotal);
$total = $resultadoTotal->fetch_assoc()['total'];
$numPaginas = ceil($total / $numElementosPorPagina);

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$paginaActual = max(1, min($numPaginas, $paginaActual));

$indiceInicio = ($paginaActual - 1) * $numElementosPorPagina;
$consultaSQL = "SELECT * FROM movimientos LIMIT $indiceInicio, $numElementosPorPagina";
$resultadoConsulta = $conn->query($consultaSQL);
// Mostrar los datos obtenidos de la consulta
while ($a = $resultadoConsulta->fetch_row()) {
    echo 
        "<tr>
            <td>
                $a[1]
            </td>
            <td>
                $a[2]
            </td>
            <td>
                $a[3]
            </td>
            <td>
                $a[4]
            </td>
            <td>
                $a[14]
            </td>
            <td>
                $a[12]
            </td>
            <td>
                $a[13]
            </td>
            <td>
                $a[5]
            </td>
            <td>
                $a[6]
            </td>
            <td>
                $a[7]
            </td>
            <td>
                $a[15]
            </td>
        </tr>";
}

// Construir la paginación
echo '<div>';
for ($i = 1; $i <= $numPaginas; $i++) {
    echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
}
echo '</div>';
?>