<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/materia.php");


class consultarMateriasTest extends TestCase{

	private $Materias;

	public function setUp():void{
		$this->Materias = new Materias();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->Materias->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}