<?php
require 'vendor/autoload.php';

function encryptData($data, $publicKey) {
    $publicKeyResource = openssl_pkey_get_public($publicKey);
    
    if (!$publicKeyResource) {
        die('Clave pública no válida');
    }

    $encryptedData = '';
    openssl_public_encrypt($data, $encryptedData, $publicKeyResource);
    openssl_free_key($publicKeyResource);

    return base64_encode($encryptedData);
}

use Firebase\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable("../carlossoublette/");
$dotenv->load();


if (!is_file("modelo/" . $pagina . ".php")) {

	echo "Falta definir la clase " . $pagina;
	exit;
}
require_once("modelo/" . $pagina . ".php");


if (is_file("vista/" . $pagina . ".php")) {

	$publicKeyPath = 'modelo/public_key.pem';

	// Leer el contenido del archivo
	$publicKey = file_get_contents($publicKeyPath);

	// Verificar que se ha leído correctamente
	if ($publicKey === false) {
		die('No se pudo leer el archivo de la clave pública.');
	}

	// Ruta al archivo de la clave privada
	$privateKeyPath = 'modelo/private_key.pem';

	// Leer el contenido del archivo
	$privateKey = file_get_contents($privateKeyPath);

	// Verificar que se ha leído correctamente
	if ($privateKey === false) {
		die('No se pudo leer el archivo de la clave privada.');
	}


	if (!empty($_POST)) {

		$o = new entrada();
		if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['user'])) {
			$encryptedData = encryptData($_POST['user'], $publicKey);
			$o->set_usuario($encryptedData, $privateKey );
		}


		$mensaje = "";

		$resultado = $o->busca();
		$entrada = true;
		if (empty($resultado[1])) {
			$entrada = false;
			$mensaje = "El usuario ingresado es incorrecto";
			$o->bitacora1("se intento ingresar al sistema", "login", "0000");
		}

		$verifica = password_verify($_POST['password'], $resultado[0]);
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
