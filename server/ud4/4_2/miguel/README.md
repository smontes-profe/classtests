# Gestor de Usuarios Seguros (Proyecto PHP)

Este proyecto es una aplicación PHP diseñada para gestionar usuarios (CRUD) y demostrar la implementación de patrones de diseño de software modernos y medidas de seguridad esenciales en un entorno web.

La aplicación utiliza una arquitectura basada en clases y namespaces, cargados automáticamente mediante un autoloader (PSR-4), y centraliza la lógica de la base de datos para crear un código mantenible, seguro y desacoplado.

## Arquitectura y Patrones de Diseño

La aplicación sigue varios patrones de diseño clave para asegurar un código limpio y eficiente.

* **Autocarga (PSR-4):** El archivo `bootstrapAct6.php` implementa un autocargador `spl_autoload_register` que carga clases bajo los namespaces `Config`, `Database`, y `Core` desde el directorio `src/`. Esto elimina la necesidad de sentencias `require` manuales.

* **Inyección de Dependencias (DI):** Las dependencias no se crean internamente dentro de las clases que las necesitan.
    * La clase `Database\Connection` recibe la configuración (`$config`) en su constructor.
    * La clase `Database\QueryBuilder` recibe la conexión (`PDO`) en su constructor.

* **Patrón Singleton (vía Registro de Servicios):** La clase `Core\App` (introducida en la Actividad 6) utiliza un registro (`$registry`) estático para garantizar que los servicios clave (como la conexión `PDO`) se instancien **una sola vez**. En la primera llamada a `App::get('PDO')`, se crea la conexión; en todas las llamadas posteriores, se devuelve la instancia ya existente, evitando conexiones múltiples e ineficientes a la base de datos.

* **Contenedor de Dependencias (DI Container):** La clase `Core\App` también actúa como un contenedor de DI. Centraliza la lógica de *construcción* de objetos complejos (como `QueryBuilder`, que *depende* de `PDO`), desacoplando los controladores de la lógica de instanciación.

* **Query Builder (Patrón de Abstracción de Datos):** La clase `Database\QueryBuilder` abstrae toda la lógica de construcción y ejecución de SQL. Los controladores (ej. `login.php`, `index.php`) solicitan datos a través de métodos (`findByEmail`, `insert`, `update`) sin escribir SQL directamente.

* **Separación Controlador-Vista (Simplificado):** Los archivos en la raíz (ej. `login.php`, `index.php`) actúan como controladores. Manejan la lógica de la aplicación (peticiones POST/GET, validación de formularios) y luego incluyen el HTML (la vista) en el mismo archivo, separando el procesamiento de la presentación final.

## Medidas de Seguridad Aplicadas

La seguridad es un pilar central de esta aplicación, implementada a través de las siguientes medidas:

* **Prevención de Inyección SQL (Consultas Preparadas):** Toda la interacción con la base de datos se realiza a través de la clase `QueryBuilder`. Esta clase utiliza exclusivamente consultas preparadas de PDO (`prepare()`). Todos los datos variables del usuario se vinculan de forma segura usando `bindParam()` o `bindValue()`, neutralizando cualquier intento de inyección SQL.

* **Cifrado de Contraseñas (Hashing):** Las contraseñas de los usuarios nunca se almacenan en texto plano. En `register.php` y `edit_user.php`, se utiliza la función `password_hash()` de PHP con el algoritmo `PASSWORD_DEFAULT` (BCRYPT) antes de insertarlas o actualizarlas en la base de datos.

* **Verificación Segura de Contraseñas:** Durante el inicio de sesión (`login.php`), la contraseña proporcionada por el usuario se compara de forma segura con el hash almacenado usando `password_verify()`. Este método previene ataques de temporización.

* **Gestión de Sesiones y Autenticación:** Las páginas administrativas (`index.php`, `edit_user.php`) están protegidas. Incluyen `auth_check.php`, que verifica la existencia de `$_SESSION['user_id']`. Si la sesión no está activa, el usuario es redirigido al `login.php`. El cierre de sesión destruye la sesión de forma segura.

* **Variables de Entorno:** Las credenciales de la base de datos (usuario, contraseña, host) se almacenan en un archivo `.env` en la raíz del proyecto. La clase `Config\DatabaseAct6` carga estas variables, evitando que las credenciales estén expuestas en el código fuente de la aplicación.