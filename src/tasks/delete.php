<?php
require '../../db.php';

$id = basename($_SERVER['REQUEST_URI']);

$sql = "DELETE FROM tasks WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

echo json_encode(['message' => 'Tarefa removida']);
