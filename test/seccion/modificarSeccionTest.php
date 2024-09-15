<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/seccion.php");


class modificarSeccionTest extends TestCase{

	private $seccion;

	public function setUp():void{
		$this->seccion = new secciones();
	}

	//el usuario Ingresa los datos correctos
	public function testModificacionExitoso(){
		$datos = [
			'id' => 40,
			'secciones' =>10,
			'año' =>3,
			'Doc_Guia' =>28276731,
			'cantidad' =>15,
			'ano_academico' =>2 
		];
	       
        $this->seccion->set_nivel("1");
		$result= $this->seccion->modificar($datos);
		$this->assertEquals("2Registro Modificado", $result,'Error en la prueba:' . $result);
	}
	
}