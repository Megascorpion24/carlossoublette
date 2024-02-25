<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/docente.php");


class consultarDocentesTest extends TestCase{

	private $docente;

	public function setUp():void{
		$this->docente = new docente();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->docente->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}