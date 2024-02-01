<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seguridad.php");


class consultarSeguridadTest extends TestCase{

	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridad();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->seguridad->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}