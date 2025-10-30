<?php
header('Content-Type: application/json');

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Remove query string da URL, se houver
$request = explode('?', $request)[0];

switch (true) {
    // TASKS
    case (strpos($request, '/api/tasks') === 0 && $method === 'GET'):
        require 'src/tasks/index.php';
        break;
    case (strpos($request, '/api/tasks') === 0 && $method === 'POST'):
        require 'src/tasks/create.php';
        break;
    case (strpos($request, '/api/tasks/') === 0 && $method === 'PUT'):
        require 'src/tasks/update.php';
        break;
    case (strpos($request, '/api/tasks/') === 0 && $method === 'DELETE'):
        require 'src/tasks/delete.php';
        break;

    // USUÁRIOS
    case (strpos($request, '/api/usuarios') === 0 && $method === 'GET'):
        require 'src/usuarios/index.php';
        break;
    case (strpos($request, '/api/usuarios') === 0 && $method === 'POST'):
        require 'src/usuarios/create.php';
        break;
    case (strpos($request, '/api/usuarios/') === 0 && $method === 'PUT'):
        require 'src/usuarios/update.php';
        break;
    case (strpos($request, '/api/usuarios/') === 0 && $method === 'DELETE'):
        require 'src/usuarios/delete.php';
        break;

    default:
        http_response_code(404);
        echo json_encode(array("error" => "Rota não encontrada"));
        break;
}
