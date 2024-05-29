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
        return (array) $decoded; // Convertir el objeto a un arreglo para la respuesta JSON
    } catch (Exception $e) {
        // Si hay un error al decodificar el token, se lanza una excepción
        return ['error' => $e->getMessage()];
    }
}

// $data = json_decode(file_get_contents("php://input"));

// // Verifica si se recibieron los datos de token
// if (isset($data->token)) {
//     $t = $data->token;
//     $r = validarTokenJWT($t);
//     echo json_encode($r);
// } else {
//     echo json_encode(['error' => 'Token not provided']);
// }

?>
