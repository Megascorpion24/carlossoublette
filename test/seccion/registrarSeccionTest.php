<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seccion.php");


class registrarSeccionTest extends TestCase{

	private $seccion;

	public function setUp():void{
		$this->seccion = new secciones();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
		$datos = [
			'secciones' =>8,
			'año' =>5,
			'Doc_Guia' =>30019081,
			'cantidad' =>30,
			'ano_academico' =>2
		];
    
        $this->seccion->set_nivel("1");
		 $result=$this->seccion->registrar($datos);
		$this->assertEquals("1Registro incluido", $result,'Error en la prueba:' . $result);
	}
	
}