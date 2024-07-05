<?php 
//Carga las librerias Primero 
require_once('../../../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../..');
$dotenv->load(); 
require_once('../../../modelo/recuperar.php');
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
   
        echo json_encode(
        $resultado
            ? ['success' => true, 'codigo' => $codigo]
            : ['success' => false, 'msg' =>'El Usuario no existe']
        );
       
    } catch (Exception $e) {
        echo $exception = json_encode([
        'success' => false,
        'msg' => $e->getMessage()
         ]);
    }

} 



