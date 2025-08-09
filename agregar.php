<?php
session_start();
require "./includes/database.php";
require "./includes/funciones.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    
    if (crearContacto($_SESSION['usuario_id'], $nombre, $telefono, $email)) {
        $mensaje = 'Contacto creado exitosamente';
    } else {
        $mensaje = 'Error al crear el contacto';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Contacto</title>
</head>
<body>
    <h1>Agregar Nuevo Contacto</h1>
    
    <?php if ($mensaje): ?>
        <p><strong><?php echo $mensaje; ?></strong></p>
    <?php endif; ?>
    
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="telefono">Telefono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <button type="submit">Guardar Contacto</button>
    </form>
    
    <br>
    <a href="index.php">Volver a la lista</a>
</body>
</html>