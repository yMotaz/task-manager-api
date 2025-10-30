<?php
require '../../db.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$data['title'], $data['description'], $data['status']]);

echo json_encode(['message' => 'Tarefa criada com sucesso']);
