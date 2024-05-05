<?php

require_once './mobile/class/login.php';
require_once './JWT/GenerarToken.php';
require_once './mobile/validator/validacion.php';

$login = new login();
$data = json_decode(file_get_contents("php://input"));

// Verifica si se recibieron los datos de usuario y contraseña
if (isset($data->user) && isset($data->password)) {
   
    // Establece los valores de usuario y contraseña
    $username = $data->user;
    $password = $data->password;
   
    $login->set_usuario($username);
    $login->set_clave($password);

    try { 
        validate_string('nameInputs', $username);  
        $entrada = $login->Validate_login();
 
        // Si el resultado es verdadero, crea un token y envía una respuesta JSON
        if ($entrada['success']) {
            $token = generateTokenJWT($entrada['resultado']);
            // Construir el array asociativo para la respuesta JSON
            $data = array(
                'entrada' => $entrada['success'],
                'token' => $token,
                'resultado' => $entrada['resultado'][2]//cedula
            );

            echo json_encode($data);// Convertir el array asociativo a JSON y enviarlo como respuesta
            // http_response_code(200); 200 OK: Indica que la solicitud ha tenido éxito.
           
        } else { 
            //http_response_code(403); 403 Forbidden: Indica que el servidor ha entendido la solicitud, pero se niega a completarla debido a que el cliente no tiene permiso para acceder al recurso solicitado.
            echo json_encode($entrada); 
        }
    } catch (Exception $e) {
        // 500 Internal Server Error: Indica que ha ocurrido un error interno en el servidor mientras procesaba la solicitud.
        // http_response_code(500);
        $exception = json_encode([
            'success' => false,
            'msg' => $e->getMessage()
        ]);
        echo $exception;
    }
} 

 
// ------------------------------------------------------------------------------------------------------
// 400 Bad Request: Indica que la solicitud enviada por el cliente es incorrecta o defectuosa y no puede ser procesada por el servidor.
// 401 Unauthorized: Indica que la solicitud no ha sido aceptada porque el cliente no ha proporcionado las credenciales de autenticación válidas requeridas.
// 404 Not Found: Indica que el servidor no puede encontrar el recurso solicitado. 
// ------------------------------------------------------------------------------------------------------

?>
