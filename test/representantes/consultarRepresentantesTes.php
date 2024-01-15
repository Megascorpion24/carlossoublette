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
    $representante = $this->representante->consultar(array(1));
    $expected_representante = '<tr><th>28621408</th><th>jesus</th><th>jesus</th><th>jesus</th><th>jesus</th><th>33333333333</th><th>jesus@gmail.com</th><th>33333333333</th><th></th></tr><tr><th>28621409</th><th>manuel</th><th>manuel</th><th>manuel</th><th>manuel</th><th>22222222222</th><th>manuel@gmail.com</th><th>22222222222</th><th></th></tr>';
    $this->assertEquals($expected_representante, $representante);
}
}