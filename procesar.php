<?php
session_start();
require "./includes/database.php";
require "./includes/funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    if (crearUsuario($nombre, $correo, $contraseña)) {
        $mensaje = "Usuario registrado correctamente";
    } else {
        $mensaje = "Error al registrar usuario";
    }
} else {
    $mensaje = "Acceso no válido";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro Procesado</title>
</head>
<body>
    <h1>Resultado del Registro</h1>
    <p><strong><?php echo $mensaje; ?></strong></p>
    
    <a href="login.php">Iniciar Sesion</a> | 
    <a href="registro.php">Registrar otro usuario</a>
</body>
</html>