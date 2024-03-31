<?php
require "../../php/db.php";
require "../../php/movimiento.php";
?>
<form action="procesar_formulario.php" method="post">
    <input type="checkbox" name="opciones[]" value="opcion1_unidad1"> Opción 1 (Unidad 1) <br>
    <input type="checkbox" name="opciones[]" value="opcion2_unidad2"> Opción 2 (Unidad 2) <br>
    <input type="checkbox" name="opciones[]" value="opcion3_unidad3"> Opción 3 (Unidad 3) <br>
    <input type="submit" value="Enviar">
</form>
