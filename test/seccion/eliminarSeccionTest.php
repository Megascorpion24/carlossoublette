<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seccion.php");


class eliminarSeccionTest extends TestCase{

	private $seccion;

	public function setUp():void{
		$this->seccion = new secciones();
	}

	//el usuario Ingresa los datos correctos
	public function testEliminacionExitoso(){
  
        $this->seccion->set_nivel("1");

		$result=$this->seccion->eliminar(39);
		$this->assertEquals("3Registro Eliminado", $result, 'Error en la prueba:' . $result);
	}
	
}