<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/ano_academico.php");


class modificarAno_academicoTest extends TestCase{

	private $ano_academico;

	public function setUp():void{
		$this->ano_academico = new ano_academico();
	}

	//el usuario Ingresa los datos correctos
	public function testModificacionExitoso(){
   
        $this->ano_academico->set_id("3");
        $this->ano_academico->set_fecha_cierr("2024-12-31");
        $this->ano_academico->set_fecha_ini("2023-12-02");
        $this->ano_academico->set_ano_academico("2023-2025");
        
        $this->ano_academico->set_nivel("1");
		$this->assertEquals("Registro modificado", $this->ano_academico->modificar($this->ano_academico));
	}

    public function testModificacionfallido(){
   
        $this->ano_academico->set_id("6");
        $this->ano_academico->set_fecha_cierr("2024-12-31");
        $this->ano_academico->set_fecha_ini("2023-12-02");
        $this->ano_academico->set_ano_academico("2023-2024");
        
        $this->ano_academico->set_nivel("1");
		$this->assertEquals("Año no registrado", $this->ano_academico->modificar($this->ano_academico));
	}
   
}