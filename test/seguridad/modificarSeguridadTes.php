<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seguridad.php");


class modificarSeguridadTest extends TestCase{

	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridad();
	}

	//el usuario Ingresa los datos correctos
	public function testModificacionRolExitoso(){
        
        $this->seguridad->set_descripcion("probando2modificar");
        $this->seguridad->set_rol("test2");
           
        $this->seguridad->set_nivel("1");
		$this->assertEquals("Registro modificado", $this->seguridad->modificar($this->seguridad));
	}
	public function testModificacionRolFallido(){
        
        $this->seguridad->set_descripcion("probando2modificar");
        $this->seguridad->set_rol("test45");
           
        $this->seguridad->set_nivel("1");
		$this->assertEquals("rol no registrado", $this->seguridad->modificar($this->seguridad));
	}
	
}