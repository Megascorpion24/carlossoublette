<?php
require_once('../modelo/conexion.php');
 
class login extends datos{
    private $usuario; 
	private $clave;
       
    public function set_usuario($valor){
		$this->usuario = $valor; 
	}
	public function set_clave($valor){
		$this->clave = $valor; 
	} 
 
    public function Validate_login(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{

			$result = $co->prepare("SELECT clave, id_rol, id 
			FROM usuarios 
			WHERE nombre = :usua AND estado = 1;");

			$result->bindParam(':usua',$this->usuario);
			$result->execute();

			$resultado = null; // Inicializa $resultado antes del bucle foreach
			foreach($result as $r){
				$resultado= array($r["clave"],$r["id_rol"],$r["id"]);
            }
            
				$mensaje="";
				$entrada= true;
			   
			//--------------VALIDA USUARIO------------------ 
				if(empty($resultado[1])){ 
					$entrada= false;
					$mensaje="El Usuario ingresado es incorrecto";			
				} else {
					//VALIDA CLAVE
					$verifica = password_verify($this->clave, $resultado[0]);
					if (!$verifica) {
							$entrada= false;
						$mensaje = "La Contraseña ingresada es incorrecta";
					}
				}
			

				 return $retorna= array(
					'success' =>$entrada,
					'msg' =>$mensaje,
					'resultado' => $resultado
				);	
 
		}catch(Exception $e){
			return $e;
		}
	}

}

?>