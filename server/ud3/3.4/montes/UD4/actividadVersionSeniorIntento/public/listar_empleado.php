<?php
// Define el directorio raíz del proyecto
define('PROJECT_ROOT', dirname(__DIR__));

// 1. Cargar el autoloader de Composer
require_once PROJECT_ROOT . '/vendor/autoload.php';

// 2. Cargar variables de entorno
try {
    $dotenv = Dotenv\Dotenv::createImmutable(PROJECT_ROOT);
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    die("Error: No se pudo encontrar el archivo .env. Asegúrate de que existe en la raíz del proyecto.");
}

// 3. Importar clases (Namespaces)
use actividad2\config\Database;
use actividad2\repository\EmpleadoRepository;

// Variables para la vista
$empleados = [];
$error = null;

try {
    // 4. Obtener conexión (Singleton)
    $pdo = Database::getInstance();
    
    // 5. Instanciar Repositorio y obtener datos
    $repository = new EmpleadoRepository($pdo);
    $empleados = $repository->findAll();
    
} catch (\PDOException $e) {
    // Error de Base de Datos
    $error = "Error de conexión a la BBDD: " . $e->getMessage();
    // En producción, loggearíamos el error: error_log($e->getMessage());
} catch (\Exception $e) {
    // Otro tipo de error
    $error = "Error inesperado: " . $e->getMessage();
}

// 6. Cargar la vista (Separación de Lógica y Presentación)
// Las variables $empleados y $error estarán disponibles en la vista.
require_once PROJECT_ROOT . '/templates/empleados_vista.php';