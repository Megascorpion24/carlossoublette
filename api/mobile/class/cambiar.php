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
 
            return ['change'=>true, 'msj'=>"La clave fue cambiada con exito "];
        } catch (Exception $e) {
            return ['change'=>false,'msj'=>$e->getMessage()];
        }
    }
}

$data = json_decode(file_get_contents("php://input"));

if (isset($data->Usuario) && isset($data->Clave) && isset($data->Code)) {
    $User = $data->Usuario;
    $Clave = $data->Clave;
    $Code = $data->Code;

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
