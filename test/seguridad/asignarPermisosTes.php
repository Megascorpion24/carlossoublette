<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seguridad.php");


class asignarPermisosTest extends TestCase{

	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridad();
	}

	//el usuario Ingresa los datos correctos
	
	public function testRegistroPermisosExitoso(){
        
        $this->seguridad->set_id("24");
        $this->seguridad->set_permiso("106,107,108,109,110");
           
        $this->seguridad->set_nivel("1");
		$this->assertEquals("Registro Incluido", $this->seguridad->registrar($this->seguridad));
	}
}