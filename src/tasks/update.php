<?php
require_once __DIR__ . '/../../db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['id'], $data['title'], $data['description'], $data['status'])) {
    http_response_code(400);
    echo json_encode(["error" => "Dados inválidos"]);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
    $stmt->execute([
        ':id'          => $data['id'],
        ':title'       => $data['title'],
        ':description' => $data['description'],
        ':status'      => $data['status']
    ]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "Tarefa atualizada com sucesso"]);
    } else {
        echo json_encode(["message" => "Nenhuma alteração realizada"]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error"   => "Erro ao atualizar tarefa",
        "detalhe" => $e->getMessage()
    ]);
}
