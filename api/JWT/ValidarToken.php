<?php 

require ('../vendor/autoload.php');
use Firebase\JWT\JWT;

function validarTokenJWT($token) {
    try {
        $key = $_ENV['JWT_SECRET_KEY'];
        $decoded = JWT::decode($token, $key, array('HS256'));
        return $decoded;
    } catch (Exception $e) {

        $e->getMessage();
        // Si hay un error al decodificar el token, se lanza una excepción
        return null;
    }
}


?>