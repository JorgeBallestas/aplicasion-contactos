<?php
$servidor = "localhost";
$base_datos = "contactos";
$usuario = "root";
$password = "123456"; // Deja vacío si no tienes contraseña

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>