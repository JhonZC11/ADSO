<?php 
session_destroy();
// Iterar sobre todas las cookies
foreach ($_COOKIE as $key => $value) {
    // Establecer cada cookie con un valor vacío y una fecha de expiración en el pasado
    setcookie($key, '', time() - 3600, '/');
}
header("Location: ../../index.php");