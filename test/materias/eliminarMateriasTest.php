<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/materia.php");


class eliminarMateriasTest extends TestCase{

	private $materia;

	public function setUp():void{
		$this->materia = new materias();
	}

	//el usuario Ingresa los datos correctos
	public function testEliminacionExitosa(){
        $this->materia->set_id("13");
       
       
    
        $this->materia->set_nivel("1");
		$this->assertEquals("3Registro Eliminado", $this->materia->eliminar($this->materia));
	}
	public function testEliminacionfallido(){
        $this->materia->set_id("67");
        
        
       
    
        $this->materia->set_nivel("1");
		$this->assertEquals("materia no registrada", $this->materia->eliminar($this->materia));
	}
}