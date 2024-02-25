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

		$this->representante->set_cedula("28621409");

		$this->assertEquals("3REGISTRO ELIMINADO", $this->representante->eliminar1($this->representante));
	}

	public function testEliminarFalla()
	{

		$this->representante->set_cedula("30019076");

		$this->assertEquals("4REGISTRO NO EXISTE", $this->representante->eliminar1($this->representante));
	}
}
