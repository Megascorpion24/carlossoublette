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
			'secciones' =>1,
			'año' =>5,
			'Doc_Guia' =>30019081,
			'cantidad' =>30,
			'ano_academico' =>2
		];
    
        $this->seccion->set_nivel("1");
		 $result=$this->seccion->registrar($datos);
		$this->assertEquals("1Registro incluido", $result,'Error en la prueba:' . $result);
	}

	public function testRegistroFallido(){
		$datos = [
			'secciones' =>3,
			'año' =>5,
			'Doc_Guia' =>30019081,
			'cantidad' =>100,
			'ano_academico' =>2
		];
    
        $this->seccion->set_nivel("1");
		$result=$this->seccion->registrar($datos); 
		$this->assertStringContainsString('La cantidad no esta en el rango', $result);
	}

	public function testRegistroDatosIncorrectos(){
		$datos = [
			'secciones' =>10,
			'año' =>"hjl",
			'Doc_Guia' =>30019081,
			'cantidad' =>10,
			'ano_academico' =>2
		];
    
        $this->seccion->set_nivel("1");
		 $result=$this->seccion->registrar($datos);
		$this->assertEquals("1Registro incluido", $result,'Error en la prueba:' . $result);
	}

	
}