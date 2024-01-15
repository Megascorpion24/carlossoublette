<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/materia.php");


class consultarMateriasTest extends TestCase{

	private $Materias;

	public function setUp():void{
		$this->Materias = new Materias();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
{
    $Materias = $this->Materias->consultar(array(1));
    $expected_Materias = '<tr><th>13</th><th> <span class="h6 font-weight-bold">MATEMATICA</th><th value="1"> <span class="h6 font-weight-bold">1</th><th value="30019082">santiago casamayor</th><th value="000105">Sofía Hernández</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th></th></tr><tr><th>15</th><th> <span class="h6 font-weight-bold">INGLES</th><th value="4"> <span class="h6 font-weight-bold">4</th><th value="000104">Carlos Fernández</th><th value="30019081">Luis Perez</th><th value="30019082">santiago casamayor</th><th value="000105">Sofía Hernández</th><th value="-">-</th><th value="-">-</th><th></th></tr><tr><th>18</th><th> <span class="h6 font-weight-bold">INGLES</th><th value="1"> <span class="h6 font-weight-bold">1</th><th value="000102">Pedro García</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th></th></tr><tr><th>19</th><th> <span class="h6 font-weight-bold">BIOLOGIA</th><th value="3"> <span class="h6 font-weight-bold">3</th><th value="000101">María Rodríguez</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th></th></tr><tr><th>20</th><th> <span class="h6 font-weight-bold">DIBUJO</th><th value="5"> <span class="h6 font-weight-bold">5</th><th value="000103">Laura Martínez</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th value="-">-</th><th></th></tr>';
    $this->assertEquals($expected_Materias, $Materias);
}
}