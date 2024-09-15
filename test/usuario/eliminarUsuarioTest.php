<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/usuarios.php");


class eliminarUsuarioTest extends TestCase{

	private $Usuarios;

	public function setUp():void{
		$this->Usuarios = new usuarios();
	}

	
	public function testEliminarExito(){
        
        $this->Usuarios->set_cedula("28621409");
      
		$this->assertEquals("3Registro Eliminado", $this->Usuarios->eliminar1($this->Usuarios));
	}

	public function testEliminarFalla(){
        
        $this->Usuarios->set_cedula("30019114");
      
		$this->assertEquals("4Usuario no registrado", $this->Usuarios->eliminar1($this->Usuarios));
	}
	
}