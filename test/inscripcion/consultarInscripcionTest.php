<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/inscripciones.php");


class consultarInscripcionTest extends TestCase{

	private $inscripciones;

	public function setUp():void{
		$this->inscripciones = new inscripciones();
	}

	
	//productos consultados correctamenteÑ
	public function testConsultaExitosa()
    {
        $respuesta = $this->inscripciones->consultar(array(1), $n=0);
        $this->assertNotEmpty($respuesta);
    }
}