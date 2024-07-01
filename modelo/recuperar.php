<?php

require_once('modelo/conexion.php');
class recuperar extends datos
{
	private $usuario;


	public function set_usuario($valor)
	{
		$this->usuario = $valor;
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
				$fila = $resultado->fetch(PDO::FETCH_ASSOC);

				$token = bin2hex(random_bytes(32));
				$request = "1";
				$tiempo = date('Y-m-d H:i:s', time() + 300);
				$r = $co->prepare("UPDATE usuarios SET token = :token,
				 request_password = :request_password,
				 expirar = :expirar
				   WHERE nombre = :usua AND estado = 1");
				$r->bindParam(':token', $token);
				$r->bindParam(':request_password', $request);
				$r->bindParam(':expirar', $tiempo);
				$r->bindParam(':usua', $this->usuario);
				$r->execute();

				$resultado2 = $co->prepare("SELECT usuarios.correo, usuarios.token FROM usuarios WHERE usuarios.nombre = :usua AND usuarios.estado = 1");
				$resultado2->bindParam(':usua', $this->usuario);
				$resultado2->execute();
				$fila = $resultado2->fetch(PDO::FETCH_ASSOC);
				return array($fila['correo'], $fila['token']);
			} else {
				return "El usuario ingresado no existe";
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
