<?php 
 
require_once('../../modelo/reporte_ingreso.php');
require_once('../JWT/ValidarToken.php');  
 
$r = new reporte_ingreso();
$data = json_decode(file_get_contents("php://input"));

// Verifica si se ha enviado un dato por POST
if (isset($data->token) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  $token = $data->token;

  try {
     $r_json = validarTokenJWT($token);

       if ($r_json->resultado->rol == 3) {
          echo json_encode([
               'success' => true,
               'reportes'=> [
                    "1er"=>$r->consultar1(),               
                    "2do"=>$r->consultar2(),               
                    "3er"=>$r->consultar3(),               
                    "4to"=>$r->consultar4(),               
                    "5to"=>$r->consultar5()               
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
