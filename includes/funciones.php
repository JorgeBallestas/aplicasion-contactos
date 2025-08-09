<?php
require_once 'database.php';

// Función para crear usuario
function crearUsuario($nombre, $correo, $password) {
    global $conexion;
    try {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $correo, $passwordHash]);
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

// Función para validar login
function validarUsuario($correo, $password) {
    global $conexion;
    try {
        $stmt = $conexion->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    } catch(PDOException $e) {
        return false;
    }
}

// Función para obtener contactos de un usuario
function obtenerContactos($usuario_id) {
    global $conexion;
    try {
        $stmt = $conexion->prepare("SELECT * FROM contactos WHERE usuario_id = ? ORDER BY nombre");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Función para crear contacto
function crearContacto($usuario_id, $nombre, $telefono, $email) {
    global $conexion;
    try {
        $stmt = $conexion->prepare("INSERT INTO contactos (usuario_id, nombre, telefono, email) VALUES (?, ?, ?, ?)");
        $stmt->execute([$usuario_id, $nombre, $telefono, $email]);
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

// Función para actualizar contacto
function actualizarContacto($id, $nombre, $telefono, $email) {
    global $conexion;
    try {
        $stmt = $conexion->prepare("UPDATE contactos SET nombre = ?, telefono = ?, email = ? WHERE id = ?");
        $stmt->execute([$nombre, $telefono, $email, $id]);
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

// Función para eliminar contacto
function eliminarContacto($id) {
    global $conexion;
    try {
        $stmt = $conexion->prepare("DELETE FROM contactos WHERE id = ?");
        $stmt->execute([$id]);
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

// Función para obtener un contacto específico
function obtenerContacto($id) {
    global $conexion;
    try {
        $stmt = $conexion->prepare("SELECT * FROM contactos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return false;
    }
}
?>