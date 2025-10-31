<?php
require_once __DIR__ . '/../../db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['nome'], $data['email'], $data['funcao'])) {
    http_response_code(400);
    echo json_encode(["error" => "Dados inválidos"]);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, funcao) VALUES (:nome, :email, :funcao)");
    $stmt->execute([
        ':nome'   => $data['nome'],
        ':email'  => $data['email'],
        ':funcao' => $data['funcao']
    ]);

    http_response_code(201);
    echo json_encode([
        "message" => "Usuário criado com sucesso",
        "id"      => $pdo->lastInsertId()
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error"   => "Erro ao inserir usuário",
        "detalhe" => $e->getMessage()
    ]);
}
