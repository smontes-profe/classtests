<?php
// crear_cookie.php
// Soporta dos acciones via GET: action=status (por defecto) o action=create
// Parámetro opcional: ttl en segundos (por ejemplo ?action=create&ttl=30)

// TTL por defecto: 3600 segundos (1 hora)
$default_ttl = 3600;
$action = isset($_GET['action']) ? $_GET['action'] : 'status';
$ttl = isset($_GET['ttl']) && is_numeric($_GET['ttl']) ? (int)$_GET['ttl'] : $default_ttl;

header('Content-Type: application/json; charset=utf-8');

if ($action === 'create') {
    $expire = time() + $ttl;
    setcookie('centro', 'Ilerna', $expire, '/');
    echo json_encode([
        'status' => 'created',
        'message' => "Cookie 'centro' creada. Expira en {$ttl} segundos.",
        'ttl' => $ttl,
        'expire' => $expire
    ]);
    exit;
}

// action=status: comprobar si la cookie existe
if (isset($_COOKIE['centro'])) {
    echo json_encode([
        'status' => 'exists',
        'message' => "La cookie 'centro' existe y su valor es: " . $_COOKIE['centro']
    ]);
} else {
    echo json_encode([
        'status' => 'missing',
        'message' => "La cookie 'centro' NO existe. Pulsa 'Crear cookie' para crearla."
    ]);
}
?>