UNIDAD 4 - GESTIÓN DE BASES DE DATOS CON PDO
Autor: Ángel
Ciclo: 2º DAW
Asignatura: Desarrollo Web en Entorno Servidor

---

🔹 ACTIVIDAD 1: Conexión con PDO
- Conecta a la base de datos 'empresa' usando variables de configuración en config.php.
- Usa try/catch para capturar errores.
- Configura el modo de errores con PDO::ERRMODE_EXCEPTION.

🔹 ACTIVIDAD 2: Listado de empleados
- Consulta SELECT * FROM empleados.
- Muestra los resultados en una tabla HTML.
- Muestra un mensaje si no hay registros.

🔹 ACTIVIDAD 3: Búsqueda segura
- Formulario para buscar empleados por nombre.
- Usa consultas preparadas con LIKE :nombre y bindParam() para evitar inyecciones SQL.

🔹 ACTIVIDAD 4: Registro de usuarios
- Formulario para registrar usuario (nombre_usuario, email, password).
- Usa password_hash() para cifrar la contraseña.
- Usa prepare() y bindValue() para insertar datos.
- Comprueba duplicados de email.

🔹 ACTIVIDAD 5: CRUD de empleados
- Lista empleados con opciones Editar y Eliminar.
- Edita mediante formulario (UPDATE preparado).
- Elimina con confirmación (DELETE preparado).
- Maneja excepciones con try/catch.

🔹 ACTIVIDAD 6: Gestor de Usuarios Seguros
- Registro con password_hash().
- Login con password_verify() y uso de sesiones.
- Listado de usuarios solo si hay sesión activa.
- Editar/eliminar usuarios (consultas preparadas).
- Protección de páginas privadas mediante sesión.
- Validación básica de formularios.
- Limpieza de código y comentarios incluidos.

---

📘 MEDIDAS DE SEGURIDAD APLICADAS:
- Uso de consultas preparadas (PDO).
- Escapado de salida con htmlspecialchars().
- Hash y verificación de contraseñas (password_hash(), password_verify()).
- Manejo de excepciones con try/catch.
- Validación básica de formularios.
- Protección de páginas privadas con sesiones.