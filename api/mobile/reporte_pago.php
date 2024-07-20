<?php 
 
// require_once('../../modelo/reporte_pagos.php');
require_once('../../modelo/conexion.php');
require_once('./class/Reporte_pago.php');
require_once('../JWT/ValidarToken.php');  
 
$data = json_decode(file_get_contents("php://input"));


$rp = new reporte_pagos();

// Verifica si se ha enviado un dato por POST
if (isset($data->token) && $_SERVER['REQUEST_METHOD'] == 'POST'){
  $token = $data->token;

  try {
     $r_json = validarTokenJWT($token);
       if ($r_json->resultado->rol == 3) {
          echo json_encode([
               'success' => true,
               'reportes'=> [
                  "consulta1" => $rp->consultar6(),
                  "consulta2" => $rp->consultar7(),
                  "consulta3" => $rp->consultar9(),
                        
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
