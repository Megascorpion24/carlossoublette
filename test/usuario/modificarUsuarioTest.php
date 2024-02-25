<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/usuarios.php");


class modificarUsuarioTest extends TestCase{

	private $Usuarios;

	public function setUp():void{
		$this->Usuarios = new usuarios();
	}

	

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->Usuarios->set_cedula("28621408");
        $this->Usuarios->set_nombre("arepa");
        $this->Usuarios->set_correo("santi@gmail.com");
        $this->Usuarios->set_contraceña("marial2");
        $this->Usuarios->set_rol("1");
        $this->Usuarios->set_nivel("1");
        
		$this->assertEquals("Registro modificado", $this->Usuarios->modificar($this->Usuarios));
	}
    //el usuario Ingresa los datos noxisten
    public function testRegistroFallido(){
        $this->Usuarios->set_cedula("30019111");
        $this->Usuarios->set_nombre("arepa");
        $this->Usuarios->set_correo("santi@gmail.com");
        $this->Usuarios->set_contraceña("marial2");
        $this->Usuarios->set_rol("1");
        $this->Usuarios->set_nivel("1");
        
		$this->assertEquals("el usuario no esta registrado", $this->Usuarios->modificar($this->Usuarios));
	}

}