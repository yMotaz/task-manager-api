<?php
require '../../db.php';

$id = basename($_SERVER['REQUEST_URI']);
$data = json_decode(file_get_contents("php://input"), true);

$sql = "UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$data['title'], $data['description'], $data['status'], $id]);

echo json_encode(['message' => 'Tarefa atualizada']);
