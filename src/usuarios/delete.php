<?php
require_once __DIR__ . '/../../db.php';

// Lê o corpo da requisição (JSON)
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID do usuário é obrigatório"]);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $data['id']]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "Usuário deletado com sucesso"]);
    } else {
        echo json_encode(["message" => "Usuário não encontrado"]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error"   => "Erro ao deletar usuário",
        "detalhe" => $e->getMessage()
    ]);
}
