<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/inscripciones.php");


class eliminarInscripcionTest extends TestCase{

	private $inscripciones;

	public function setUp():void{
		$this->inscripciones = new inscripciones();
	}

	
	//productos consultados correctamenteÑ
	public function testRegistroExitoso(){
       
       
        $this->inscripciones->set_cedula_estudiante("12312313");
        
       
      
              
        $this->inscripciones->set_nivel("1");
        $this->assertEquals("3Registro Eliminado", $this->inscripciones->eliminar($this->inscripciones));
    }
    
    //el usuario Ingresa los datos repetidos
    public function testRegistrofallido(){
        
       
        $this->inscripciones->set_cedula_estudiante("30019023");
           
      
              
        $this->inscripciones->set_nivel("1");
        $this->assertEquals("4Cedula no registrada", $this->inscripciones->eliminar($this->inscripciones));
    }
    
}

