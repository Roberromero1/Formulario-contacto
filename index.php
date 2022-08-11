<?php

//Comprobamos si formulario se envio. Si esta seteado el usuario envio los datos por post

$errores = '';
$enviado = '';

if (isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    //Confirmamos si tiene algo de contenido
    if(!empty($nombre)){
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING); //Nos permite sanear informacoin, eliminar caracteres que no sirven.
    } else {
        $errores .= 'Por favor ingresa un nombre <br />';
    }

    //Compruebo si una variable esta vacia
    if (!empty($correo)) {
       $correo = filter_var($correo, FILTER_SANITIZE_EMAIL); //Me guarda en variable correo el resultado de filter

       if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores .= 'Por favor ingresa un correo valido </br>';
       }
    } else {//Si usuario no pone correo mostramos otro error
        $errores .= 'Por favor ingresa un correo</br>';
    }

    //Compruebo el mensaje y elimino todos los caracteres
    if(!empty($mensaje)){
        $mensaje = htmlsepcialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores .= 'Por favor ingresa el mensaje <br />';
    }

    //Pregunto si no hay errores - todo esta correcto y envio correo
    if(!$errores){
        $enviar_a = 'robertoromero.dr@gmail.com';
        $asunto = 'Correo enviado desde miPagina.com';
        $mensaje_preparado = "De: $nombre \n";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje: " . $mensaje;

        //Envio msj con funcion mail (no funciona con xammp)
        //mail($enviar_a, $asunto, $mensaje);
        $enviado = 'true';
    }


}



require 'index.view.php';


?>