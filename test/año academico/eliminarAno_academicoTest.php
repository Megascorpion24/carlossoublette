<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/ano_academico.php");


class eliminarAno_academicoTest extends TestCase{

	private $ano_academico;

	public function setUp():void{
		$this->ano_academico = new ano_academico();
	}

	//el usuario Ingresa los datos correctos
	public function testEliminacionExitoso(){
        $this->ano_academico->set_id("1");
        
        $this->ano_academico->set_nivel("1");
		$this->assertEquals("3Registro Eliminado", $this->ano_academico->eliminar($this->ano_academico));
	}

    public function testEliminacionFallido(){
        $this->ano_academico->set_id("7");
        
        
        $this->ano_academico->set_nivel("1");
		$this->assertEquals("4No se puede eliminar", $this->ano_academico->eliminar($this->ano_academico));
	}
   
}