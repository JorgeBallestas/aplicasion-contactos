<?php
session_start();
require "./includes/database.php";
require "./includes/funciones.php";

$error = '';

if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['contraseña'];
    
    $usuario = validarUsuario($correo, $password);
    
    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['correo'] = $correo;
        header("Location: index.php");
        exit();
    } else {
        $error = 'Credenciales incorrectas';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesion - App de Contactos</title>
</head>
<body>
    <h1>App de Contactos</h1>
    <h2>Iniciar Sesion</h2>
    
    <?php if ($error): ?>
        <p><strong>Error:</strong> <?php echo $error; ?></p>
    <?php endif; ?>
    
    <form method="POST">
        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>
        
        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        
        <button type="submit">Iniciar Sesion</button>
    </form>
    
    <br>
    <p>¿No tienes cuenta? <a href="registro.php">Registrarse</a></p>
</body>
</html>