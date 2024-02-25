<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/pagos.php");


class seliminarPagosTest extends TestCase{

	private $Pagos;

	public function setUp():void{
		$this->Pagos = new pagos();
	}

	//el usuario Ingresa los datos correctos
	public function testEliminarExitoso(){
        $this->Pagos->set_id("3464");
       
              
        $this->Pagos->set_nivel("1");
		$this->assertEquals("3REGISTRO ELIMINADO", $this->Pagos->eliminar($this->Pagos));
	}

    //el usuario Ingresa los datos repetidos
	public function testEliminarfallido(){
        $this->Pagos->set_id("99999");
        
             
        $this->Pagos->set_nivel("1");
		$this->assertEquals("4REGISTRO NO EXISTE", $this->Pagos->eliminar($this->Pagos));
	}
    
}