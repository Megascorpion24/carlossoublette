<?php 
 
require_once('../../modelo/reporte_ingreso.php');
require_once('../JWT/ValidarToken.php');  
 
$r = new reporte_ingreso();
$data = json_decode(file_get_contents("php://input"));

// Verifica si se ha enviado un dato por POST
if (isset($data->token)){
  $token = $data->token;

  try {
     $r_json = validarTokenJWT($token);

       if ($r_json->resultado->rol == 3) {
          echo json_encode([
               'success' => true,
               'resultado'=> [
                    "Repo1"=>$r->consultar1(),               
                    "Repo2"=>$r->consultar2(),               
                    "Repo3"=>$r->consultar3(),               
                    "Repo4"=>$r->consultar4(),               
                    "Repo5"=>$r->consultar5()               
               ]
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
