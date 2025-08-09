# Sistema de Registro y Gestión de Contactos en PHP

Este proyecto es una aplicación web completa que permite registrar usuarios y gestionar contactos personales. Implementa un sistema CRUD completo con autenticación de usuarios, conexión segura a base de datos MySQL utilizando PDO, y todas las operaciones básicas para administrar contactos.

## Funcionalidades

- Registro de nuevos usuarios con contraseñas encriptadas
- Sistema de login y logout con sesiones PHP
- Gestión completa de contactos (Crear, Leer, Actualizar, Eliminar)
- Autenticación de usuarios y control de acceso
- Validación de formularios y manejo de errores
- Interfaz simple y funcional sin dependencias externas

## Estructura del Proyecto

```
/contactos-app
├── index.php           # Página principal con lista de contactos
├── login.php           # Formulario de inicio de sesión
├── registro.php        # Formulario de registro de usuarios
├── procesar.php        # Procesa el registro de nuevos usuarios
├── agregar.php         # Formulario para crear nuevos contactos
├── editar.php          # Formulario para editar contactos existentes
├── eliminar.php        # Confirmación y eliminación de contactos
└── includes/
    ├── database.php    # Configuración de conexión a la base de datos
    └── funciones.php   # Funciones CRUD y lógica de negocio
```

## Requisitos del Sistema

- Servidor web con PHP 7.0 o superior
- MySQL 5.7 o MariaDB 10.2 o superior
- Extensión PDO de PHP habilitada
- Servidor local como XAMPP, WAMP o MAMP (para desarrollo)

## Instalación y Configuración

1. Clona o descarga este repositorio
2. Coloca los archivos en la carpeta htdocs de tu servidor local
3. Inicia Apache y MySQL en tu servidor local
4. Accede a phpMyAdmin en http://localhost/phpmyadmin
5. Crea una nueva base de datos llamada "contactos"
6. Ejecuta el siguiente script SQL:

```sql
CREATE DATABASE contactos;
USE contactos;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
```

7. Configura la conexión en includes/database.php con tus credenciales:
   - Servidor: localhost
   - Base de datos: contactos
   - Usuario: root
   - Contraseña: (vacía por defecto en XAMPP)

## Uso de la Aplicación

1. Accede a http://localhost/contactos-app/registro.php
2. Registra un nuevo usuario con nombre, correo y contraseña
3. Inicia sesión en http://localhost/contactos-app/login.php
4. Una vez autenticado, podrás:
   - Ver la lista de todos tus contactos
   - Agregar nuevos contactos
   - Editar contactos existentes
   - Eliminar contactos
   - Cerrar sesión de forma segura

## Características Técnicas

- Contraseñas encriptadas con password_hash() de PHP
- Consultas preparadas para prevenir inyección SQL
- Sesiones PHP para control de autenticación
- Validación de formularios del lado del servidor
- Manejo de errores con try-catch
- Código organizado y modular
- Interfaz responsive sin frameworks externos

## Seguridad Implementada

- Encriptación de contraseñas con algoritmo bcrypt
- Consultas preparadas (prepared statements) con PDO
- Validación y sanitización de datos de entrada
- Control de sesiones para autenticación
- Verificación de permisos en cada página
- Protección contra acceso no autorizado

## Funciones Principales

- crearUsuario(): Registra nuevos usuarios en el sistema
- validarUsuario(): Autentica credenciales de login
- obtenerContactos(): Lista todos los contactos de un usuario
- crearContacto(): Agrega un nuevo contacto
- actualizarContacto(): Modifica datos de contactos existentes
- eliminarContacto(): Elimina contactos del sistema
- obtenerContacto(): Obtiene datos de un contacto específico

## Base de Datos

El sistema utiliza dos tablas principales:

**Tabla usuarios:**
- id: Clave primaria autoincremental
- nombre: Nombre completo del usuario
- email: Correo electrónico único
- password: Contraseña encriptada
- fecha_creacion: Timestamp de registro

**Tabla contactos:**
- id: Clave primaria autoincremental
- usuario_id: Referencia al usuario propietario
- nombre: Nombre del contacto
- telefono: Número telefónico
- email: Correo electrónico del contacto
- fecha_creacion: Timestamp de creación

## Estado del Desarrollo

Proyecto completado con todas las funcionalidades CRUD implementadas y probadas. El sistema es funcional para entornos de desarrollo y puede ser extendido con características adicionales como:

- Búsqueda y filtrado de contactos
- Importación/exportación de datos
- Categorización de contactos
- Validaciones adicionales del lado cliente
- Interfaz mejorada con CSS

## Autor

Jorge Alberto Ballestas Morales  
Estudiante de Análisis y Desarrollo de Software - SENA

## Licencia

Este proyecto es de código abierto y está disponible para uso educativo y de aprendizaje.