<?php
require_once __DIR__ . '/../../db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID da tarefa é obrigatório"]);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->execute([':id' => $data['id']]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "Tarefa deletada com sucesso"]);
    } else {
        echo json_encode(["message" => "Tarefa não encontrada"]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error"   => "Erro ao deletar tarefa",
        "detalhe" => $e->getMessage()
    ]);
}
