# Sistema de Gestión de Contactos PHP
Sistema de Gestión de Contactos PHP es una aplicación web completa desarrollada con PHP, MySQL y tecnologías web modernas con el objetivo de proporcionar una solución integral para la gestión de contactos personales con autenticación de usuarios y operaciones CRUD seguras.
Vista del Dashboard Principal
El sistema cuenta con un dashboard intuitivo que muestra todos los contactos del usuario autenticado, permitiendo realizar operaciones de edición y eliminación de forma sencilla.
**Formulario de Registro**
Interfaz limpia y funcional para el registro de nuevos usuarios con validación de datos y contraseñas.
**Gestión de Contactos**
Sistema completo para agregar, editar y eliminar contactos con formularios validados y confirmaciones de seguridad.
**Descripción del Proyecto**
El proyecto consiste en el desarrollo de una aplicación web que permite a los usuarios registrarse, autenticarse y gestionar sus contactos personales de manera segura. Esta aplicación ofrece 
un sistema completo de gestión con autenticación por sesiones, validación de datos y todas las operaciones CRUD necesarias para administrar contactos.

# Actualmente incluye:
Sistema de registro y login de usuarios (registro.php, login.php)
Dashboard principal con lista de contactos (index.php)
Formularios para agregar y editar contactos (agregar.php, editar.php)
Sistema de confirmación para eliminar contactos (eliminar.php)
Procesamiento seguro de datos (procesar.php)
Funciones CRUD organizadas (includes/funciones.php)
Configuración de base de datos (includes/database.php)
Script SQL para creación de base de datos (data-base.sql)

# Tecnologías Utilizadas
PHP 7.4+
MySQL 8.0
HTML5
CSS3
PDO (PHP Data Objects)
Sessions PHP
Git & GitHub

# Estructura de Carpetas
**contactos-app/**
│
├── index.php              # Dashboard principal con lista de contactos
├── login.php              # Sistema de autenticación
├── registro.php           # Formulario de registro de usuarios
├── procesar.php           # Procesamiento del registro
├── agregar.php            # Formulario para crear contactos
├── editar.php             # Formulario de edición de contactos
├── eliminar.php           # Confirmación de eliminación
├── data-base.sql          # Script de creación de base de datos
├── includes/
│   ├── database.php       # Configuración de conexión PDO
│   └── funciones.php      # Funciones CRUD y lógica de negocio
└── README.md              # Este archivo

# Funcionalidades Principales
**Gestión de Usuarios** 
Registro de nuevos usuarios con validación
Sistema de login seguro con sesiones PHP
Cifrado de contraseñas con algoritmos seguros
Control de acceso y autenticación.
**Gestión de Contactos**
Visualización de todos los contactos del usuario
Creación de nuevos contactos con validación
Edición de contactos existentes
Eliminación con confirmación previa
Organización alfabética automática.
**Seguridad Implementada**
Validación de formularios del lado del servidor
Sanitización de datos de entrada
Control de sesiones para autenticación
Manejo robusto de errores

# Requisitos del Sistema
Servidor web con PHP 7.4 o superior
MySQL 5.7 o MariaDB 10.2 o superior
Extensión PDO de PHP habilitada
Servidor local como XAMPP, WAMP o MAMP

# Instalación
Clona o descarga este repositorio
**link:** [] 
Coloca los archivos en la carpeta htdocs de tu servidor local
Inicia Apache y MySQL en tu servidor local
Crea una base de datos llamada "contactos" en phpMyAdmin
Ejecuta el script SQL contenido en data-base.sql
Configura las credenciales de base de datos en includes/database.php
Accede a http://localhost/contactos-app/ para comenzar

# Cómo Usar la Aplicación
**La aplicación puede ser utilizada siguiendo estos pasos:**
Registro: Accede a registro.php para crear una nueva cuenta
Login: Inicia sesión en login.php con tus credenciales
Dashboard: Visualiza y gestiona todos tus contactos desde index.php
Agregar: Crea nuevos contactos usando el formulario correspondiente
Editar: Modifica la información de contactos existentes
Eliminar: Elimina contactos con confirmación de seguridad
El sistema mantiene la sesión activa durante el uso y permite cerrar sesión de forma segura desde cualquier página.

# Base de Datos
**El sistema utiliza dos tablas principales:**

Tabla usuarios
id: Identificador único auto-incremental
nombre: Nombre completo del usuario
email: Correo electrónico único
password: Contraseña cifrada
fecha_creacion: Timestamp de registro

Tabla contactos
id: Identificador único auto-incremental
usuario_id: Referencia al usuario propietario
nombre: Nombre del contacto
telefono: Número telefónico
email: Correo electrónico del contacto
fecha_creacion: Timestamp de creación

# Estado del Proyecto
Proyecto completado con todas las funcionalidades CRUD implementadas y probadas. El sistema es funcional para entornos de desarrollo y cuenta con las características de seguridad necesarias para un entorno educativo.

# Autor
**Jorge Alberto Ballestas Morales**
Estudiante de Análisis y Desarrollo de Software - SENA

# Contacto
**Correo Electrónico:**[ballestasjorge66@gmail.com]
Si no das para instalar la aplicación te recomiendo que veas videos en YouTube
**link:** [https://www.youtube.com] 
