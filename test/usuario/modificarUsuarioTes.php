<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/usuarios.php");


class modificarUsuarioTest extends TestCase{

	private $Usuarios;

	public function setUp():void{
		$this->Usuarios = new usuarios();
	}

	

	public function testModificarExito(){
        $this->Usuarios->set_nombre("vegetales");
        $this->Usuarios->set_correo("santi@gmail.com");
        $this->Usuarios->set_id("75");
        $this->Usuarios->set_contraceña("marial2");
        $this->Usuarios->set_rol("1");
        $this->Usuarios->set_nivel("1");
        
		$this->assertEquals("Registro modificado", $this->Usuarios->modificar1($this->Usuarios));
	}

    public function testModificarFalla(){
        $this->Usuarios->set_nombre("vegetales");
        $this->Usuarios->set_correo("santi@gmail.com");
        $this->Usuarios->set_id("120");
        $this->Usuarios->set_contraceña("marial2");
        $this->Usuarios->set_rol("1");
        $this->Usuarios->set_nivel("1");
        
		$this->assertEquals("el usuario no esta registrado", $this->Usuarios->modificar1($this->Usuarios));
	}
	
	
}