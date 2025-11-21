# README: Proyecto de Conexión BBDD (Mauri)

Este proyecto es un recorrido por las 6 actividades de la unidad. El objetivo es demostrar cómo conectarse a MySQL con PHP (usando PDO) de forma segura y profesional.

## 🛡️ ¿Qué medidas de seguridad se han tomado?

El código no solo funciona, sino que está construido pensando en la seguridad primero. Estas son las medidas aplicadas:

### 1. A prueba de Inyección SQL (SQLi)

La prioridad número uno. [cite_start]**Ninguna** consulta que venga de datos del usuario (`$_POST` o `$_GET`) se concatena [cite: 284-285]. En su lugar:

* [cite_start]Se usan **sentencias preparadas** (`prepare()` y `execute()`) en el 100% de los casos (INSERT, UPDATE, DELETE, y SELECT con `WHERE`) [cite: 186, 286-289, 410]. Esto separa la consulta de los datos, haciendo imposible la inyección.

### 2. Gestión de Contraseñas (Nivel Pro)

[cite_start]Las contraseñas **jamás** se guardan en texto plano[cite: 540], ni siquiera con algoritmos obsoletos como MD5.

* [cite_start]**Al registrar:** Se usa `password_hash()` (con `PASSWORD_DEFAULT`) para crear un hash indescifrable [cite: 555-556, 561-563].
* [cite_start]**Al hacer login:** Se usa `password_verify()` para comprobar si la contraseña introducida coincide con el hash almacenado [cite: 574-576].

### 3. Sesiones seguras y páginas protegidas

En la Actividad 6, se implementó un sistema de autenticación robusto:

* **Protección de rutas**: Todos los archivos "privados" (como `usuarios.php` o `editar_usuario.php`) comprueban al inicio si el `$_SESSION['user_id']` existe. Si no, te redirige al `login.php`.
* **Prevención de *Session Fixation*:** En el login, se usa `session_regenerate_id(true)` para dar al usuario un ID de sesión nuevo y limpio, evitando que se pueda secuestrar la sesión.
* **Logout completo:** `salir.php` destruye la sesión (`session_destroy()`) para que no quede ningún rastro.

### 4. Confianza Cero (Validación y XSS)

No nos fiamos de nada que venga del exterior:

* **Validación en el *backend***: No solo se valida en el HTML. La validación *real* ocurre en el servidor (PHP). Se comprueba que los campos no estén vacíos, que el email tenga formato de email y (muy importante) que no haya duplicados en la BD (ej. email ya registrado).
* **Prevención de XSS:** Se usa `htmlspecialchars()` en **toda** la información que viene de la base de datos o del usuario antes de mostrarla en la página. Esto "neutraliza" cualquier intento de inyectar HTML o `<script>` malicioso.

### 5. Manejo de Errores controlado

Para evitar que se filtren detalles sensibles de la conexión o de las consultas si algo falla:

* [cite_start]Se configura PDO para que lance excepciones (`PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION`) [cite: 77, 81-82].
* [cite_start]Todas las operaciones con la base de datos están envueltas en bloques `try/catch` para capturar `PDOException` y mostrar un mensaje de error genérico (o registrarlo) sin "romper" la aplicación [cite: 71-72].