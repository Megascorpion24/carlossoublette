<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/pagos.php");


class registrarPagosTest extends TestCase{

	private $Pagos;

	public function setUp():void{
		$this->Pagos = new pagos();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->Pagos->set_id_deudas("57");
        $this->Pagos->set_identificador("3456742");
        $this->Pagos->set_concepto("inscripcion");
        $this->Pagos->set_forma("Transf");
        $this->Pagos->set_fecha("2024-01-18");
        $this->Pagos->set_fechad("2023-10-30");
        $this->Pagos->set_estado("Confirmado");
        $this->Pagos->set_estado_pagos("1");
        $this->Pagos->set_monto("2250");
        $this->Pagos->set_meses("1");
              
        $this->Pagos->set_nivel("1");
		$this->assertEquals("1PAGO REGISTRADO CON EXITO", $this->Pagos->registrar($this->Pagos));
	}

    //el usuario Ingresa los datos repetidos
	public function testRegistrofallido(){
        $this->Pagos->set_id_deudas("57");
        $this->Pagos->set_identificador("3456742");
        $this->Pagos->set_concepto("inscripcion");
        $this->Pagos->set_forma("Transf");
        $this->Pagos->set_fecha("2024-01-18");
        $this->Pagos->set_fechad("2023-10-30");
        $this->Pagos->set_estado("Confirmado");
        $this->Pagos->set_estado_pagos("1");
        $this->Pagos->set_monto("2250");
        $this->Pagos->set_meses("1");
             
        $this->Pagos->set_nivel("1");
		$this->assertEquals("4EL PAGO YA SE ENCUENTRA REGISTRADO", $this->Pagos->registrar($this->Pagos));
	}
    
}