<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/materia.php");


class eliminarMateriasTest extends TestCase{

	private $materia;

	public function setUp():void{
		$this->materia = new materias();
	}


	public function testEliminacionExitosa(){

        $this->materia->set_nivel("1");
		$result= $this->materia->Eliminar_Materia(37);
		//Prueba
		$this->assertEquals("3Registro Eliminado", $result, 'La eliminación de la materia falló: ' . $result);
	}

	public function testEliminacionFallida(){

        $this->materia->set_nivel("1");
		$result= $this->materia->Eliminar_Materia(100);
		//Prueba
		$this->assertEquals("3Registro Eliminado", $result, 'La eliminación de la materia falló: ' . $result);
	}
	
}