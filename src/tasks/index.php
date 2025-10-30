<?php
require '../../db.php';

$stmt = $pdo->query("SELECT * FROM tasks");
$tasks = $stmt->fetchAll();

echo json_encode($tasks);
