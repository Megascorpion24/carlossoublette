<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/pagos.php");


class eliminarPagosTest extends TestCase{

	private $Pagos;

	public function setUp():void{
		$this->Pagos = new pagos();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->Pagos->set_id("3467");
       
              
        $this->Pagos->set_nivel("1");
		$this->assertEquals("Registro Eliminado", $this->Pagos->eliminar($this->Pagos));
	}

    //el usuario Ingresa los datos repetidos
	public function testRegistrofallido(){
        $this->Pagos->set_id("99999");
        
             
        $this->Pagos->set_nivel("1");
		$this->assertEquals("Pago no registrado", $this->Pagos->eliminar($this->Pagos));
	}
    
}