<?php

require_once('modelo/conexion.php');
class docente extends datos{
    private $cedula;
	private $nombre;
	private $apellido;
	private $categoria;
	private $fecha;
	private $especializacion;
	private $profecion;
    private $edad;
    private $anos;
    private $correo;
    private $direccion;
    private $nivel;

    public function set_cedula($valor){
        if (preg_match("/^[0-9]{7,8}$/", $valor)) {
		$this->cedula = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_nombre($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->nombre = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_apellido($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->apellido = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_categoria($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->categoria = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_fecha($valor){
        if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $valor)) {
		$this->fecha = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_especializacion($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->especializacion = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_profecion($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->profecion = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_edad($valor){
        if (preg_match("/^[0-9]{2}$/", $valor)) {
		$this->edad = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_años($valor){
        if (preg_match("/^[0-9]{1,2}$/", $valor)) {
		$this->anos = $valor; 
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
    public function set_direccion($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->direccion = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_nivel($valor){
        
		$this->nivel = $valor; 
        return true;
     
	}

    public function registrar(){
        $val=$this->registrar1();
        return $val;
    }

    public function modificar(){
        $val= $this->modificar1();
        return $val;
    }

    public function eliminar(){
        $val= $this->eliminar1();
        return $val;
    }
  
    


    public function registrar1(){



        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->cedula, "Select * from docentes where cedula=:cedula", ':cedula')){
            try{

                $estado=1;

                $r= $co->prepare("Insert into docentes(
						
                    cedula,
                    nombre,
                    apellido,
                    categoria,
                    fecha_nacimiento,
                    especializacion,
                    profecion,
                    edad,
                    anos_trabajo,
                    correo,
                    direccion,
                    estado
                    )
            

                    Values(
                        :cedula,
                        :nombre,
                        :apellido,
                        :categoria,
                        :fecha_nacimiento,
                        :especializacion,
                        :profecion,
                        :edad,
                        :anos_trabajo,
                        :correo,
                        :direccion,
                        :estado
                    )");
                $r->bindParam(':cedula',$this->cedula);	
                $r->bindParam(':nombre',$this->nombre);	
                $r->bindParam(':apellido',$this->apellido);	
                $r->bindParam(':categoria',$this->categoria);	
                $r->bindParam(':fecha_nacimiento',$this->fecha);	
                $r->bindParam(':especializacion',$this->especializacion);	
                $r->bindParam(':profecion',$this->profecion);	
                $r->bindParam(':edad',$this->edad);	
                $r->bindParam(':anos_trabajo',$this->anos);	
                $r->bindParam(':correo',$this->correo);	
                $r->bindParam(':direccion',$this->direccion);
                $r->bindParam(':estado',$estado);	
            
             
                $r->execute();
                $this->bitacora("se registro un docente", "docentes",$this->nivel);
             
                    return "1Registro incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
                
            }
            else{
                return "4cedula registrada";
            }
    








        }

        public function modificar1(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->cedula, "Select * from docentes where cedula=:cedula", ':cedula')){
                try{
                    $r= $co->prepare("Update docentes set 
                            
                       
                        nombre=:nombre,
                        apellido=:apellido,
                        categoria=:categoria,
                        fecha_nacimiento=:fecha_nacimiento,
                        especializacion=:especializacion,
                        profecion=:profecion,
                        edad=:edad,
                        anos_trabajo=:anos_trabajo,
                        correo=:correo,
                        direccion=:direccion
                        where
						cedula =:cedula
                        
                
    
                    
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        ");
                    $r->bindParam(':cedula',$this->cedula);	
                    $r->bindParam(':nombre',$this->nombre);	
                    $r->bindParam(':apellido',$this->apellido);	
                    $r->bindParam(':categoria',$this->categoria);	
                    $r->bindParam(':fecha_nacimiento',$this->fecha);	
                    $r->bindParam(':especializacion',$this->especializacion);	
                    $r->bindParam(':profecion',$this->profecion);	
                    $r->bindParam(':edad',$this->edad);	
                    $r->bindParam(':anos_trabajo',$this->anos);	
                    $r->bindParam(':correo',$this->correo);	
                    $r->bindParam(':direccion',$this->direccion);	
                
                 
                    $r->execute();
    
                    $this->bitacora("se modificco un docente", "docentes",$this->nivel);
                        return "2Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "4cedula no registrada";
                }
        
    
    
    
    
    
    
    
    
            }
    

public function consultar($nivel1){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("Select * from docentes where estado=1");
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['cedula']."</th>";
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";
                $respuesta=$respuesta."<th>".$r['apellido']."</th>";
                $respuesta=$respuesta."<th>".$r['categoria']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha_nacimiento']."</th>";
                $respuesta=$respuesta."<th>".$r['especializacion']."</th>";
                $respuesta=$respuesta."<th>".$r['profecion']."</th>";
                $respuesta=$respuesta."<th>".$r['edad']."</th>";
                $respuesta=$respuesta."<th>".$r['anos_trabajo']."</th>";
                $respuesta=$respuesta."<th>".$r['correo']."</th>";
                $respuesta=$respuesta."<th>".$r['direccion']."</th>";
                $respuesta=$respuesta.'<th>';
                if (in_array("modificar docente",$nivel1)) {
                    # code...
                
                
                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['cedula'].'`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
            }
            if(in_array("eliminar docente",$nivel1)){
               $respuesta=$respuesta.'<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['cedula'].'`)">
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
		if($this->existe($this->cedula, "Select * from docentes where cedula=:cedula", ':cedula')){
		

			try {
                $r = $co->prepare("UPDATE `docentes` SET `estado`= 0 WHERE cedula=:cedula");
                $r->bindParam(':cedula', $this->cedula);
                $r->execute();
					$r->execute();

                    $this->bitacora("se elimino un docente", "docentes",$this->nivel);
					return "3Registro Eliminado";
                    
			} catch(Exception $e) {
				return $e->getMessage();
			}
			
		

		}
		else{
			return "4Cedula no registrada o este docente esta siendo utilizado en otro modulo";
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