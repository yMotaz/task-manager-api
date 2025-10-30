<?php
require '../../db.php';

$id = basename($_SERVER['REQUEST_URI']);
$data = json_decode(file_get_contents("php://input"), true);

$sql = "UPDATE user_manager SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$data['name'], $data['email'], $data['phone'], $data['address'], $id]);

echo json_encode(['message' => 'Usuário atualizado']);
