<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/bitacora.php");


class consultarBitacoraTest extends TestCase{

	private $Bitacora;

	public function setUp():void{
		$this->Bitacora = new Bitacora();
	}

	
	//productos consultados correctamenteÑ
	public function testConsultaExitosa()
    {
        $respuesta = $this->Bitacora->consultar(array(1));
        $this->assertNotEmpty($respuesta);
    }
}