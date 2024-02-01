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
        $this->materia->set_nombre("nociones basicas de oficina");
        $this->materia->set_ano("2");
        $this->materia->set_docente1("000101");
        $this->materia->set_docente2("000103");
        
       
    
        $this->materia->set_nivel("1");
		$this->assertEquals("1Registro Incluido", $this->materia->registrar($this->materia));
	}
	public function testRegistrofallido(){
        $this->materia->set_nombre("MATEMATICAS");
        $this->materia->set_ano("1");
        $this->materia->set_docente1("000101");
        $this->materia->set_docente2("000103");
        
       
    
        $this->materia->set_nivel("1");
		$this->assertEquals("MATERIA Ya esta Registrada", $this->materia->registrar($this->materia));
	}
}