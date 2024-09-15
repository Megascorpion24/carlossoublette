<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/inscripciones.php");


class modificarInscripcionTest extends TestCase{

	private $inscripciones;

	public function setUp():void{
		$this->inscripciones = new inscripciones();
	}

	
	//productos consultados correctamenteÑ
	public function testRegistroExitoso(){
       
        $this->inscripciones->set_materia("ninguna");
        $this->inscripciones->set_cedula_estudiante("22222222");
        $this->inscripciones->set_nombre_estudiante("santiago");
        $this->inscripciones->set_apellido_estudiante("casamayor");
        $this->inscripciones->set_edad_estudiante("16");
        $this->inscripciones->set_observaciones("ninguna");
        $this->inscripciones->set_sangre("a+");
        $this->inscripciones->set_vacunas("BCG");
        $this->inscripciones->set_operaciones("ninguna");
        $this->inscripciones->set_enfermedades("ninguna");
        $this->inscripciones->set_medicamentos("ninguno");
        $this->inscripciones->set_alerias("polvo");
        $this->inscripciones->set_condicion("ninguna");
        $this->inscripciones->set_ano("30");
        $this->inscripciones->set_tratamiento("ninguno");
       
      
              
        $this->inscripciones->set_nivel("1");
        $this->assertEquals("2Registro modificado", $this->inscripciones->modificar($this->inscripciones));
    }
    
    //el usuario Ingresa los datos repetidos
    public function testRegistrofallido(){
        
       
        $this->inscripciones->set_materia("ninguna");
        $this->inscripciones->set_cedula_estudiante("30019023");
        $this->inscripciones->set_nombre_estudiante("santiago");
        $this->inscripciones->set_apellido_estudiante("casamayor");
        $this->inscripciones->set_edad_estudiante("16");
        $this->inscripciones->set_observaciones("ninguna");
        $this->inscripciones->set_sangre("a+");
        $this->inscripciones->set_vacunas("BCG");
        $this->inscripciones->set_operaciones("ninguna");
        $this->inscripciones->set_enfermedades("ninguna");
        $this->inscripciones->set_medicamentos("ninguno");
        $this->inscripciones->set_alerias("polvo");
        $this->inscripciones->set_condicion("ninguna");
        $this->inscripciones->set_ano("30");
        $this->inscripciones->set_tratamiento("ninguno");
       
      
              
        $this->inscripciones->set_nivel("1");
        $this->assertEquals("4cedula no registrada", $this->inscripciones->modificar($this->inscripciones));
    }
    
}

