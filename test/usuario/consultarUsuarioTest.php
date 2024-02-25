<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/usuarios.php");


class consultarUsuarioTest extends TestCase{

	private $Usuarios;

	public function setUp():void{
		$this->Usuarios = new usuarios();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->Usuarios->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}