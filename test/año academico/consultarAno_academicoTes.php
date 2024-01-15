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
    $ano_academico = $this->ano_academico->consultar(array(1));
    $expected_ano_academico = '<tr><th>2</th><th>2023-09-07</th><th>2024-04-11</th><th>2021-2022</th><th></th></tr>';
    $this->assertEquals($expected_ano_academico, $ano_academico);
}
}