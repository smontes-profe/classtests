<?php

namespace Controllers;


use Database\QueryBuilder;
use Exception;
use Interfaces\ReadableControllerInterface;
use Interfaces\WritableControllerInterface;

class EmpleadoController implements ReadableControllerInterface, WritableControllerInterface
{
    private QueryBuilder $queryBuilder;
    

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    // GET
    public function index()
    {
        $datos = $this->queryBuilder->all('empleados');
        http_response_code(200);
        echo json_encode($datos);
    }

    // POST
    public function store()
    {
        // Leemos el cuerpo de la petición (raw body) porque los datos vienen en formato JSON
        // no como datos de formulario tradicionales ($_POST)
        $inputJSON = file_get_contents('php://input');
        // Convertimos el JSON a un array asociativo de PHP
        $input = json_decode($inputJSON, true);

        if (json_last_error() !== JSON_ERROR_NONE || empty($input)) {
            throw new Exception("El cuerpo de la petición no es un JSON válido", 400);
        }

        // Validamos campos obligatorios 
        if (empty($input['nombre']) || empty($input['puesto']) || empty($input['salario'])) {
            throw new Exception("Faltan datos: nombre, puesto o salario son obligatorios.", 400);
        }

        $exito = $this->queryBuilder->insert('empleados', $input);

        if ($exito) {

            $nuevoID = $this->queryBuilder->lastInsertId();

            http_response_code(201);
            echo json_encode([
                "status" => "ok",
                "id" => $nuevoID,
                "message" => "Empleado creado correctamente"
            ]);
        } else {
            throw new Exception("Error al insertar empleado en la base de datos", 500);
        }
    }

    public function update($id)
    {
        // Al igual que en store(), leemos el raw body para obtener los datos JSON
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        if (empty($input)) {
            throw new Exception("JSON inválido o vacío", 400);
        }

        $exito = $this->queryBuilder->update('empleados', $id, $input);

        if ($exito) {
            http_response_code(200);
            echo json_encode([
                "status" => "ok",
                "message" => "Empleado actualizado"
            ]);

        } else {
            throw new Exception("Error al actualizar (quizás el ID no existe)", 500);
        }
    }

    public function delete($id) {
        $exito = $this->queryBuilder->delete('empleados', $id);

        if ($exito) {
            http_response_code(200);
            echo json_encode([
                "status" => "ok",
                "message" => "Empleado eliminado"
            ]);
            
        } else {
            throw new Exception("Error al eliminar", 500);
        }
    }
}
