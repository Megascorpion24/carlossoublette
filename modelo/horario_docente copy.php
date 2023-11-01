<?php

require_once('modelo/conexion.php');
class horario_docente extends datos{


    private $id;
	private $clase;
    private $cedula_profesor;
    private $seccion;
    private $dia;
	private $clase_inicia;
	private $clase_termina;
    private $inicio;
	private $fin;
    private $descripcion;
    private $id_ano_seccion;
	

    public function set_id($valor){
		$this->id = $valor; 
	}

	public function set_clase($valor){
		$this->clase = $valor; 
	}
    public function set_cedula_profesor($valor){
		$this->cedula_profesor = $valor; 
	}
    public function set_seccion($valor){
		$this->seccion = $valor; 
	}
    public function set_dia($valor){
		$this->dia = $valor; 
	}
	public function set_clase_inicia($valor){
		$this->clase_inicia = $valor; 
	}
	public function set_clase_termina($valor){
		$this->clase_termina = $valor; 
	}
    public function set_inicio($valor){
		$this->inicio = $valor; 
	}
	public function set_fin($valor){
		$this->fin = $valor; 
	}
    public function set_descripcion($valor){
		$this->descripcion = $valor; 
	}
    public function set_id_ano_seccion($valor){
		$this->id_ano_seccion = $valor; 
	}
	
	
  
    






//<!---------------------------------funcion registrar------------------------------------------------------------------>
    public function registrar(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->clase)){
            try{
                $r= $co->prepare("Insert into horario_docente(
						
                            
                            
                           
                           
                            dia,
                            clase_inicia,
                            clase_termina,
                            inicio,
                            fin,
                            descripcion,
                            id_ano_seccion
                            )
            
                    Values( :
                            
                           
                            :dia,
                            :clase_inicia,
                            :clase_termina,
                            :inicio,
                            :fin,
                            :descripcion,
                            :id_ano_seccion
                            
                    )"
                );

                	
               
                
                
                $r->bindParam(':dia',$this->dia);
                $r->bindParam(':clase_inicia',$this->clase_inicia);	
                $r->bindParam(':clase_termina',$this->clase_termina);
                $r->bindParam(':inicio',$this->inicio);	
                $r->bindParam(':fin',$this->fin);
                $r->bindParam(':descripcion',$this->descripcion);
                $r->bindParam(':id_ano_seccion',$this->id_ano_seccion);

	
            
             
                $r->execute();

             
                    return "Registro Incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
            else{
                return "evento Registrado";
            }
  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        








 






//<!---------------------------------funcion modificar------------------------------------------------------------------>
public function modificar(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
        try{
            $r= $co->prepare("Update horario_docente set 
                    
               
                
                clase=:clase,
                
                seccion=:seccion,
                dia=:dia,
                clase_inicia=:clase_inicia,
                clase_termina=:clase_termina,
                inicio=:inicio,
                fin=:fin                  
                where
                id=:id
                  
                    
                ");
                $r->bindParam(':id',$this->id);	
                $r->bindParam(':clase',$this->clase);	
                $r->bindParam(':cedula_profesor',$this->cedula_profesor);	
                $r->bindParam(':seccion',$this->seccion);
                $r->bindParam(':dia',$this->dia);		
                $r->bindParam(':clase_inicia',$this->clase_inicia);	
                $r->bindParam(':clase_termina',$this->clase_termina);	
                $r->bindParam(':inicio',$this->inicio);	
                $r->bindParam(':fin',$this->fin);
        
         
            $r->execute();

         
                return "Registro modificado";	
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        }
        else{
            return "cedula no registrada";
        }


    }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
  public function consultar(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("Select * from horario_docente");
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['clase']."</th>";
                $respuesta=$respuesta."<th>".$r['cedula_profesor']."</th>";
                $respuesta=$respuesta."<th>".$r['id_ano_seccion']."</th>";
                $respuesta=$respuesta."<th>".$r['dia']."</th>";
                $respuesta=$respuesta."<th>".$r['clase_inicia']."</th>";
                $respuesta=$respuesta."<th>".$r['clase_termina']."</th>";
                $respuesta=$respuesta."<th>".$r['inicio']."</th>";
                $respuesta=$respuesta."<th>".$r['fin']."</th>";
                $respuesta=$respuesta.'<th>
            <a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
               </a>
               
               <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
               </a>

        
             </th>';
             $respuesta= $respuesta.'</tr>';
                
            }

           
            return $respuesta;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>

public function consultar2(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * from materias");
			$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['nombre'].'</option>';
               
             
               
             $respuesta= $respuesta.'</tr>';

            }

            

           
            return $respuesta2;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}






public function consultar3(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * from docentes");
			$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['cedula'].'"  >'.$r['nombre'].'</option>';
               
             
               
             $respuesta= $respuesta.'</tr>';

            }

            

           
            return $respuesta2;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}




public function consultar4(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * from secciones");
			$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['secciones'].'</option>';
               
             
               
             $respuesta= $respuesta.'</tr>';

            }

            

           
            return $respuesta2;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}



public function eventos(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("Select * from horario_docente");
			$resultado->execute();
            
            $evento=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
           return $evento;
            
           
           
         
			
			
		}catch(Exception $e){
			
			return false;
		}
}















//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($cedula_profesor){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			
			$resultado = $co->prepare("Select * from horario_docente 
            where
             id=:cedula_profesor"
            );
			
			$resultado->bindParam(':cedula_profesor',$cedula_profesor);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 

				return true; 
			    
			}
			else{
				
				return false; 
			}
			
		}catch(Exception $e){
			
			return false;
		}
	}
//<!---------------------------------fin de funcion existe------------------------------------------------------------------>






















//<!---------------------------------funcion eliminar------------------------------------------------------------------>
public function eliminar(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
    

        try {
                $r=$co->prepare("Delete from horario_docente 
                    where
                    id= :id
                    ");
                $r->bindParam(':id',$this->id);
                $r->execute();
                return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "Usuario no registrado";
    }
}


}
//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
