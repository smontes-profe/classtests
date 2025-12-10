<?php

require '../bootstrap.php';

use Core\App;
use Controllers\EmpleadoController;


// Configuración de CORS para permitir peticiones desde cualquier origen
// Necesario para APIs que serán consumidas desde navegadores
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



// Responder a la petición OPTIONS del preflight CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}

try {

    $queryBuilder = App::get('QueryBuilder');

    $methodHTTP = $_SERVER['REQUEST_METHOD'];

    $id = $_GET['id'] ?? null;

    if (!isset($_GET['recurso'])) {
        throw new Exception("Debes especificar un recurso (ej: ?recurso=empleados)", 400);
    }

    $recurso = $_GET['recurso'];

    // Sistema de enrutamiento: cada recurso se mapea a un controlador específico
    switch ($recurso) {

        case 'empleados':
            $controller = new EmpleadoController($queryBuilder);
            break;

        default:
            throw new Exception("El recurso '$recurso' no existe.", 404);
    }

    // Enrutamiento por método HTTP (REST)
    switch ($methodHTTP) {

        case 'GET':
            $controller->index();
            break;

        case 'POST':
            $controller->store();
            break;

       case 'PUT':
            if (!$id) throw new Exception("Se requiere ID para actualizar", 400);
            $controller->update($id);
            break;

        case 'DELETE':
            if (!$id) throw new Exception("Se requiere ID para eliminar", 400);
            $controller->delete($id);
            break;

        default:
            throw new Exception("Método HTTP no soportado para este recurso", 405);
    }
} catch (Exception $e) {

    // Aseguramos que el código HTTP sea válido (entre 100 y 599)
    $codigo = $e->getCode() ?: 500;
    if ($codigo < 100 || $codigo > 599) $codigo = 500;

    http_response_code($codigo);

    echo json_encode([
        "status" => "error",
        "code" => $codigo,
        "message" => $e->getMessage()
    ]);
}
