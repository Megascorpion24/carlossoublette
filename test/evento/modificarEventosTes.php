<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/eventos.php");


class modificarEventosTest extends TestCase{

	private $eventos;

	public function setUp():void{
		$this->eventos = new eventos();
	}

	//el usuario Ingresa los datos correctos
	public function testmodificacionExitoso(){
        $this->eventos->set_id("2");
        $this->eventos->set_evento("SegundoLapso");
        $this->eventos->set_fecha_cierr("2024-02-29");
        $this->eventos->set_fecha_ini("2023-12-02");
        $this->eventos->set_ano_academico("2");
        
        $this->eventos->set_nivel("1");
		$this->assertEquals("Registro modificado", $this->eventos->modificar($this->eventos));
	}

    public function testModificacionFallido(){
        $this->eventos->set_id("7");
        $this->eventos->set_evento("TercerLapso");
        $this->eventos->set_fecha_cierr("2024-02-31");
        $this->eventos->set_fecha_ini("2023-12-02");
        $this->eventos->set_ano_academico("2");
        
        $this->eventos->set_nivel("1");
		$this->assertEquals("Evento no registrado", $this->eventos->modificar($this->eventos));
	}
   
}