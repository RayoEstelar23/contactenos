<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    
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
        echo "success"; // Envío exitoso
    } else {
        echo "error"; // Error en el envío
    }
} else {
    echo "error"; // Acceso directo al script
}
?>





</body>
</html>