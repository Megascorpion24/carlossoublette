<?php 
//Carga las librerias Primero 
require_once('../../../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../..');
$dotenv->load(); 
require_once('../../../modelo/recuperar.php');
//encriptamiento
require_once '../../auth/security.php';

$r = new recuperar();
$data = json_decode(file_get_contents("php://input"));

// Verifica si se ha enviado un dato por POST
if (isset($data->User) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $User = $data->User;
    // $User = decryptData(base64_decode($data->User));
     
    try {
    preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $User)
    ? $r->set_usuario($User) 
    : throw new InvalidArgumentException("El usuario no cumple con el formato permitido");

    $resultado = $r->busca(); 
       $codigo = $r->get_codigo();
    //    echo json_encode($codigo);
        // Procesar el resultado usando operador ternario en json_encode
        echo json_encode(
        $resultado
            ? ['success' => true, 'resultado' => $codigo]
            : ['success' => false, 'msg' => $resultado]
        );
       
    } catch (Exception $e) {
        echo $exception = json_encode([
        'success' => false,
        'msg' => $e->getMessage()
         ]);
    }

} 

if (isset($data->Usuario) && isset($data->Codigo) &&  $_SERVER['REQUEST_METHOD'] == 'POST') {
    // $Usuarios = decryptData(base64_decode($data->Usuario));
    // $Codigo =  decryptData(base64_decode($data->codigo));
    $Usuario =$data->Usuario;
    $Codigo =$data->Codigo;
    require_once('confirmar.php');
    $c = new confirmar();
    $msj=$c->confirmar_code($Usuario,$Codigo);

    echo $msj;
}

