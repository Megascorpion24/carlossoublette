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

        $this->materia->set_nivel("1");
		$result= $this->materia->Eliminar_Materia("15");
		//Prueba
		$this->assertEquals("3Registro Eliminado", $result, 'La eliminación de la materia falló: ' . $result);
	}
	
}