<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/representante.php");


class modificarRepresentantesTest extends TestCase{

	private $representante;

	public function setUp():void{
		$this->representante = new tutor_legal();
	}

	//el usuario Ingresa los datos correctos
	public function testModificacionExitosa(){
        $this->representante->set_cedula("10773956");
        $this->representante->set_nombre1("jorge");
        $this->representante->set_nombre2("mendez");
        $this->representante->set_apellido1("camilo");
        $this->representante->set_apellido2("mujica");
        $this->representante->set_telefono("04123456781");
        $this->representante->set_correo("lucas23@gmail.com");
        $this->representante->set_contacto_emer("04244572134");
        $this->representante->set_nivel("1");
		$this->assertEquals("Registro modificado", $this->representante->modificar1($this->representante));
	}
    //el usuario Ingresa los datos ya registrados
    public function testModificacionFallida(){
        $this->representante->set_cedula("111111111");
        $this->representante->set_nombre1("lucas");
        $this->representante->set_nombre2("mendez");
        $this->representante->set_apellido1("marinez");
        $this->representante->set_apellido2("mujica");
        $this->representante->set_telefono("04123456781");
        $this->representante->set_correo("lucas23@gmail.com");
        $this->representante->set_contacto_emer("04244572134");
        $this->representante->set_nivel("1");
        
		$this->assertEquals("cedula no registrada", $this->representante->modificar1($this->representante));
	}

	
}