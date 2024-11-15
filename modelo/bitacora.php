<?php

require_once('modelo/conexion.php');
class bitacora extends datos{

    

public function consultar(){
    $co = $this->conecta1();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * FROM bitacora ORDER BY fecha DESC");
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
           
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['accion']."</th>";
                $respuesta=$respuesta."<th>".$r['modulo']."</th>";
                $respuesta=$respuesta."<th>".$r['id_usuario']."</th>";
                
             
             $respuesta= $respuesta.'</tr>';

            }

           
            return $respuesta;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}

}

?>