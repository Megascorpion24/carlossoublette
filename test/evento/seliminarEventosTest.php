<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/eventos.php");


class seliminarEventosTest extends TestCase{

	private $eventos;

	public function setUp():void{
		$this->eventos = new eventos();
	}

	//el usuario Ingresa los datos correctos
	public function testEliminacionExitoso(){
        $this->eventos->set_id("2");
        
        $this->eventos->set_nivel("1");
		$this->assertEquals("3Registro Eliminado", $this->eventos->eliminar($this->eventos));
	}

    public function testEliminacionFallido(){
        $this->eventos->set_id("7");
        
        
        $this->eventos->set_nivel("1");
		$this->assertEquals("4Evento no registrado", $this->eventos->eliminar($this->eventos));
	}
   
}