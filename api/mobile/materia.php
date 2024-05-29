<?php 
 
require_once('../../modelo/materia.php');
require_once('../JWT/ValidarToken.php');  
 
$m = new materias();
$data = json_decode(file_get_contents("php://input"));

// Verifica si se ha enviado un dato por POST
if (isset($data->token)){

  $token = $data->token;

  try {
     $r_json = validarTokenJWT($token);

       if ($r_json->resultado->rol == 3) {
          echo json_encode([
               'success' => true,
               'resultado'=> $m->consultar(array("request_app"))
           ]);
       } else {
           echo json_encode(['success' => false, 'msg' => 'Unauthorized role']);
       }

  } catch (Exception $e) {
    
    $exception = json_encode([
      'success' => false,
      'msg' => $e->getMessage()
  ]);
  echo $exception;
  }

} else {
    echo json_encode(['error' => 'Token not provided']);
}

 
?>
