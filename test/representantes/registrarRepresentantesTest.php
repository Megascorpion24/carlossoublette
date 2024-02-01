<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/representante.php");


class registrarRepresentantesTest extends TestCase{

	private $representante;

	public function setUp():void{
		$this->representante = new tutor_legal();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->representante->set_cedula("10773956");
        $this->representante->set_nombre1("lucas");
        $this->representante->set_nombre2("mendez");
        $this->representante->set_apellido1("marinez");
        $this->representante->set_apellido2("mujica");
        $this->representante->set_telefono("04123456781");
        $this->representante->set_correo("lucas23@gmail.com");
        $this->representante->set_contacto_emer("04244572134");
        $this->representante->set_nivel("1");
		$this->assertEquals("1REGISTRADO CON EXITO", $this->representante->registrar1($this->representante));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->representante->set_cedula("28621408");
        $this->representante->set_nombre1("lucas");
        $this->representante->set_nombre2("mendez");
        $this->representante->set_apellido1("marinez");
        $this->representante->set_apellido2("mujica");
        $this->representante->set_telefono("04123456781");
        $this->representante->set_correo("lucas23@gmail.com");
        $this->representante->set_contacto_emer("04244572134");
        $this->representante->set_nivel("1");
        
		$this->assertEquals("4CEDULA YA EXISTE", $this->representante->registrar1($this->representante));
	}

	
}