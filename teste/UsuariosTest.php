<?php
use PHPUnit\Framework\TestCase;

class UsuariosTest extends TestCase
{
    public function testJsonDecode()
    {
        $json = '{"nome":"Teste","email":"teste@email.com","funcao":"Dev"}';
        $data = json_decode($json, true);
        $this->assertArrayHasKey('nome', $data);
        $this->assertArrayHasKey('email', $data);
        $this->assertArrayHasKey('funcao', $data);
    }

    public function testDatabaseConnection()
    {
        require __DIR__ . '/../db.php';
        $this->assertNotNull($pdo, "Conexão com banco falhou");
    }

    public function testUsuariosEndpoint()
    {
        $response = @file_get_contents("http://localhost/task-manager-api/src/usuarios/index.php");
        $this->assertNotFalse($response, "Falha ao acessar endpoint de usuários");
    }
}
