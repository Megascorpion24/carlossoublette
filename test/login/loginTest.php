<?php

use PHPUnit\Framework\TestCase;
require_once("./modelo/login.php");

class loginTest extends TestCase
{
    private $login;

    public function setUp(): void
    {
        $this->login = new entrada();
    }

    public function testBusca(): void
    {
        // Prueba con datos de prueba
        $this->login->set_usuario("admin");
        $this->login->set_clave("12345678");

        // Verificar si el resultado es el esperado
        $this->assertNotEmpty($this->login->busca($this->login));
        $this->assertIsArray($this->login->busca($this->login));
        
    }


    public function testBuscaFallo(): void
    {
        // Prueba con datos de prueba
        $this->login->set_usuario("admin1231");
        $this->login->set_clave("12345678");
     
        // Verificar si el resultado es el esperado
        $this->assertNotEmpty($this->login->busca($this->login));
        $this->assertIsArray($this->login->busca($this->login));
        $this->assertEquals(array("El usuario ingresado es incorrecto"),$this->login->busca($this->login));
    }

    public function testPermisos(): void
    {
        // Crear una instancia de la clase entrada
        $entrada = new entrada();

        // Setear el valor de $rol a 3
        $rol = 3;

        // Llamar a la función permisos con el valor de $rol
        $permisos = $entrada->permisos($rol);

        // Verificar si la función devuelve los permisos correctos
        $this->assertNotEmpty($permisos);
        $this->assertIsArray($permisos);
    }

    

    
}