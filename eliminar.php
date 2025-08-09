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
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
    $id = $_POST['id'];
    
    if (eliminarContacto($id)) {
        header("Location: index.php");
        exit();
    } else {
        $mensaje = 'Error al eliminar el contacto';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Contacto</title>
</head>
<body>
    <h1>Eliminar Contacto</h1>
    
    <?php if ($mensaje): ?>
        <p><strong><?php echo $mensaje; ?></strong></p>
    <?php endif; ?>
    
    <?php if ($contacto): ?>
        <p>¿Estas seguro de que quieres eliminar este contacto?</p>
        
        <div>
            <h3><?php echo htmlspecialchars($contacto['nombre']); ?></h3>
            <p>Telefono: <?php echo htmlspecialchars($contacto['telefono']); ?></p>
            <p>Email: <?php echo htmlspecialchars($contacto['email']); ?></p>
        </div>
        
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
            <button type="submit" name="confirmar" value="1">Si, Eliminar</button>
        </form>
        
    <?php else: ?>
        <p>Contacto no encontrado</p>
    <?php endif; ?>
    
    <br>
    <a href="index.php">Cancelar</a>
</body>
</html>