<?php

require_once('modelo/conexion.php');
class recuperar extends datos{
    private $usuario;
	

    public function set_usuario($valor){
		$this->usuario = $valor; 
	}
	
	public function busca(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			$resultado = $co->prepare("SELECT usuarios.correo, usuarios.clave FROM usuarios WHERE usuarios.nombre =:usua AND usuarios.estado = 1");
			$resultado->bindParam(':usua', $this->usuario);
			$resultado->execute();
	
			if($resultado->rowCount() > 0){
				$fila = $resultado->fetch(PDO::FETCH_ASSOC);
				return array($fila['correo'], $fila['clave']);
			}else{
				return "El usuario ingresado no existe";
			}
		}catch(Exception $e){
			return $e;
		}
	}

	



public function bitacora1($accion, $modulo,$id){
	$var=$this->bitacora($accion, $modulo,$id);
}

	private function bitacora($accion, $modulo,$id){
		try {
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		parent::registrar_bitacora($accion, $modulo,$id);

					
					
					;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		
	}



}

?>