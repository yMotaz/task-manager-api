<?php
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/usuarios' && $_SERVER['REQUEST_METHOD'] === 'GET':
        require __DIR__ . '/src/read.php';
        break;
    case '/usuarios' && $_SERVER['REQUEST_METHOD'] === 'POST':
        require __DIR__ . '/src/create.php';
        break;
    case (preg_match('/\/usuarios\/\d+/', $request) ? true : false) && $_SERVER['REQUEST_METHOD'] === 'PUT':
        require __DIR__ . '/src/update.php';
        break;
    case (preg_match('/\/usuarios\/\d+/', $request) ? true : false) && $_SERVER['REQUEST_METHOD'] === 'DELETE':
        require __DIR__ . '/src/delete.php';
        break;
    case (strpos($request, '/usuarios') === 0 && $method === 'POST'):
    require 'usuarios/create.php';
    break;
    default:
        http_response_code(404);
        echo json_encode(['erro' => 'Rota não encontrada']);
        break;
}
?>
