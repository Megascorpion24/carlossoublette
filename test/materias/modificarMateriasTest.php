<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/materia.php");

class modificarMateriasTest extends TestCase{

	private $materia;

	public function setUp():void{
		$this->materia = new materias();
	}

	//el usuario Ingresa los datos correctos
	public function testmodificacionExitosa(){

		$datos = [
			'id' => 37,
			'nombre' => "CASTELLANO",
			'año' => 3,
			'docentes' => array('000101','000103')
		];
    
        $this->materia->set_nivel("1");
		$result=$this->materia->Modificar_Materia($datos);
		$this->assertEquals(
			"2Registro Modificado",// Valor esperado
			 $result , // Valor obtenido
			 'La Modificacion de la materia falló: ' . $result // Mensaje de error personalizado
			);
	}

	public function testmodificacionFallida(){

		$datos = [
			'id' => 37,
			'nombre' => "QUIMICA",
			'año' => "SJ",
			'docentes' => array('000101')
		];
    
        $this->materia->set_nivel("1");
		$result=$this->materia->Modificar_Materia($datos);
		$this->assertStringContainsString('El año no es valido', $result);
	}
}