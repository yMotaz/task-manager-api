<?php
require '../../db.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO user_manager (name, email, phone, address) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$data['name'], $data['email'], $data['phone'], $data['address']]);

echo json_encode(['message' => 'Usuário criado com sucesso']);
