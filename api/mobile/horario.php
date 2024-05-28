<?php 
 
// require_once('../class/materia.php');
require_once('../../modelo/horario_docente.php');
  
$m = new horario();
  
$data = json_decode(file_get_contents("php://input"));

// Verifica si se ha enviado un dato por POST
if (isset($data->dato)) {
    
  // Captura el dato enviado por POST
  $d = $data->dato;

  // Llama a la función de consulta con el dato recibido
  $n=array("request_app");
  $consulta = $m->consultar_app($n);

  // Imprime la consulta realizada
  echo json_encode($consulta);
} 
 
?>
