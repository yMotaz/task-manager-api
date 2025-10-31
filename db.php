<?php
$host = 'localhost';
<<<<<<< HEAD
$db = 'user_manager'; // <-- aqui troca para o nome correto do banco
=======
$db = 'user_manager';
>>>>>>> 75ace7c (Adiciona workflow de CI com PHPUnit)
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Erro na conexão com o banco',
        'detalhe' => $e->getMessage()
    ]);
    exit;
}
