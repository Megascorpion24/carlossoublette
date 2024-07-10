<?php

require_once('modelo/conexion.php');
class cambiar extends datos
{

	private $clave;
	private $url;
	private $nivel;


	public function set_clave($valor)
	{
		$cexryp=$this->decryptMessage($valor );
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $cexryp)) {
            $this->clave = $cexryp;
            return true;
		} else {
			return false;
		}
	}
	public function set_url($valor)
	{
		$this->url = $valor;
	}
	public function set_nivel($valor)
	{
		$this->nivel = $valor;
	}

	public function cambiar()
	{
		$val = $this->cambiar1();
		return $val;
	}

	public function expiracion()
	{
		$val = $this->expiracion1();
		return $val;
	}


	private function expiracion1()
	{

		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			
			$resultado = $co->prepare("SELECT * FROM usuarios WHERE token = :ur AND usuarios.estado = 1");
			$resultado->bindParam(':ur', $this->url);
			$resultado->execute();
			$row = $resultado->fetch(PDO::FETCH_ASSOC);
			$expirar = ($row['expirar']);
			$request = ($row['request_password']);
			$current_date = date('Y-m-d H:i:s');

			if ($expirar < $current_date OR $request == 0) {
				$r = $co->prepare("Update usuarios set           
                      
                        request_password=0
                     
                       
                        where
						token =:url
                                  
                        ");


			$r->bindParam(':url', $this->url);
			$r->execute();
				return "token expirado";
			} else {
				return "token valido";
			}
		} catch (Exception $e) {
			return $e;
		}
	}


	private function cambiar1()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			
			$claveencr = password_hash($this->clave, PASSWORD_DEFAULT, ['cost' => 10]);
			$r = $co->prepare("Update usuarios set           
                      
                        clave=:clave,
                    	request_password=0
                       
                        where
						token =:url
                                  
                        ");


			$r->bindParam(':url', $this->url);
			$r->bindParam(':clave', $claveencr);



			$r->execute();

			$this->bitacora("se modifico un usuario", "recuperar", $this->nivel);
			return "La clave fue cambiada con existo! ";
		} catch (Exception $e) {
			return $e->getMessage();
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
