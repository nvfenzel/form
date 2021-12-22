<?php 

$errores = '';
$enviado = '';

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }else {
        $errores .= 'Por favor ingresa un nombre <br/>';
    }

    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores .= 'Por favor ingresa un correo válido<br/>';
        };
    }else {
        $errores .= 'Por favor ingresa un correo<br/>';
        
    }

    if (!empty($mensaje)) {
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripcslashes($mensaje);
    }else {
        $errores .= 'Por favor ingresa un mensaje<br/>';
    }

    if (!$errores) {
    $enviar_a = 'nicov704@gmail.com';
    $asunto = 'Formulario';
    $mensaje_form = "De: $nombre \n";
    $mensaje_form .= "Correo: $correo \n";
    $mensaje_form .= "Mensaje: " . $mensaje ;

    mail($enviar_a, $asunto, $mensaje_form);

    $enviado = 'true';

    }
}

require 'index.php';

?>