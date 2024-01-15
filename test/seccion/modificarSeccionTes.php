<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seccion.php");


class modificarSeccionTest extends TestCase{

	private $seccion;

	public function setUp():void{
		$this->seccion = new secciones();
	}

	//el usuario Ingresa los datos correctos
	public function testModificacionExitoso(){
		$this->seccion->set_id("36");
        $this->seccion->set_secciones("2");
        $this->seccion->set_ano("2");
        $this->seccion->set_cantidad("25");
        $this->seccion->set_cedula_profesor("000103");
	       
        $this->seccion->set_nivel("1");
		$this->assertEquals("Registro modificado", $this->seccion->modificar($this->seccion));
	}
	public function testModificacionfallido(){
		$this->seccion->set_id("36");
		$this->seccion->set_secciones("2");
        $this->seccion->set_ano("4");
        $this->seccion->set_cantidad("28");
        $this->seccion->set_cedula_profesor("000103");

        $this->seccion->set_nivel("1");
		$this->assertEquals("Solo se permitio Actualizar Datos Adicionales de la Seccion", $this->seccion->modificar($this->seccion));
}
}