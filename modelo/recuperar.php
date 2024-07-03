<?php

// namespace Modelo\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);

require_once('Mail/correo.php');  
require_once('conexion.php');  

class recuperar extends datos
{
	use Envio_Correo;

	private $usuario;
	private $correo;
	private $token;
	private $codigo;
	private $tiempo;
	private $request = 1;

	public function set_usuario($valor)
	{
		$this->usuario = $valor;
	}

	public function get_codigo(): int{
        return $this->codigo;
    }
	
	public function __construct() {
		$this->codigo = random_int(100000, 999999);
		$this->token = bin2hex(random_bytes(32));
		$this->tiempo = date('Y-m-d H:i:s', time() + 300);
	}

	public function busca()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$resultado = $co->prepare("SELECT usuarios.correo FROM usuarios WHERE usuarios.nombre =:usua AND usuarios.estado = 1");
			$resultado->bindParam(':usua', $this->usuario);
			$resultado->execute();

			if ($resultado->rowCount() > 0) {

				// $fila = $resultado->fetch(PDO::FETCH_ASSOC);
				$r = $co->prepare("UPDATE usuarios SET token = :token,codigo= :codigo,
				 request_password = :request_password,
				 expirar = :expirar
				   WHERE nombre = :usua AND estado = 1");
				$r->bindParam(':token', $this->token);
				$r->bindParam(':codigo', $this->codigo);
				$r->bindParam(':request_password', $this->request);
				$r->bindParam(':expirar', $this->tiempo);
				$r->bindParam(':usua', $this->usuario);
				$r->execute();
 
				$resultado2 = $co->prepare("SELECT usuarios.correo, usuarios.token ,usuarios.codigo FROM usuarios WHERE usuarios.nombre = :usua AND usuarios.estado = 1");
				$resultado2->bindParam(':usua', $this->usuario);
				$resultado2->execute();
				$fila = $resultado2->fetch(PDO::FETCH_ASSOC);
				$this->correo= $fila['correo'];
				$this->Correo(); 
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			return $e;
		}
	}	
	
	public function bitacora1($accion, $modulo, $id)
	{
		$var = $this->bitacora($accion, $modulo, $id);
	}

	private function bitacora($accion, $modulo, $id)
	{
		try {
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			parent::registrar_bitacora($accion, $modulo, $id);;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
