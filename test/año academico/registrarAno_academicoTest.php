<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/ano_academico.php");


class registrarAno_academicoTest extends TestCase{

	private $ano_academico;

	public function setUp():void{
		$this->ano_academico = new ano_academico();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
   
      
        $this->ano_academico->set_fecha_cierr("2025-12-31");
        $this->ano_academico->set_fecha_ini("2024-12-02");
        $this->ano_academico->set_ano_academico("2024-2025");
		$this->ano_academico->set_estatus("HABILITADO");
        
        $this->ano_academico->set_nivel("1");
		$this->assertEquals("1Registro Incluido", $this->ano_academico->registrar($this->ano_academico));
	}

	public function testRegistrofallido(){
   
      
        $this->ano_academico->set_fecha_cierr("2025-12-31");
        $this->ano_academico->set_fecha_ini("2024-12-02");
        $this->ano_academico->set_ano_academico("2024-2025");
		$this->ano_academico->set_estatus("HABILITADO");
        
        $this->ano_academico->set_nivel("1");
		$this->assertEquals("4Ya existe un año academico asignado al año en curso", $this->ano_academico->registrar($this->ano_academico));
	}

	public function testRegistrofallidoFecha(){
	
		$this->ano_academico->set_fecha_cierr("2023-12-31");
		$this->ano_academico->set_fecha_ini("2024-06-02");
		$this->ano_academico->set_ano_academico("2023-2024");
		$this->ano_academico->set_estatus("HABILITADO");

		$this->ano_academico->set_nivel("1");
		$this->assertEquals("4La fecha de inicio no puede ser mayor a la fecha de cierre", $this->ano_academico->registrar($this->ano_academico));
	}

}