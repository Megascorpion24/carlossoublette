<?php

use PHPUnit\Framework\TestCase;

require_once("./modelo/horario_docente.php");


class eliminarHorariosTest extends TestCase
{

	private $horario;

	public function setUp(): void
	{
		$this->horario = new horario();
	}


	public function testEliminarExito()
	{

		$this->horario->set_id("18");

		$this->assertEquals("3Registro Eliminado", $this->horario->eliminar($this->horario));
	}

	public function testEliminarFalla()
	{

		$this->horario->set_id("456");

		$this->assertEquals("4Clase no registrada", $this->horario->eliminar($this->horario));
	}
}
