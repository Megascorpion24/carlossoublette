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

    public function busca(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{

			$resultado = $co->prepare("SELECT clave, id_rol, id 
			FROM usuarios 
			WHERE nombre = :usua AND estado = 1;");

			$resultado->bindParam(':usua',$this->usuario);
			$resultado->execute();

			foreach($resultado as $r){
				$fila= array($r["clave"],$r["id_rol"],$r["id"]);

            }
            //DATOS
			if (!empty($fila[0])) {
				return $fila;
			}
			else{
				$fila=array("El usuario ingresado es incorrecto");
				return $fila;
			}

 
		}catch(Exception $e){
			return $e;
		}
	}

}

?>