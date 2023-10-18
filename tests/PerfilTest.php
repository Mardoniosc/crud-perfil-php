<?php
require_once('./perfil_orientado/perfil/model.php');

use PHPUnit\Framework\TestCase;

class PerfilTest extends TestCase {

    public function testGetId() {
        $perfil = new Perfil();
        $perfil->setId(123); // Defina um valor para o ID
        $this->assertEquals(123, $perfil->getId());
    }

    public function testGetNome() {
        $perfil = new Perfil();
        $perfil->setNome("Exemplo de Nome"); // Defina um nome
        $this->assertEquals("Exemplo de Nome", $perfil->getNome());
    }

    public function testSetId() {
        $perfil = new Perfil();
        $perfil->setId(456); // Defina um valor para o ID
        $this->assertEquals(456, $perfil->getId());
    }

    public function testSetNome() {
        $perfil = new Perfil();
        $perfil->setNome("Outro Exemplo de Nome"); // Defina um nome
        $this->assertEquals("Outro Exemplo de Nome", $perfil->getNome());
    }
}