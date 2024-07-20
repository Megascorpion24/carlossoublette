<?php
require_once('../../../modelo/conexion.php');
require_once '../../auth/security.php';
require_once('confirmar.php');

class New_Password extends datos {
    private $usuario;
    private $clave;

    public function __construct($Usuario, $Clave) {
        $this->usuario = $Usuario;
        $this->clave = $Clave;
    }

    public function Cambiar_clave() {
        return $this->Cambiar();
    }

    private function Cambiar() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
        $Clave = password_hash($this->clave, PASSWORD_DEFAULT, ['cost' => 10]);

            $r = $co->prepare("UPDATE usuarios SET clave = :clave, request_password = 0 WHERE nombre = :usuario");
            $r->bindParam(':usuario', $this->usuario);
            $r->bindParam(':clave', $Clave);
            $r->execute();
            
            // Selecciona el ID del usuario para registrar en la bitácora
            $re = $co->prepare("SELECT id FROM `usuarios` WHERE nombre = :nombre LIMIT 1");
            $re->bindParam(':nombre', $this->usuario);
            $re->execute();
            $usuario = $re->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                parent::registrar_bitacora("Cambio de contraseña", "recuperar", $usuario['id']);
            }

            return ['change' => true, 'msj' => "La clave fue cambiada con éxito"];
        } catch (Exception $e) {
            return ['change'=>false,'msj'=>$e->getMessage()];
        }
    }
}

$data = json_decode(file_get_contents("php://input"));

if (isset($data->Usuario) && isset($data->Clave) && isset($data->Code) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $User = decryptData(base64_decode($data->Usuario));
    $Clave = decryptData(base64_decode($data->Clave));
    $Code = decryptData(base64_decode($data->Code));

    $confirmar = new confirmar();
    $resp = $confirmar->confirmar_code($User, $Code);
    $respData = json_decode($resp, true);

    if ($respData['success']) {
        $c = new New_Password($User, $Clave);
        $result = $c->Cambiar_clave();
        echo json_encode($result);
    } 
    else{
        echo json_encode($respData);

    }

   
}

?>
