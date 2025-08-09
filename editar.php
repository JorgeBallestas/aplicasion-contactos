<?php
session_start();
require "./includes/database.php";
require "./includes/funciones.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$mensaje = '';
$contacto = null;

if (isset($_GET['id'])) {
    $contacto = obtenerContacto($_GET['id']);
    if (!$contacto) {
        header("Location: index.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    
    if (actualizarContacto($id, $nombre, $telefono, $email)) {
        $mensaje = 'Contacto actualizado exitosamente';
        $contacto = obtenerContacto($id);
    } else {
        $mensaje = 'Error al actualizar el contacto';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    
    <?php if ($mensaje): ?>
        <p><strong><?php echo $mensaje; ?></strong></p>
    <?php endif; ?>
    
    <?php if ($contacto): ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($contacto['nombre']); ?>" required><br><br>
        
        <label for="telefono">Telefono:</label><br>
        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($contacto['telefono']); ?>" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contacto['email']); ?>" required><br><br>
        
        <button type="submit">Actualizar Contacto</button>
    </form>
    <?php endif; ?>
    
    <br>
    <a href="index.php">Volver a la lista</a>
</body>
</html>