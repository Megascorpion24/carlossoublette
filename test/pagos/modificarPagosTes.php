<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/horario_docente.php");


class modificarHorariosTest extends TestCase{

	private $Horarios;

	public function setUp():void{
		$this->Horarios = new horario();
	}

	//el usuario Ingresa los datos correctos
	public function testModificacionExitosa(){
        $this->Horarios->set_id("38");
        $this->Horarios->set_clase("13");
        $this->Horarios->set_cedula_profesor("30019082");
        $this->Horarios->set_ano("30");
        $this->Horarios->set_dia("4");
        $this->Horarios->set_clase_inicia("13:00:00");
        $this->Horarios->set_clase_termina("14:00:00");
       
        $this->Horarios->set_nivel("1");
		$this->assertEquals("Registro modificado", $this->Horarios->modificar($this->Horarios));
	}
    //el usuario modifica clase que no existe
    public function testConflisto_clases(){
        $this->Horarios->set_id("385");
        $this->Horarios->set_clase("13");
        $this->Horarios->set_cedula_profesor("30019082");
        $this->Horarios->set_ano("30");
        $this->Horarios->set_dia("1");
        $this->Horarios->set_clase_inicia("13:00:00");
        $this->Horarios->set_clase_termina("14:00:00");
       
        $this->Horarios->set_nivel("1");
		$this->assertEquals("clase no existe", $this->Horarios->modificar($this->Horarios));
	}
    //la hora eligida no es valida
	public function testRango_hora(){
        $this->Horarios->set_id("38");
        $this->Horarios->set_clase("13");
        $this->Horarios->set_cedula_profesor("30019082");
        $this->Horarios->set_ano("30");
        $this->Horarios->set_dia("1");
        $this->Horarios->set_clase_inicia("15:00:00");
        $this->Horarios->set_clase_termina("14:00:00");
       
        $this->Horarios->set_nivel("1");
		$this->assertEquals("La hora de inicio no puede ser mayor a la hora de término", $this->Horarios->modificar($this->Horarios));
	}
}