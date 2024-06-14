<?php
require 'vendor/autoload.php';



use Firebase\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable("../carlossoublette/");
$dotenv->load();


if (!is_file("modelo/" . $pagina . ".php")) {

	echo "Falta definir la clase " . $pagina;
	exit;
}
require_once("modelo/" . $pagina . ".php");


if (is_file("vista/" . $pagina . ".php")) {

	if (!empty($_POST)) {



		$o = new entrada();
		if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['user'])) {
			
			$o->set_usuario(  $_POST['user'] );
		}


		$mensaje = "";

		$resultado = $o->busca();
		$entrada = true;
		if (empty($resultado[1])) {
			$entrada = false;
			$mensaje =  "usuario incorrecto " ;
			$o->bitacora1("se intento ingresar al sistema", "login", "0000");
		}
		$cexryp=$o ->decryptMessage($_POST['password']);
		$verifica = password_verify($cexryp, $resultado[0]);
		if ($mensaje == "") {

			if (!$verifica) {
				$entrada = false;
				$mensaje = "La contraceña ingresada es incorrecta";
				$o->bitacora1("se intento ingresar al sistema", "login", "0000");
			}
		}



		if ($entrada) {
			$permisos = $o->permisos($resultado[1]);
			if ($permisos != "ha ocurrido un error") {

				session_start();

				$key = $_ENV['JWT_SECRET_KEY'];
				$token = JWT::encode(
					array(
						'iat'		=>	time(),
						'nbf'		=>	time(),
						'exp'		=>	time() + 3600,
						'resultado'	=> array(
							'user'	=>	$resultado[2],
							'rol'	=>	$resultado[1]
						)
					),
					$key,
					'HS256'
				);
				setcookie("token", $token, time() + 3600, "/", "", true, true);



				$_SESSION['usuario'] = $resultado[2];
				$_SESSION['rol'] = $resultado[1];
				$_SESSION['permisos'] = $permisos;
				$pagina = "principal";
		
			} else {
				echo $permisos;
			}
		}
	}





	require_once("vista/" . $pagina . ".php");
} else {
	echo "PAGINA EN CONSTRUCCION";
}
