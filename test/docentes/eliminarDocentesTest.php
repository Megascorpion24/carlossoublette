<?php

use PHPUnit\Framework\TestCase;

require_once("./modelo/docente.php");


class eliminarDocentesTest extends TestCase
{

	private $docente;

	public function setUp(): void
	{
		$this->docente = new docente();
	}


	public function testEliminarExito()
	{

		$this->docente->set_cedula("30019082");

		$this->assertEquals("3Registro Eliminado", $this->docente->eliminar1($this->docente));
	}

	public function testEliminarFalla()
	{

		$this->docente->set_cedula("30019076");

		$this->assertEquals("4Cedula no registrada o este docente esta siendo utilizado en otro modulo",
		 $this->docente->eliminar1($this->docente));
	}
}
