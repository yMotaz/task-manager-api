<?php
header('Content-Type: application/json');

$method  = $_SERVER['REQUEST_METHOD'];
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Rota raiz (status da API)
if ($request === '/' && $method === 'GET') {
    echo json_encode(["message" => "API online 🚀"]);
    exit;
}

/**
 * TASKS
 */
if ($request === '/tasks' && $method === 'GET') {
    require 'src/tasks/index.php';
    exit;
}
if ($request === '/tasks' && $method === 'POST') {
    require 'src/tasks/create.php';
    exit;
}
if (preg_match('#^/tasks/\d+$#', $request) && $method === 'PUT') {
    require 'src/tasks/update.php';
    exit;
}
if (preg_match('#^/tasks/\d+$#', $request) && $method === 'DELETE') {
    require 'src/tasks/delete.php';
    exit;
}

/**
 * USUÁRIOS
 */
if ($request === '/usuarios' && $method === 'GET') {
    require 'src/usuarios/index.php';
    exit;
}
if ($request === '/usuarios' && $method === 'POST') {
    require 'src/usuarios/create.php';
    exit;
}
if (preg_match('#^/usuarios/\d+$#', $request) && $method === 'PUT') {
    require 'src/usuarios/update.php';
    exit;
}
if (preg_match('#^/usuarios/\d+$#', $request) && $method === 'DELETE') {
    require 'src/usuarios/delete.php';
    exit;
}

// Default 404
http_response_code(404);
echo json_encode([
    "error"  => "Rota não encontrada",
    "rota"   => $request,
    "method" => $method
]);
