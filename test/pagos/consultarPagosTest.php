<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/pagos.php");


class consultarPagosTest extends TestCase{

	private $pagos;

	public function setUp():void{
		$this->pagos = new pagos();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
    {
        $respuesta = $this->pagos->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}