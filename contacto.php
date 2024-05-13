<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar y limpiar los datos del formulario
    $nombre = limpiarDatos($_POST['nombre']);
    $email = limpiarDatos($_POST['email']);
    $mensaje = limpiarDatos($_POST['mensaje']);
    
    // Verificar si los datos son válidos (puedes agregar validaciones adicionales aquí)
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        // Si falta algún dato, redirigir a la página de error
        header('Location: error.html');
        exit; // Salir del script para evitar que se ejecute más código
    }
    
    // Correo al que se enviará el formulario
    $destinatario = "abigail77flores@gmail.com";
    
    // Asunto del correo
    $asunto = "Mensaje de contacto de $nombre";
    
    // Contenido del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo Electrónico: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";
    
    // Cabeceras del correo
    $headers = "From: $email";

    // Envío del correo
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        // Si el correo se envió correctamente, redirigir a la página de agradecimiento
        header('Location: gracias.html');
    } else {
        // Si hubo un error al enviar el correo, redirigir a la página de error
        header('Location: error.html');
    }
} else {
    // Si se accede directamente a este script, redirigir a una página de error
    header('Location: error.html');
}

// Función para limpiar los datos del formulario
function limpiarDatos($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
?>
</body>
</html>