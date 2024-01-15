<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/horario_docente.php");


class registrarHorariosTest extends TestCase{

	private $Horarios;

	public function setUp():void{
		$this->Horarios = new horario();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->Horarios->set_clase("13");
        $this->Horarios->set_cedula_profesor("30019082");
        $this->Horarios->set_ano("30");
        $this->Horarios->set_dia("1");
        $this->Horarios->set_clase_inicia("13:00:00");
        $this->Horarios->set_clase_termina("14:00:00");
       
        $this->Horarios->set_nivel("1");
		$this->assertEquals("Registro incluido", $this->Horarios->registrar($this->Horarios));
	}
    //el usuario Ingresa los datos inmcompatibles
    public function testConflisto_clases(){
        $this->Horarios->set_clase("13");
        $this->Horarios->set_cedula_profesor("30019082");
        $this->Horarios->set_ano("30");
        $this->Horarios->set_dia("1");
        $this->Horarios->set_clase_inicia("13:00:00");
        $this->Horarios->set_clase_termina("14:00:00");
       
        $this->Horarios->set_nivel("1");
		$this->assertEquals("Ya existe una existe una clase en ese bloque academico, eliga una seccion o hora diferente", $this->Horarios->registrar($this->Horarios));
	}
    //la hora eligida no es valida
	public function testRango_hora(){
        $this->Horarios->set_clase("13");
        $this->Horarios->set_cedula_profesor("30019082");
        $this->Horarios->set_ano("30");
        $this->Horarios->set_dia("1");
        $this->Horarios->set_clase_inicia("15:00:00");
        $this->Horarios->set_clase_termina("14:00:00");
       
        $this->Horarios->set_nivel("1");
		$this->assertEquals("La hora de inicio no puede ser mayor a la hora de término", $this->Horarios->registrar($this->Horarios));
	}
}