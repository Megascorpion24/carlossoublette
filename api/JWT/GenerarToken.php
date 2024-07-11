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
						'rol'	=>	$resultado[1],// id_rol
						'user'	=>	$resultado[2],// nombre
						//NOTA: no mas datos,xq sino muy largo para encriptar
						// 'email'=>	$resultado[3] // correo
					)
				),$key,'HS256'
			);

    return $token;
}


?>