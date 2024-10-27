<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/materia.php");

class registrarMateriasTest extends TestCase{

	private $materia;

	public function setUp():void{
		$this->materia = new materias();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
		$datos = [
			'nombre' => "Ingles",
			'año' => 4,
			'docentes' => array(28276731,'000103')//los 0 a las izq da problema de validacion x eso se coloca como string
		];
    
        $this->materia->set_nivel("1");
		$result=$this->materia->Registrar_Materia($datos);

		$this->assertEquals(
			"1Registro Incluido",// Valor esperado
			 $result , // Valor obtenido
			 'El Registro de la materia falló: ' . $result // Mensaje de error personalizado
			);
	}
 
	public function testRegistroFallido() {
		// Datos incorrectos
		$datos = [
			'nombre' => "Quim7ca",  // Nombre inválido (contiene número)
			'año' => 3,        
			'docentes' => array(28276731, '000103') 
		];
	
		 // Configurar nivel
		 $this->materia->set_nivel("1");

		 // Ejecutar la función y capturar el resultado
		 $result = $this->materia->Registrar_Materia($datos);
		$this->assertStringContainsString('Nombres no pueden contener caracteres especiales o', $result);
	}

}

