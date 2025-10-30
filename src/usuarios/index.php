<?php
require '../../db.php';

$stmt = $pdo->query("SELECT * FROM user_manager");
$usuarios = $stmt->fetchAll();

echo json_encode($usuarios);
