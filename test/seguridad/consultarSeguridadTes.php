<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seguridad.php");


class consultarSeguridadTest extends TestCase{

	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridad();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
{
    $seguridad = $this->seguridad->consultar(array(1));
    $expected_seguridad = "<tr><th class='ocultar'>1</th><th>tutor</th><th>tutor legal</th><th></th></tr><tr><th class='ocultar'>3</th><th>superusuario</th><th>tiene todos los permisos</th><th></th></tr><tr><th class='ocultar'>19</th><th>distribuidor</th><th>paolasssss</th><th></th></tr>";
    $this->assertEquals($expected_seguridad, $seguridad);
}
}