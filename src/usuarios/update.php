<?php
require_once __DIR__ . '/../../db.php';

// Lê o corpo da requisição (JSON)
$data = json_decode(file_get_contents("php://input"), true);

// Verifica se veio o ID e os campos obrigatórios
if (!$data || !isset($data['id'], $data['nome'], $data['email'], $data['funcao'])) {
    http_response_code(400);
    echo json_encode(["error" => "Dados inválidos"]);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, funcao = :funcao WHERE id = :id");
    $stmt->execute([
        ':id'     => $data['id'],
        ':nome'   => $data['nome'],
        ':email'  => $data['email'],
        ':funcao' => $data['funcao']
    ]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "Usuário atualizado com sucesso"]);
    } else {
        echo json_encode(["message" => "Nenhuma alteração realizada"]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error"   => "Erro ao atualizar usuário",
        "detalhe" => $e->getMessage()
    ]);
}
