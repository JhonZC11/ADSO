<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

</head>
<body>

    <form action="pages/php/validalogin.php" method="post">
        <hr><br>
        <h1>Iniciar Sesión</h1><br>
        <hr><br>

        <div class="user">
            <label for="">Usuario: </label>
            <input required type="text" name="user" placeholder="Ingrese el usuario"><br>
        </div>
        <br>
        <div class="pass">
            <label for="">Contraseña: </label>
            <input required type="password" name="pass" placeholder="Ingrese la contraseña" ><br>
        </div>

        <br><br><br><hr><br>
        <input type="submit" value="Ingresar">
        <br><br><hr>
    </form>




    <?php 
        session_start();
        if(isset($_SESSION['error'])){
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Datos errados o no estás registrado',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                });
            });
        </script>
    <?php 
    unset($_SESSION['error']);
    }
    ?>

</body>
</html>
