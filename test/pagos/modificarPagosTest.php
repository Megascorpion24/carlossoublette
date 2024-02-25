<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/pagos.php");


class modificarPagosTest extends TestCase{

	private $Pagos;

	public function setUp():void{
		$this->Pagos = new pagos();
	}

	//el usuario Ingresa los datos correctos
	public function testModificacionExitoso(){
        $this->Pagos->set_id("3464");
        $this->Pagos->set_id_deudas("58");
        $this->Pagos->set_identificador("1231");
        $this->Pagos->set_concepto("mensualidad");
        $this->Pagos->set_forma("Transf");
        $this->Pagos->set_fecha("2024-01-18");
        $this->Pagos->set_fechad("2023-11-30");
        $this->Pagos->set_estado("Pendiente");
        $this->Pagos->set_estado_pagos("1");
        $this->Pagos->set_monto("1500");
        $this->Pagos->set_meses("1");
              
        $this->Pagos->set_nivel("1");
		$this->assertEquals("2REGISTRO MODIFICADO", $this->Pagos->modificar($this->Pagos));
	}

    //el usuario Ingresa los datos repetidos
	public function testModificacionfallido(){
        $this->Pagos->set_id("99999");
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
		$this->assertEquals("4PAGO NO REGISTRADO", $this->Pagos->modificar($this->Pagos));
	}
    
}