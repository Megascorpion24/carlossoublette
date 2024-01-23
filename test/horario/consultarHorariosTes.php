<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/horario_docente.php");


class consultarHorariosTest extends TestCase{

	private $horario;

	public function setUp():void{
		$this->horario = new horario();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->horario->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}