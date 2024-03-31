<?php
if(isset($_POST['opciones']) && !empty($_POST['opciones'])) {
    // Si al menos un checkbox está marcado
    $opcionesSeleccionadas = $_POST['opciones'];
    
    // Iterar sobre las opciones seleccionadas
    foreach($opcionesSeleccionadas as $opcion) {
        // Dividir el valor del checkbox para obtener la opción y la unidad
        $opcionYUnidad = explode('_', $opcion);
        $opcionSeleccionada = $opcionYUnidad[0];
        $unidadSeleccionada = $opcionYUnidad[1];
        
        // Hacer algo con la opción y la unidad seleccionadas
        echo "La opción seleccionada es: $opcionSeleccionada y su unidad es: $unidadSeleccionada <br>";
    }
} else {
    // Si ningún checkbox está marcado
    echo "No se ha seleccionado ninguna opción.";
}
?>
