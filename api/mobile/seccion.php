<?php

require_once('../../modelo/seccion.php');
require_once('../JWT/ValidarToken.php');

$s = new secciones();

$data = json_decode(file_get_contents("php://input"));

// Verifica si se ha enviado un dato por POST
if (isset($data->token) && isset($data->request)) {
  $token = $data->token;
  $request = $data->request;
  $id = isset($data->id) ? $data->id : null;

  try {
    $r_json = validarTokenJWT($token);

    if ($r_json->resultado->rol == 3 || $r_json->resultado->rol == 19) {
      switch($request) {
        case 'secciones':
          echo json_encode([
            'success' => true,
            'resultado' => $s->consultar(array("request_app"))
          ]);
          break;
        case 'estudiantes':
          echo json_encode([
            'success' => true,
            'resultado' => Consulta_Estudiantes($id)
          ]);
          break;
        default:
          break;
      }
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

function Consulta_Estudiantes($id) {
  global $s;
  $a = array(); // Inicializa la variable $a como un array vacío

  $resultado = $s->consulta_E($id);
  foreach($resultado as $valores) {
    $a[] = array(
      'cedula' => $valores['cedula'],
      'nombre' => $valores['nombre'],
      'apellido' => $valores['apellido'],
      'edad' => $valores['edad'],
      'observaciones' => $valores['observaciones']
    );
  }

  return $a; // Devuelve el array directamente
}
?>
