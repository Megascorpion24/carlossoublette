<?php

use PHPUnit\Framework\TestCase;

require_once("./modelo/representante.php");


class eliminarRepresentantesTest extends TestCase
{

	private $representante;

	public function setUp(): void
	{
		$this->representante = new tutor_legal();
	}


	public function testEliminarExito()
	{

		$this->representante->set_cedula("10773976");

		$this->assertEquals("Registro Eliminado", $this->representante->eliminar1($this->representante));
	}

	public function testEliminarFalla()
	{

		$this->representante->set_cedula("30019076");

		$this->assertEquals("Cedula no registrada", $this->representante->eliminar1($this->representante));
	}
}
