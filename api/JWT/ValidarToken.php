<?php 

require_once(__DIR__ . '/../../vendor/autoload.php');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

function validarTokenJWT($token) {
    try {
        $key = $_ENV['JWT_SECRET_KEY'];
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        return $decoded; 
    } catch (Exception $e) {
        // Si hay un error al decodificar el token, se lanza una excepción
        throw new Exception($e->getMessage());
    }
}

?>
