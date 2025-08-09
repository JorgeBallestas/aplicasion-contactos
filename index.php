<?php
session_start();
require "./includes/database.php";
require "./includes/funciones.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion'])) {
    if ($_POST['accion'] == 'logout') {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

$usuario_id = $_SESSION['usuario_id'];
$contactos = obtenerContactos($usuario_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>App de Contactos</title>
</head>
<body>
    <h1>App de Contactos</h1>
    <p>Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</p>
    
    <div>
        <a href="agregar.php">Nuevo Contacto</a> | 
        <form method="POST" style="display: inline;">
            <input type="hidden" name="accion" value="logout">
            <button type="submit">Cerrar Sesion</button>
        </form>
    </div>
    
    <h2>Lista de Contactos</h2>

    <?php if (empty($contactos)): ?>
        <p>No tienes contactos aun. <a href="agregar.php">Agregar el primero</a></p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Fecha Creacion</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($contactos as $contacto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contacto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($contacto['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($contacto['email']); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($contacto['fecha_creacion'])); ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $contacto['id']; ?>">Editar</a> |
                        <a href="eliminar.php?id=<?php echo $contacto['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>