<?php
require '../../db.php';

$id = basename($_SERVER['REQUEST_URI']);

$sql = "DELETE FROM user_manager WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

echo json_encode(['message' => 'Usuário removido']);
