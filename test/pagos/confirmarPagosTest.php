<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/pagos.php");


class confirmarPagosTest extends TestCase{

	private $Pagos;

	public function setUp():void{
		$this->Pagos = new pagos();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->Pagos->set_id("3465");
        $this->Pagos->set_id_deudas("58");
        $this->Pagos->set_identificador("1231");
        $this->Pagos->set_concepto("mensualidad");
        $this->Pagos->set_forma("Transf");
        $this->Pagos->set_fecha("2024-01-18");
        $this->Pagos->set_fechad("2023-11-30");
        $this->Pagos->set_estado("Confirmado");
        $this->Pagos->set_estado_pagos("1");
        $this->Pagos->set_monto("1500");
        $this->Pagos->set_meses("1");
              
        $this->Pagos->set_nivel("1");
		$this->assertEquals("1PAGO CONFIRMADO", $this->Pagos->registrarp($this->Pagos));
	}

    //el usuario Ingresa los datos repetidos
	public function testRegistrofallido(){
        $this->Pagos->set_id("9999");
        $this->Pagos->set_id_deudas("58");
        $this->Pagos->set_identificador("1231");
        $this->Pagos->set_concepto("mensualidad");
        $this->Pagos->set_forma("Transf");
        $this->Pagos->set_fecha("2024-01-18");
        $this->Pagos->set_fechad("2023-11-30");
        $this->Pagos->set_estado("Confirmado");
        $this->Pagos->set_estado_pagos("1");
        $this->Pagos->set_monto("1500");
        $this->Pagos->set_meses("1");
              
        $this->Pagos->set_nivel("1");
		$this->assertEquals("4PAGO NO REGISTRADO", $this->Pagos->registrarp($this->Pagos));
	}
    
}