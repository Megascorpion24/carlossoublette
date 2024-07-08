<?php

require_once('modelo/conexion.php');
class usuarios extends datos{

	private $cedula;
    private $nombre;
	private $rol;
    private $correo;
    private $contraceña;
    private $id;
    private $nivel;


	public function set_nombre($valor){
        $cexryp=$this->decryptMessage($valor );
        if (preg_match("/^[a-zA-Z'-]+$/", $cexryp)) {
		$this->nombre = $cexryp; 
        return true;
        }else{
            return false;
        }
	}
    public function set_cedula($valor){
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\\s|,.<>\/?\s]{7,9}$/", $valor)) {
		$this->cedula = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_id($valor){
        if (preg_match("/^[0-9]{1,5}$/", $valor)) {
		$this->id = $valor; 
        return true;
        }else{
            return false;
        }
	}
	
    public function set_correo($valor){
        if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $valor)) {
		$this->correo = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_contraceña($valor){
        $cexryp=$this->decryptMessage($valor );
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $cexryp)) {
		$this->contraceña = $cexryp; 
        return true;
        }else{
            return false;
        }
	}
    public function set_rol($valor){
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
		$this->rol = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_nivel($valor){
		$this->nivel = $valor; 
	}


    public function registrar(){
       $val= $this->registrar1();
       return $val;
    }

    public function modificar(){
        $val=  $this->modificar1();
        return $val;
    }

    public function eliminar(){
        $val= $this->eliminar1();
        return $val;
    }



   
    public function registrar1(){



        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->cedula,"Select * from usuarios where id=:cedula",':cedula')){
            try{
                $t="1";
                $claveencr=password_hash($this->contraceña, PASSWORD_DEFAULT, ['cost'=>10]);
                $r= $co->prepare("Insert into usuarios(
						
                    id,
                    nombre, 
                    correo,
                    clave,
                    estado,
                    id_rol
                    )
            

                    Values(
                        :id,
                        :nombre,
                        :correo,
                        :clave,
                        :estado,
                        :id_rol
                    )");
                    $r->bindParam(':id',$this->cedula);	
                $r->bindParam(':nombre',$this->nombre);	
               
                $r->bindParam(':correo',$this->correo);	
                $r->bindParam(':clave',$claveencr);	
                $r->bindParam(':estado',$t);	
                $r->bindParam(':id_rol',$this->rol);	
            
             
                $r->execute();
                $this->bitacora("se registro un usuario", "usuarios",$this->nivel);
             
                    return "1Registro incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
                
            }
            else{
                return "4cedula registrada registrado";
            }
    








        }

        public function modificar1(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->cedula,"Select * from usuarios where id=:cedula",':cedula')){
                try{
                    $t="1";
                    $claveencr=password_hash($this->contraceña, PASSWORD_DEFAULT, ['cost'=>10]);
                    $r= $co->prepare("Update usuarios set 
                            
                       
                        nombre=:nombre,
                        
                        correo=:correo,
                        clave=:clave,
                        estado=:estado,
                        id_rol=:id_rol
                        where
						id =:id
                        
                
    
                    
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        ");
                        $r->bindParam(':nombre',$this->nombre);	
                        $r->bindParam(':id',$this->cedula);
               
                        $r->bindParam(':correo',$this->correo);	
                        $r->bindParam(':clave',$claveencr);	
                        $r->bindParam(':estado',$t);	
                        $r->bindParam(':id_rol',$this->rol);	
                 
                    $r->execute();
    
                    $this->bitacora("se modifico un usuario", "usuarios",$this->nivel);
                        return "2Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "4el usuario no esta registrado";
                }
        
    
    
    
    
    
    
    
    
            }


            public function roles(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			try {
					$r = $co->prepare("SELECT id, nombre FROM rol");
					
					
					
					$r->execute();

					if($r){
				
				$respuesta = '';
					
					$respuesta = $respuesta.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';
				foreach($r as $r){
					
							$respuesta =$respuesta.'<option value="'.$r['id'].'">'.$r['nombre'].'</option>';
							
				}

				
				return $respuesta;
			    
			}
			else{
				return '';
			}







						
			} catch(Exception $e) {
				return $e->getMessage();
			}
		
		
	}
    

public function consultar($nivel1){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare('SELECT a.id, a.nombre,a.correo, b.name FROM (SELECT id as ide, nombre as name FROM rol) as b , usuarios as a WHERE b.ide = a.id_rol and a.estado = 1;');
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['name']."</th>";
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";
                $respuesta=$respuesta."<th>".$r['correo']."</th>";
                
                $respuesta=$respuesta.'<th>';
                if (in_array("modificar usuario",$nivel1)) {
                    # code...
                
                
                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
            }
            if(in_array("eliminar usuario",$nivel1)){
               $respuesta=$respuesta.'<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
               </a>';
               
            }
            $respuesta=$respuesta.'</th>';
             $respuesta= $respuesta.'</tr>';

            }

           
            return $respuesta;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}


    public function eliminar1(){
        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if($this->existe($this->contraceña,"Select * from usuarios where id=:cedula",':cedula')){
		

			try {
                $r = $co->prepare("UPDATE `usuarios` SET `estado`= 0 WHERE id=:id");
                $r->bindParam(':id', $this->contraceña);
                $r->execute();
                $this->bitacora("se elimino un usuario", "usuarios", $this->nivel);
                return "3Registro Eliminado";
                    
			} catch(Exception $e) {
				return $e->getMessage();
			}
			
		

		}
		else{
			return "4Usuario no registrado";
		}
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