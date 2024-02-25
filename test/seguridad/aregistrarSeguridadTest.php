<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seguridad.php");


class aregistrarSeguridadTest extends TestCase{

	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridad();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroRolExitoso(){
        
        $this->seguridad->set_descripcion("probando2");
        $this->seguridad->set_rol("test2");
           
        $this->seguridad->set_nivel("1");
		$this->assertEquals("Registro incluido", $this->seguridad->registrar1($this->seguridad));
	}
	public function testRegistroRolFallido(){
        
        $this->seguridad->set_descripcion("probando2");
        $this->seguridad->set_rol("test2");
           
        $this->seguridad->set_nivel("1");
		$this->assertEquals("rol registrado", $this->seguridad->registrar1($this->seguridad));
	}
	
}