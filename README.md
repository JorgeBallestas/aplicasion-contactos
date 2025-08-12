Sistema de Gestión de Contactos PHP
<div align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
</div>
Descripción del Proyecto
Una aplicación web completa desarrollada en PHP que permite a los usuarios registrarse, autenticarse y gestionar sus contactos personales de manera segura. El sistema implementa un patrón de desarrollo modular con operaciones CRUD completas, autenticación por sesiones y conexión robusta a base de datos MySQL mediante PDO.
Este proyecto fue desarrollado como parte del aprendizaje en Análisis y Desarrollo de Software, implementando las mejores prácticas de desarrollo web y seguridad en PHP.
Funcionalidades Principales
Gestión de Usuarios

Registro de nuevos usuarios con validación de datos
Sistema de autenticación seguro con inicio de sesión
Cierre de sesión con destrucción de sesiones
Validación de credenciales y control de acceso

Gestión de Contactos

Visualización de lista completa de contactos personales
Creación de nuevos contactos con información detallada
Edición de contactos existentes con validación de datos
Eliminación de contactos con confirmación previa
Organización automática de contactos por orden alfabético

Características de Seguridad

Protección contra vulnerabilidades comunes de desarrollo web
Validación exhaustiva de formularios del lado del servidor
Control de acceso basado en sesiones PHP
Sanitización completa de datos de entrada
Manejo robusto de errores y excepciones

Estructura del Proyecto
contactos-app/
├── index.php           # Dashboard principal con lista de contactos
├── login.php           # Sistema de autenticación de usuarios
├── registro.php        # Formulario de registro de nuevos usuarios
├── procesar.php        # Procesamiento del registro de usuarios
├── agregar.php         # Formulario para crear nuevos contactos
├── editar.php          # Formulario de edición de contactos existentes
├── eliminar.php        # Confirmación y eliminación de contactos
├── data-base.sql       # Script SQL para creación de base de datos
└── includes/
    ├── database.php    # Configuración de conexión PDO a MySQL
    └── funciones.php   # Lógica de negocio y operaciones CRUD
Requisitos del Sistema
Requisitos Mínimos

PHP: Versión 7.4 o superior
MySQL: Versión 5.7+ o MariaDB 10.3+
Servidor Web: Apache 2.4+ o Nginx 1.18+
Memoria RAM: Mínimo 512 MB
Espacio en Disco: 50 MB disponibles

Extensiones PHP Requeridas

PDO MySQL (php-pdo-mysql)
Session (php-session)
Hash (php-hash)
Filter (php-filter)
PCRE (php-pcre)

Entornos de Desarrollo Compatibles

XAMPP 8.0 o superior (Multiplataforma)
WAMP Server 3.2+ (Windows)
MAMP 6.0+ (macOS)
LAMP Stack (Linux)
Laragon (Windows)

Instalación y Configuración
Paso 1: Obtener el Código Fuente
Opción A: Clonar desde Git
bashgit clone https://github.com/tu-usuario/contactos-php.git
cd contactos-php
Opción B: Descarga Directa

Descargar archivo ZIP desde GitHub
Extraer en la carpeta del servidor web
Renombrar la carpeta a contactos-app

Paso 2: Configuración del Servidor Local
Para XAMPP:

Iniciar el Panel de Control de XAMPP
Activar módulos Apache y MySQL
Copiar archivos a: C:/xampp/htdocs/contactos-app/

Para WAMP:

Iniciar WAMP Server
Verificar que esté en estado "verde"
Copiar archivos a: C:/wamp64/www/contactos-app/

Para MAMP:

Iniciar MAMP
Configurar puertos si es necesario
Copiar archivos a: /Applications/MAMP/htdocs/contactos-app/

Paso 3: Configuración de la Base de Datos
Creación Automática:

Acceder a phpMyAdmin: http://localhost/phpmyadmin
Crear nueva base de datos llamada contactos
Importar el archivo data-base.sql desde la pestaña "Importar"

Creación Manual:
sqlCREATE DATABASE contactos CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
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
Paso 4: Configuración de Conexión
Editar el archivo includes/database.php:
php<?php
$servidor = "localhost";      // Dirección del servidor MySQL
$base_datos = "contactos";    // Nombre de la base de datos
$usuario = "root";            // Usuario MySQL (por defecto en XAMPP)
$password = "";               // Contraseña MySQL (vacía por defecto)
?>
Paso 5: Verificación de Instalación

Abrir navegador web
Navegar a: http://localhost/contactos-app/
Debería mostrar la página de inicio de sesión
Si aparecen errores, verificar logs de Apache y MySQL

Guía de Uso de la Aplicación
Registro de Nuevo Usuario

Acceder a http://localhost/contactos-app/registro.php
Completar formulario con:

Nombre completo
Dirección de correo electrónico válida
Contraseña segura (mínimo 6 caracteres)


Hacer clic en "Registrarse"
Será redirigido automáticamente al login

Inicio de Sesión

Ingresar en http://localhost/contactos-app/login.php
Usar credenciales creadas en el registro
Sistema validará automáticamente las credenciales
Acceso al dashboard principal tras autenticación exitosa

Gestión de Contactos
Agregar Contactos:

Desde el dashboard, hacer clic en "Nuevo Contacto"
Completar información requerida:

Nombre del contacto
Número telefónico
Dirección de correo electrónico


Guardar cambios

Editar Contactos:

Localizar contacto en la lista principal
Hacer clic en enlace "Editar"
Modificar información necesaria
Guardar cambios actualizados

Eliminar Contactos:

Hacer clic en "Eliminar" junto al contacto deseado
Confirmar eliminación en pantalla de confirmación
El contacto será eliminado permanentemente

Cierre de Sesión

Hacer clic en "Cerrar Sesión" desde cualquier página
La sesión se destruirá automáticamente
Redireccionamiento automático al login

Funciones Principales del Sistema
Funciones de Autenticación
phpcrearUsuario($nombre, $correo, $password)    // Registro de nuevos usuarios
validarUsuario($correo, $password)           // Validación de credenciales de login
Funciones CRUD de Contactos
phpobtenerContactos($usuario_id)                // Obtener todos los contactos de un usuario
crearContacto($usuario_id, $nombre, $telefono, $email)  // Crear nuevo contacto
actualizarContacto($id, $nombre, $telefono, $email)     // Actualizar contacto existente
eliminarContacto($id)                        // Eliminar contacto por ID
obtenerContacto($id)                         // Obtener contacto específico
Características Técnicas Implementadas

Conexión PDO: Conexión robusta y segura a MySQL
Consultas Preparadas: Prevención de inyección SQL
Gestión de Sesiones: Control de autenticación y autorización
Validación de Datos: Sanitización completa de entrada de usuario
Manejo de Errores: Try-catch comprehensivo con logging
Arquitectura Modular: Separación clara de responsabilidades

Estructura de Base de Datos
Tabla: usuarios
CampoTipoDescripciónidINT AUTO_INCREMENTIdentificador único del usuarionombreVARCHAR(100)Nombre completo del usuarioemailVARCHAR(100) UNIQUECorreo electrónico únicopasswordVARCHAR(255)Contraseña cifrada con hashfecha_creacionTIMESTAMPFecha y hora de registro
Tabla: contactos
CampoTipoDescripciónidINT AUTO_INCREMENTIdentificador único del contactousuario_idINTReferencia al usuario propietarionombreVARCHAR(100)Nombre del contactotelefonoVARCHAR(20)Número telefónicoemailVARCHAR(100)Correo electrónico del contactofecha_creacionTIMESTAMPFecha y hora de creación
Relaciones de Base de Datos

Relación 1:N entre usuarios y contactos
Clave Foránea: contactos.usuario_id → usuarios.id
Eliminación en Cascada: Al eliminar usuario, se eliminan sus contactos
Integridad Referencial: Garantizada por MySQL

Estado del Proyecto
Versión Actual: 1.0.0
Estado: Proyecto completado y funcional para producción
Funcionalidades Implementadas

 Sistema completo de autenticación de usuarios
 Operaciones CRUD completas para contactos
 Validación robusta de formularios
 Interfaz de usuario intuitiva y responsive
 Seguridad implementada contra vulnerabilidades comunes
 Manejo profesional de errores y excepciones
 Documentación completa del código
 Base de datos normalizada y optimizada

Pruebas Realizadas

 Pruebas unitarias de funciones CRUD
 Pruebas de seguridad contra inyección SQL
 Pruebas de validación de formularios
 Pruebas de sesiones y autenticación
 Pruebas de compatibilidad en diferentes navegadores
 Pruebas de rendimiento con múltiples usuarios

Mejoras Futuras Planificadas

 Implementación de búsqueda avanzada de contactos
 Sistema de categorías para organizar contactos
 Funcionalidad de importación/exportación (CSV, vCard)
 API RESTful para integración con aplicaciones móviles
 Panel de administración avanzado
 Sistema de backup automático
 Integración con servicios de email
 Implementación de dos factores de autenticación (2FA)

Tecnologías Utilizadas
Backend

PHP 8.0+: Lenguaje de programación principal
MySQL 8.0: Sistema de gestión de base de datos relacional
PDO: Capa de abstracción de base de datos

Frontend

HTML5: Estructura semántica de páginas web
CSS3: Estilos y diseño responsive
JavaScript: Interactividad del lado del cliente

Herramientas de Desarrollo

XAMPP: Entorno de desarrollo local
phpMyAdmin: Administración de base de datos
Visual Studio Code: Editor de código
Git: Control de versiones

Consideraciones de Seguridad
Medidas Implementadas

Cifrado de contraseñas mediante algoritmo bcrypt
Consultas preparadas para prevenir inyección SQL
Validación y sanitización de todos los datos de entrada
Control de sesiones con tokens seguros
Verificación de permisos en cada operación
Escape de caracteres especiales en salida HTML
Configuración segura de headers HTTP

Recomendaciones para Producción

Configurar HTTPS con certificado SSL válido
Implementar rate limiting para prevenir ataques de fuerza bruta
Configurar logs de seguridad y monitoreo
Actualizar regularmente PHP y MySQL
Implementar backup automático de base de datos
Configurar firewall de aplicaciones web (WAF)

Soporte y Contacto
Información del Autor
Jorge Alberto Ballestas Morales
Estudiante de Análisis y Desarrollo de Software
SENA - Servicio Nacional de Aprendizaje
Colombia
## Contacto
- ** Correo Electrónico:** [ballestasjorge66@gmail.com]

Documentación PHP
Documentación MySQL
Guía PDO
Mejores Prácticas PHP

Reportar Issues
Si encuentras algún problema o tienes sugerencias:

Revisa la documentación existente
Busca en issues existentes del repositorio
Crea un nuevo issue con descripción detallada
Incluye información del entorno y pasos para reproducir

Licencia
Este proyecto está disponible bajo la Licencia MIT, permitiendo:

Uso comercial y personal
Modificación del código fuente
Distribución del software
Uso privado

Condiciones

Incluir aviso de copyright original
Incluir texto de la licencia MIT
No se otorga garantía del software

Nota: Este proyecto fue desarrollado con fines educativos y de aprendizaje en el marco del programa de Análisis y Desarrollo de Software del SENA.
