<?php
require 'db.php';
$id = basename($_SERVER['REQUEST_URI']);
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
echo json_encode(['mensagem' => 'Usuário deletado com sucesso']);
?>
