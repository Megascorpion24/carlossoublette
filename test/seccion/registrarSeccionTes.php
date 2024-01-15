<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seccion.php");


class registrarSeccionTest extends TestCase{

	private $seccion;

	public function setUp():void{
		$this->seccion = new secciones();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->seccion->set_secciones("1");
        $this->seccion->set_ano("2");
        $this->seccion->set_cantidad("25");
        $this->seccion->set_cedula_profesor("000103");
		$this->seccion->set_ano_academico("3");
        
       
    
        $this->seccion->set_nivel("1");
		$this->assertEquals("Registro incluido", $this->seccion->registrar($this->seccion));
	}
	public function testRegistrofallido(){
		$this->seccion->set_secciones("1");
        $this->seccion->set_ano("2");
        $this->seccion->set_cantidad("25");
        $this->seccion->set_cedula_profesor("000103");
		$this->seccion->set_ano_academico("3");
        
       
    
        $this->seccion->set_nivel("1");
		$this->assertEquals("Seccion Ya Registrada", $this->seccion->registrar($this->seccion));
}
}