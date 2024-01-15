<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/docente.php");


class consultarDocentesTest extends TestCase{

	private $docente;

	public function setUp():void{
		$this->docente = new docente();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
{
    $docente = $this->docente->consultar(array(1));
    $expected_docente = '<tr><th>000101</th><th>María</th><th>Rodríguez</th><th>Docente</th><th>1981-06-12</th><th>Historia</th><th>Licenciada</th><th>41</th><th>19</th><th>maria.rodriguez@example.com</th><th>Calle 101</th><th></th></tr><tr><th>000102</th><th>Pedro</th><th>García</th><th>Docente</th><th>1974-09-25</th><th>Geografía</th><th>Licenciado</th><th>48</th><th>21</th><th>pedro.garcia@example.com</th><th>Calle 102</th><th></th></tr><tr><th>000103</th><th>Laura</th><th>Martínez</th><th>Docente</th><th>1987-02-18</th><th>Biología</th><th>Licenciada</th><th>35</th><th>13</th><th>laura.martinez@example.com</th><th>Calle 103</th><th></th></tr><tr><th>000104</th><th>Carlos</th><th>Fernández</th><th>Docente</th><th>1978-12-05</th><th>Química</th><th>Licenciado</th><th>44</th><th>17</th><th>carlos.fernandez@example.com</th><th>Calle 104</th><th></th></tr><tr><th>000105</th><th>Sofía</th><th>Hernández</th><th>Docente</th><th>1983-04-30</th><th>Arte</th><th>Licenciada</th><th>39</th><th>16</th><th>sofia.hernandez@example.com</th><th>Calle 105</th><th></th></tr><tr><th>000106</th><th>Antonio</th><th>Gómez</th><th>Docente</th><th>1979-10-15</th><th>Educación Física</th><th>Licenciado</th><th>43</th><th>18</th><th>antonio.gomez@example.com</th><th>Calle 106</th><th></th></tr><tr><th>30019081</th><th>Luis</th><th>Perez</th><th>matematicas</th><th>2002</th><th>fisica</th><th>programador</th><th>21</th><th>2</th><th>santiagocasamayor14@gmail.com</th><th>calle51a entre 18 y 19</th><th></th></tr><tr><th>30019082</th><th>santiago</th><th>casamayor</th><th>docente</th><th>2023-09-13</th><th>programacion</th><th>docevec</th><th>23</th><th>3</th><th>santiagocasamayor@gmail.com</th><th>sdaddas</th><th></th></tr>';
    $this->assertEquals($expected_docente, $docente);
}
}