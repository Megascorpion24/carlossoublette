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
      
		$this->assertEquals("Registro Eliminado", $this->Usuarios->eliminar1($this->Usuarios));
	}

	public function testEliminarFalla(){
        
        $this->Usuarios->set_cedula("30019111");
      
		$this->assertEquals("Usuario no registrado", $this->Usuarios->eliminar1($this->Usuarios));
	}
	
}