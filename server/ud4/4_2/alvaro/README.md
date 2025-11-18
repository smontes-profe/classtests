# Proyecto UD4 - Acceso a Datos (Desarrollo Web Entorno Servidor)

**Autor:** [Aquí tu Nombre Completo]
**Módulo:** Desarrollo Web en Entorno Servidor (DAW)

---

## Descripción del Proyecto

Este repositorio contiene el proyecto entregable para la **Unidad Didáctica 4 (UD4)**, correspondiente al Resultado de Aprendizaje 6 (RA6):

> **RA6.** Desarrolla aplicaciones web de acceso a almacenes de datos, aplicando medidas para mantener la seguridad y la integridad de la información.

El proyecto consiste en una serie de actividades progresivas que demuestran la conexión a bases de datos MySQL desde PHP usando la extensión **PDO**.

## 📂 Estructura del Proyecto

El proyecto está dividido en 6 actividades, cada una en su propia carpeta, demostrando una progresión en la complejidad:

- **`actividad1/`**: Conexión básica con PDO, configuración en `config.php` y manejo de errores con `try/catch`.
- **`actividad2/`**: Consulta (`SELECT`) y muestra de datos de la BBDD en una tabla HTML.
- **`actividad3/`**: Búsqueda segura (`SELECT ... WHERE ... LIKE`) utilizando consultas preparadas para prevenir inyección SQL.
- **`actividad4/`**: Inserción (`INSERT`) segura de nuevos usuarios, incluyendo el cifrado de contraseñas.
- **`actividad5/`**: Implementación de un CRUD (Create, Read, Update, Delete) completo sobre la tabla `empleados`.
- **`actividad6/`**: Proyecto final: "Gestor de Usuarios Seguros". Una mini-aplicación que integra todo lo aprendido, incluyendo un sistema de registro, login y gestión de usuarios protegido por sesiones.

---

## 🔒 Medidas de Seguridad Aplicadas (RA6)

Para cumplir con los requisitos del RA6, se han implementado las siguientes medidas de seguridad en todo el proyecto:

1.  **Prevención de Inyección SQL (Criterios a, c, e)**

    - Se han utilizado **Consultas Preparadas (Prepared Statements)** en _todas_ las operaciones (SELECT, INSERT, UPDATE, DELETE) que involucran datos provenientes del usuario (formularios o URL).
    - Se utiliza `bindParam()` y `bindValue()` (o el paso de un array al `execute()`) para separar por completo el código SQL de los datos, neutralizando el riesgo de Inyección SQL.

2.  **Gestión Segura de Contraseñas (Criterios f, g)**

    - Las contraseñas de los usuarios **nunca** se almacenan en texto plano. Se utiliza la función `password_hash()` de PHP para crear un _hash_ seguro (algoritmo `PASSWORD_DEFAULT`, actualmente bcrypt) que incluye un _salt_ aleatorio automático.
    - La validación de contraseñas en el `login.php` se realiza _exclusivamente_ con `password_verify()`. Esta es la única función segura para comparar un _hash_ guardado con la contraseña introducida por el usuario.

3.  **Protección de Páginas y Gestión de Sesiones (Criterios d, g)**

    - En la Actividad 6, las páginas privadas (como `dashboard.php`, `editar_usuario.php`) están protegidas.
    - Se utiliza `session_start()` al inicio y se comprueba la existencia de una variable de sesión (ej: `$_SESSION['usuario_id']`).
    - Si el usuario no está autenticado, es redirigido automáticamente a la página de `login.php`.
    - Se proporciona un script `logout.php` que destruye la sesión de forma segura.

4.  **Prevención de Cross-Site Scripting (XSS) (Buenas Prácticas)**
    - Toda la información que se imprime en el HTML (tanto la que viene de la BBDD como la que el usuario introduce en formularios "sticky") se escapa usando la función `htmlspecialchars()` para prevenir ataques XSS.

## ⚙️ Configuración y Puesta en Marcha

1.  **Servidor:** El proyecto está diseñado para XAMPP (Apache + MariaDB).
2.  **Base de Datos:** Crear una BBDD llamada `empresa` (con cotejamiento `utf8mb4_unicode_ci`).
3.  **Tablas:** Los scripts `CREATE TABLE` para `empleados` (Act 2) y `usuarios` (Act 4) se encuentran en las instrucciones de dichas actividades.
4.  **Configuración:** Cada carpeta de actividad contiene un archivo `config.php` donde se deben especificar las credenciales de la BBDD (por defecto: `root` y contraseña vacía).
