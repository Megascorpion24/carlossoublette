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
		$this->seccion->set_id("36");
        
	       
        $this->seccion->set_nivel("1");
		$this->assertEquals("Registro Eliminado", $this->seccion->eliminar($this->seccion));
	}
	public function testEliminacionfallido(){
		$this->seccion->set_id("30");
		
        $this->seccion->set_nivel("1");
		$this->assertEquals("Sección no existe, o tiene estudiantes afiliados", $this->seccion->eliminar($this->seccion));
}
}