<!DOCTYPE html>
<html>
<head>
    <title>Registro - App de Contactos</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    
    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
    
    <br>
    <p>¿Ya tienes cuenta? <a href="login.php">Iniciar Sesion</a></p>
</body>
</html>