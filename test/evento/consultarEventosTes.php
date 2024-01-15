<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/eventos.php");


class consultarEventosTest extends TestCase{

	private $eventos;

	public function setUp():void{
		$this->eventos = new eventos();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
{
    $eventos = $this->eventos->consultar(array(1));
    $expected_eventos = '<tr><th>1</th><th>2023-12-02</th><th>2023-12-31</th><th>PrimerLapso</th><th></th></tr>';
    $this->assertEquals($expected_eventos, $eventos);
}
}