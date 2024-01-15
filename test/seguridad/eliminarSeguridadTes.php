<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seguridad.php");


class eliminarSeguridadTest extends TestCase{

	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridad();
	}

	//el usuario Ingresa los datos correctos
	public function testEliminacionRolExitoso(){
        $this->seguridad->set_id("24");
     
        $this->seguridad->set_nivel("1");
		$this->assertEquals("Registro Eliminado", $this->seguridad->eliminar($this->seguridad));
	}
	public function testEliminacionRolFallido(){
        $this->seguridad->set_id("256");
           
        $this->seguridad->set_nivel("1");
		$this->assertEquals("rol no registrado", $this->seguridad->eliminar($this->seguridad));
	}

	public function testEliminacionRol_permiso(){
        $this->seguridad->set_id("24");
           
        $this->seguridad->set_nivel("1");
		$this->assertEquals("rol no registrado", $this->seguridad->eliminar($this->seguridad));
	}
	
}