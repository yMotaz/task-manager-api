<?php
require_once __DIR__ . '/../../db.php';

try {
    $stmt = $pdo->query("SELECT * FROM usuarios");
    $usuarios = $stmt->fetchAll();
    echo json_encode($usuarios);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error" => "Erro ao buscar usuários",
        "detalhe" => $e->getMessage()
    ]);
}
