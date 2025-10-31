<?php
use PHPUnit\Framework\TestCase;

class UsuariosTest extends TestCase
{
    // 1) Já existente: valida JSON
    public function testJsonDecode()
    {
        $json = '{"nome":"Teste","email":"teste@email.com","funcao":"Dev"}';
        $data = json_decode($json, true);
        $this->assertArrayHasKey('nome', $data);
        $this->assertArrayHasKey('email', $data);
        $this->assertArrayHasKey('funcao', $data);
    }

    // 2) Novo: valida transformação de string
    public function testStringToUpper()
    {
        $nome = "jvn";
        $this->assertEquals("JVN", strtoupper($nome));
    }

    // 3) Novo: valida soma de números
    public function testSoma()
    {
        $a = 10;
        $b = 5;
        $this->assertEquals(15, $a + $b);
    }
}
