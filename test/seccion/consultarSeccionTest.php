<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seccion.php");


class consultarSeccionTest extends TestCase{

	private $seccion;

	public function setUp():void{
		$this->seccion = new secciones();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->seccion->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}
