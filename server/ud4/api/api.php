<?php
//conexion
require_once 'pdo.php';
// api.php
header('Content-Type: application/json');

// Obtener el método HTTP (GET, POST, PUT, DELETE)
$metodo = $_SERVER['REQUEST_METHOD'];

// Obtener el recurso y el id solicitado
$recurso = $_GET['recurso'] ?? 'empleados';
$id = $_GET['id'] ?? null;

// Enrutar según el método HTTP
switch ($metodo) {
  case 'GET':
    if ($recurso == 'empleados') {
      // LEER todos los productos
      $result = $pdo->query("SELECT * FROM empleados");
      $data = $result->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($data);
    }
    break;

  case 'POST':
    if ($recurso == 'empleados') {
      // CREAR un empleado nuevo
      $datos = json_decode(file_get_contents('php://input'), true);

      if (!$datos || !isset($datos['nombre']) || !isset($datos['puesto']) || !isset($datos['salario'])) {
          http_response_code(400);
          echo json_encode(['error' => 'Datos incompletos o en formato incorrecto.Datos recibidos=' . json_encode($datos)]);
          break;
      }

      $sql = "INSERT INTO empleados (nombre, puesto, salario) VALUES (?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$datos['nombre'], $datos['puesto'], $datos['salario']]);
      
      echo json_encode(['status' => 'ok', 'id' => $pdo->lastInsertId()]);
    }
    break;

  case 'PUT':
    // ACTUALIZAR un empleado
    if ($recurso == 'empleados' && $id) {
        $datos = json_decode(file_get_contents('php://input'), true);

        if (!$datos || !isset($datos['nombre']) || !isset($datos['puesto']) || !isset($datos['salario'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos incompletos o en formato incorrecto.']);
            break;
        }

        $sql = "UPDATE empleados SET nombre = ?, puesto = ?, salario = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$datos['nombre'], $datos['puesto'], $datos['salario'], $id]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'ok', 'mensaje' => 'Empleado actualizado.']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No se encontró el empleado o los datos no cambiaron.']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'ID de empleado no proporcionado.']);
    }
    break;

  case 'DELETE':
    // ELIMINAR un empleado
    if ($recurso == 'empleados' && $id) {
        $sql = "DELETE FROM empleados WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'ok', 'mensaje' => 'Empleado eliminado.']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No se encontró el empleado con ese ID.']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'ID de empleado no proporcionado.']);
    }
    break;
    
  default:
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Método no permitido.']);
    break;
}
?>