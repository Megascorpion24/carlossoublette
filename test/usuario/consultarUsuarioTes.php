<?php 
use PHPUnit\Framework\TestCase;
require_once("./modelo/usuarios.php");


class consultarUsuarioTest extends TestCase{

	private $Usuarios;

	public function setUp():void{
		$this->Usuarios = new usuarios();
	}

	
	//productos consultados correctamente
	public function testConsultaExitosa()
{
    $usuarios = $this->Usuarios->consultar(array(1));
    $expected_usuarios = '<th>27</th><th>superusuario</th><th>admin</th><th>jesusfob2021@gmail.com</th><th></th></tr><th>32</th><th>tutor</th><th>manuel</th><th>manuel@gmail.com</th><th></th></tr><th>33</th><th>tutor</th><th>jesus</th><th>jesus@gmail.com</th><th></th></tr>';
    $this->assertEquals($expected_usuarios, $usuarios);
}
}