<?php
require_once __DIR__ . '/../../db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['title'], $data['description'], $data['status'])) {
    http_response_code(400);
    echo json_encode(["error" => "Dados inválidos"]);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status)");
    $stmt->execute([
        ':title'       => $data['title'],
        ':description' => $data['description'],
        ':status'      => $data['status']
    ]);

    http_response_code(201);
    echo json_encode([
        "message" => "Tarefa criada com sucesso",
        "id"      => $pdo->lastInsertId()
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error"   => "Erro ao inserir tarefa",
        "detalhe" => $e->getMessage()
    ]);
}
