<?php
// 1. Comprobar que recibimos el ID por GET
if (isset($_GET['id'])) {
    
    require_once 'conexion.php';
    $id_a_eliminar = $_GET['id'];

    try {
        // 2. 🔒 Consulta preparada para DELETE
        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        // 3. 🔒 Vincular el ID
        $stmt->bindValue(':id', $id_a_eliminar, PDO::PARAM_INT);
        
        // 4. Ejecutar
        $stmt->execute();

        // 5. Redirigir de vuelta a la lista
        // header() envía una cabecera HTTP al navegador
        header("Location: lista.php");
        exit; // ¡Importante! Detener la ejecución del script después de redirigir.

    } catch (PDOException $e) {
        // Manejar errores
        die("Error al eliminar el empleado: " . $e->getMessage());
    }

} else {
    // Si no hay ID, no hacer nada y volver
    header("Location: lista.php");
    exit;
}
?>