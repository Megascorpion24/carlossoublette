<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/ano_academico.php");


class consultarAno_academicoTest extends TestCase{

	private $ano_academico;

	public function setUp():void{
		$this->ano_academico = new ano_academico();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->ano_academico->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}