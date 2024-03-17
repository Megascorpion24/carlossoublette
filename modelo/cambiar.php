<?php

require_once('modelo/conexion.php');
class cambiar extends datos
{
	private $usuario;
	private $clave;
	private $url;
	private $nivel;

	public function set_usuario($valor)
	{
		$this->usuario = $valor;
	}
	public function set_clave($valor){
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
		$this->clave = $valor; 
        return true;
        }else{
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
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$claveencr = password_hash($this->clave, PASSWORD_DEFAULT, ['cost' => 10]);
			$r = $co->prepare("Update usuarios set           
                      
                        clave=:clave
                     
                       
                        where
						clave =:url
                                  
                        ");


			$r->bindParam(':url',$this->url);
			$r->bindParam(':clave', $claveencr);



			$r->execute();

			$this->bitacora("se modifico un usuario", "recuperar", $this->nivel);
			return "Registro modificado";
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
