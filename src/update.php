<?php
require 'db.php';
$id = basename($_SERVER['REQUEST_URI']);
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, funcao = ? WHERE id = ?");
$stmt->execute([$data['nome'], $data['email'], $data['funcao'], $id]);
echo json_encode(['mensagem' => 'Usuário atualizado com sucesso']);
?>
