<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/representante.php");


class consultarRepresentantesTest extends TestCase{

	private $representante;

	public function setUp():void{
		$this->representante = new tutor_legal();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->representante->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}