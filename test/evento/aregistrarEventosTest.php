<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/eventos.php");


class aregistrarEventosTest extends TestCase{

	private $eventos;

	public function setUp():void{
		$this->eventos = new eventos();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
   
        $this->eventos->set_evento("SegundoLapso");
        $this->eventos->set_fecha_cierr("2023-12-31");
        $this->eventos->set_fecha_ini("2023-12-02");
		$this->eventos->set_cedula_profesor("000103");
        $this->eventos->set_ano_academico("1");
        
        $this->eventos->set_nivel("1");
		$this->assertEquals("1Registro Incluido", $this->eventos->registrar($this->eventos));
	}

	public function testRango_fecha(){
		$this->eventos->set_evento("tercerLapso");
        $this->eventos->set_fecha_cierr("2023-11-31");
		$this->eventos->set_cedula_profesor("000103");
        $this->eventos->set_fecha_ini("2023-12-02");
        $this->eventos->set_ano_academico("1");
       
        $this->eventos->set_nivel("1");
		$this->assertEquals("4La fecha de inicio no puede ser mayor a la fecha de cierre", $this->eventos->registrar($this->eventos));
	}
   
}