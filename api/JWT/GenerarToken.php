<?php
  
require_once('../vendor/autoload.php');
use Firebase\JWT\JWT;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

function generateTokenJWT($resultado){
    $key = $_ENV['JWT_SECRET_KEY'];
		$token = JWT::encode(
				array(
					'iat'		=>	time(),
					'nbf'		=>	time(),
					'exp'		=>	time() + 3600,
					'resultado'	=> array(
						'user'	=>	$resultado[2],// cedula ejemplo 2827479
						'rol'	=>	$resultado[1] // varia del 1 al 100
					)
				),$key,'HS256'
			);

    return $token;
}


?>