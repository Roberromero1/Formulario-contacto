<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Contacto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="wrap">
        <!--Redirigimos al usuario a la pagina una vez que se envian los archivos-->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" class="form-control" id="nombre"name="nombre" placeholder="Nombre" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>">
        <!--Modificando el value logramos que el usuario si se equivoca no se borren los datos (si enviado es false y esta seteado el nombre escribe el nombre) -->

        <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php if(!$enviado && isset($correo)) echo $correo ?>">

        <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje"><?php if(!$enviado && isset($mensaje)) echo $mensaje ?></textarea>

        <!--Combinaciones la condicion de php con codigo html-->
        <?php if (!empty($errores)): ?>
            <div class="alert error">   
                <?php echo $errores; ?>
            </div>
        <?php elseif ($enviado):?> <!--Compruebo variable enviado-->
            <div class="alert success">   
                <p>Enviado Correctamente</p>
            </div>   
        <?php endif ?>

        <input type="submit" naem="submit" class="btn btn-primary" value="Enviar Correo">
    
        </form>
    </div>
    
</body>
</html>