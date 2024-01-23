<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/eventos.php");


class consultarEventosTest extends TestCase{

	private $eventos;

	public function setUp():void{
		$this->eventos = new eventos();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->eventos->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}