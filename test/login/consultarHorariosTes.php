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
    $horario = $this->horario->consultar(array(1));
    $expected_horario = '<tr><th>23</th><th>MATEMATICA</th><th>María-000101</th><th>1-A</th><th>3</th><th>Miercoles</th><th>14:47:00</th><th>17:49:00</th><th>2021-2022</th><th></th></tr>';
    $this->assertEquals($expected_horario, $horario);
}
}