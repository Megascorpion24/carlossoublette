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
        $this->materia->set_id("22");
        $this->materia->set_nombre("nociones basicas de oficina");
        $this->materia->set_ano("5");
		$this->materia->set_docente1("000101");
        $this->materia->set_docente2("000103");
       
    
        $this->materia->set_nivel("1");
		$this->assertEquals("Registro modificado..", $this->materia->modificar($this->materia));
	}
	public function testModificacionfallido(){
        $this->materia->set_id("67");
        $this->materia->set_nombre("dibujo tecnico");
        $this->materia->set_ano("4");
       
        
       
    
        $this->materia->set_nivel("1");
		$this->assertEquals("Registro modificado..", $this->materia->modificar($this->materia));
	}
}