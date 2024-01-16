<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/usuarios.php");


class registrarUsuarioTest extends TestCase{

	private $Usuarios;

	public function setUp():void{
		$this->Usuarios = new usuarios();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->Usuarios->set_nombre("arepa");
        $this->Usuarios->set_correo("santi@gmail.com");
     
        $this->Usuarios->set_contraceña("marial2");
        $this->Usuarios->set_rol("1");
        $this->Usuarios->set_nivel("1");
        
		$this->assertEquals("Registro incluido", $this->Usuarios->registrar1($this->Usuarios));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->Usuarios->set_nombre("admin");
        $this->Usuarios->set_correo("jesusfob2021@gmail.com");

        $this->Usuarios->set_contraceña("marial2");
        $this->Usuarios->set_rol("1");
        $this->Usuarios->set_nivel("1");
        
		$this->assertEquals("nombre registrado", $this->Usuarios->registrar1($this->Usuarios));
	}

	
}