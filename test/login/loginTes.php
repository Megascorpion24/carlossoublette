<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/login.php");


class LoginTest extends TestCase{

	private $login;

	public function setUp():void{
		$this->login = new entrada();
	}

	
	//productos consultados correctamente
	public function testBusca() {
        // Setup
        $this->login->set_usuario("admin");
        $this->login->set_clave("12345678");
    
        // Execute
        $fila = $this->login->busca();
    
        // Asserts
        $this->assertEquals(json_encode($fila), json_encode(array(
            'clave' => '12345678',
            'id_rol' => 3,
            'id' => 27
        )));
    }
}