<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/docente.php");


class modificarDocentesTest extends TestCase{

	private $Docente;

	public function setUp():void{
		$this->Docente = new docente();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->Docente->set_cedula("10773976");
        $this->Docente->set_nombre("luis");
        $this->Docente->set_apellido("mendez");
        $this->Docente->set_categoria("docente");
        $this->Docente->set_especializacion("fisica");
        $this->Docente->set_fecha("1974-09-13");
        $this->Docente->set_profecion("profesor");
        $this->Docente->set_edad("24");
        $this->Docente->set_años("4");
        $this->Docente->set_correo("lucas23@gmail.com");
        $this->Docente->set_direccion("carrera 15 entre 23 y 24");
        $this->Docente->set_nivel("1");
		$this->assertEquals("Registro modificado", $this->Docente->modificar1($this->Docente));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->Docente->set_cedula("30019076");
        $this->Docente->set_nombre("lucas");
        $this->Docente->set_apellido("mendez");
        $this->Docente->set_categoria("docente");
        $this->Docente->set_especializacion("fisica");
        $this->Docente->set_fecha("1974-09-25");
        $this->Docente->set_profecion("profesor");
        $this->Docente->set_edad("24");
        $this->Docente->set_años("4");
        $this->Docente->set_correo("lucas23@gmail.com");
        $this->Docente->set_direccion("carrera 15 entre 23 y 24");
        $this->Docente->set_nivel("1");
        
		$this->assertEquals("cedula no registrada", $this->Docente->modificar1($this->Docente));
	}

	
}