# API REST - Gestión de Empleados

Implementación de una API RESTful para la gestión de empleados utilizando PHP nativo, PDO y MySQL. El proyecto sigue principios de arquitectura limpia con separación de responsabilidades, inyección de dependencias y un sistema de enrutamiento personalizado.

## Tabla de Contenidos

- [Características](#características)
- [Requisitos del Sistema](#requisitos-del-sistema)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Arquitectura](#arquitectura)
- [Endpoints de la API](#endpoints-de-la-api)
- [Ejemplos de Uso](#ejemplos-de-uso)
- [Cliente Web](#cliente-web)
- [Patrones de Diseño](#patrones-de-diseño)

## Características

- API RESTful completa con operaciones CRUD
- Arquitectura basada en controladores y separación de capas
- Sistema de enrutamiento personalizado
- Contenedor de dependencias (DI Container)
- Autoloader PSR-4 personalizado
- Manejo de errores centralizado con códigos HTTP apropiados
- CORS configurado para desarrollo
- Cliente web con interfaz interactiva
- Consultas preparadas con PDO para prevenir SQL Injection
- Configuración mediante archivo .env

## Requisitos del Sistema

- PHP 8.0 o superior
- MySQL 5.7 o superior / MariaDB 10.3 o superior
- Servidor web (Apache/Nginx) o PHP built-in server
- Extensión PDO de PHP habilitada
- Extensión mysqli de PHP habilitada

## Instalación

### 1. Clonar o descargar el proyecto

```bash
cd /ruta/a/tu/servidor/web
```

### 2. Crear la base de datos

Ejecuta el siguiente script SQL en tu servidor MySQL:

```sql
CREATE DATABASE IF NOT EXISTS empresa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE empresa;

CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    puesto VARCHAR(100) NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

### 3. Configurar credenciales de base de datos

Edita el archivo `.env` en la raíz del proyecto:

```env
DB_DRIVER=mysql
DB_HOST=localhost
DB_PORT=3306
DB_NAME=empresa
DB_USER=root
DB_PASS=tu_contraseña

DB_CHARSET=utf8mb4
DB_TIMEOUT=10
DB_PERSISTENT=false
DB_EMULATE_PREPARES=false
```

### 4. Iniciar el servidor

**Opción A: Servidor incorporado de PHP**

```bash
cd public
php -S localhost:8000
```

La API estará disponible en: `http://localhost:8000/api.php`

**Opción B: XAMPP/MAMP/WAMP**

Coloca el proyecto en la carpeta `htdocs` y accede mediante:
`http://localhost/APIREST/public/api.php`

## Configuración

### Archivo .env

El proyecto utiliza un parser de archivos `.env` personalizado. Las configuraciones disponibles son:

| Variable | Descripción | Valor por defecto |
|----------|-------------|-------------------|
| `DB_DRIVER` | Driver de base de datos | `mysql` |
| `DB_HOST` | Hostname del servidor MySQL | `localhost` |
| `DB_PORT` | Puerto del servidor MySQL | `3306` |
| `DB_NAME` | Nombre de la base de datos | `empresa` |
| `DB_USER` | Usuario de MySQL | `root` |
| `DB_PASS` | Contraseña de MySQL | (vacío) |
| `DB_CHARSET` | Charset de la conexión | `utf8mb4` |

## Estructura del Proyecto

```
APIREST/
├── .env                          # Configuración de la base de datos
├── bootstrap.php                 # Autoloader PSR-4
├── public/                       # Directorio público (Document Root)
│   ├── api.php                   # Punto de entrada de la API
│   ├── index.html                # Cliente web
│   ├── css/
│   │   └── style.css             # Estilos del cliente
│   └── js/
│       ├── config.js             # Configuración del frontend
│       ├── index.js              # Lógica de listado y edición
│       ├── create.js             # Lógica de creación
│       └── utils.js              # Utilidades reutilizables
└── src/                          # Código fuente de la API
    ├── App/
    │   └── Database/
    │       └── ConnectionInterface.php
    ├── Config/
    │   └── Database.php          # Parser de .env
    ├── Controllers/
    │   └── EmpleadoController.php
    ├── Core/
    │   └── App.php               # Contenedor de dependencias
    ├── Database/
    │   ├── Connection.php        # Gestión de conexión PDO
    │   └── QueryBuilder.php      # Constructor de consultas
    └── Interfaces/
        ├── ReadableControllerInterface.php
        └── WritableControllerInterface.php
```

## Arquitectura

### Capas de la Aplicación

**1. Capa de Enrutamiento (`public/api.php`)**
- Punto de entrada único
- Gestión de CORS
- Enrutamiento por recurso y método HTTP
- Manejo centralizado de excepciones

**2. Capa de Controladores (`src/Controllers/`)**
- Lógica de negocio específica por recurso
- Validación de datos de entrada
- Gestión de respuestas HTTP
- Implementación de interfaces para consistencia

**3. Capa de Acceso a Datos (`src/Database/`)**
- `QueryBuilder`: Construcción dinámica de consultas SQL
- `Connection`: Gestión de la conexión PDO
- Uso de consultas preparadas

**4. Contenedor de Dependencias (`src/Core/App.php`)**
- Patrón Registry/Service Locator
- Lazy Loading de servicios
- Gestión centralizada de instancias

## Endpoints de la API

Base URL: `http://localhost:8000/api.php?recurso=empleados`

### Listar todos los empleados

```
GET /api.php?recurso=empleados
```

**Respuesta exitosa (200 OK):**

```json
[
  {
    "id": 1,
    "nombre": "Juan Pérez",
    "puesto": "Desarrollador Senior",
    "salario": "3500.00",
    "fecha_creacion": "2024-01-15 10:30:00",
    "fecha_actualizacion": "2024-01-15 10:30:00"
  }
]
```

### Crear un empleado

```
POST /api.php?recurso=empleados
Content-Type: application/json
```

**Body:**

```json
{
  "nombre": "María García",
  "puesto": "Analista de Datos",
  "salario": 2800.50
}
```

**Respuesta exitosa (201 Created):**

```json
{
  "status": "ok",
  "id": 2,
  "message": "Empleado creado correctamente"
}
```

### Actualizar un empleado

```
PUT /api.php?recurso=empleados&id=2
Content-Type: application/json
```

**Body:**

```json
{
  "nombre": "María García López",
  "puesto": "Senior Data Analyst",
  "salario": 3200.00
}
```

**Respuesta exitosa (200 OK):**

```json
{
  "status": "ok",
  "message": "Empleado actualizado"
}
```

### Eliminar un empleado

```
DELETE /api.php?recurso=empleados&id=2
```

**Respuesta exitosa (200 OK):**

```json
{
  "status": "ok",
  "message": "Empleado eliminado"
}
```

### Códigos de Error

| Código | Descripción |
|--------|-------------|
| 400 | Bad Request - Datos inválidos o faltantes |
| 404 | Not Found - Recurso no encontrado |
| 405 | Method Not Allowed - Método HTTP no soportado |
| 500 | Internal Server Error - Error del servidor |

**Formato de error:**

```json
{
  "status": "error",
  "code": 400,
  "message": "Faltan datos: nombre, puesto o salario son obligatorios."
}
```

## Ejemplos de Uso

### cURL

**Listar empleados:**

```bash
curl -X GET "http://localhost:8000/api.php?recurso=empleados"
```

**Crear empleado:**

```bash
curl -X POST "http://localhost:8000/api.php?recurso=empleados" \
  -H "Content-Type: application/json" \
  -d '{"nombre":"Pedro Sánchez","puesto":"DevOps Engineer","salario":3800.00}'
```

**Actualizar empleado:**

```bash
curl -X PUT "http://localhost:8000/api.php?recurso=empleados&id=1" \
  -H "Content-Type: application/json" \
  -d '{"nombre":"Pedro Sánchez Ruiz","puesto":"Senior DevOps","salario":4200.00}'
```

**Eliminar empleado:**

```bash
curl -X DELETE "http://localhost:8000/api.php?recurso=empleados&id=1"
```

### JavaScript (Fetch API)

```javascript
// Listar empleados
const response = await fetch('http://localhost:8000/api.php?recurso=empleados');
const empleados = await response.json();

// Crear empleado
const nuevoEmpleado = {
  nombre: 'Ana Martínez',
  puesto: 'Product Manager',
  salario: 4500.00
};

const response = await fetch('http://localhost:8000/api.php?recurso=empleados', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify(nuevoEmpleado)
});
const resultado = await response.json();
```

## Cliente Web

El proyecto incluye un cliente web interactivo en `public/index.html` con las siguientes características:

- Formulario para crear nuevos empleados
- Tabla editable con los empleados existentes
- Edición inline con guardado individual
- Eliminación con confirmación
- Feedback visual de operaciones
- Recarga manual de datos
- Manejo de errores con mensajes descriptivos

**Acceso:** `http://localhost:8000/index.html`

## Patrones de Diseño

### Dependency Injection Container

La clase `App` implementa un contenedor de dependencias simple con lazy loading:

```php
$queryBuilder = App::get('QueryBuilder');
```

### Repository Pattern

`QueryBuilder` actúa como un repositorio genérico para operaciones de base de datos.

### Front Controller

`api.php` centraliza todas las peticiones y las enruta al controlador correspondiente.

### Interface Segregation

Los controladores implementan interfaces específicas (`ReadableControllerInterface`, `WritableControllerInterface`) según su funcionalidad.

## Seguridad

- Todas las consultas utilizan prepared statements para prevenir SQL Injection
- Validación de datos de entrada en el controlador
- Códigos de error apropiados sin exponer detalles del sistema
- CORS configurado (ajustar en producción)
- Uso de PDO con modo de error de excepciones

## Extensibilidad

Para agregar nuevos recursos a la API:

1. Crear un nuevo controlador en `src/Controllers/`
2. Implementar las interfaces necesarias
3. Agregar el case en el switch de `api.php`
4. Crear la tabla correspondiente en la base de datos

**Ejemplo:**

```php
// En api.php
case 'departamentos':
    $controller = new DepartamentoController($queryBuilder);
    break;
```

## Licencia

Este proyecto es de uso educativo.

## Autor

Desarrollado como proyecto de aprendizaje de APIs RESTful con PHP nativo.
