<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, funcao) VALUES (?, ?, ?)");
$stmt->execute([$data['nome'], $data['email'], $data['funcao']]);
echo json_encode(['mensagem' => 'Usuário criado com sucesso']);
?>
