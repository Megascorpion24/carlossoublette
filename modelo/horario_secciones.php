<?php

require_once('modelo/conexion.php');
class horario_secciones extends datos{


    private $id;
	private $clase;
    private $ano;
    private $seccion;
    private $dia;
	private $clase_inicia;
	private $clase_termina;
    private $inicio;
	private $fin;
    
    
    
	

    public function set_id($valor){
		$this->id = $valor; 
	}

	public function set_clase($valor){
		$this->clase = $valor; 
	}
  
    public function set_ano($valor){
		$this->ano = $valor; 
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
    
    public function registrar(){
        $this->registrar1();
    }

    public function modificar(){
        $this->modificar1();
    }

    public function eliminar(){
        $this->eliminar1();
    }
	
    public function set_nivel($valor){
		$this->nivel = $valor; 
	}
	
  
    





//<!---------------------------------funcion registrar------------------------------------------------------------------>
private function registrar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   
        try{


            

               
            $estado=1;

         $resultado = $co->prepare("SELECT id FROM secciones_años WHERE secciones_años.id_secciones =:secciones and secciones_años.id_anos=:anos");
        
            $resultado->bindParam(':secciones',$this->seccion);
            $resultado->bindParam(':anos',$this->ano);
            $resultado->execute();
            $respuesta="";

            foreach($resultado as $r){
               
                $respuesta=$r["id"];
            }




                $r= $co->prepare("Insert into horario_secciones(
                    
                    clase_inicia,
                    clase_termina,
                    dia,
                    inicio,
                    fin,
                    id_ano_seccion,
                    estado
                   
                    
                    )
            

                    Values(
                    :clase_inicia,
                    :clase_termina,
                    :dia,
                    :inicio,
                    :fin,
                    :id_ano_seccion,
                    :estado
                    

                    
                    )");
                $r->bindParam(':clase_inicia',$this->clase_inicia);	
                $r->bindParam(':clase_termina',$this->clase_termina);
                $r->bindParam(':dia',$this->dia);	
                $r->bindParam(':inicio',$this->inicio);	
                $r->bindParam(':fin',$this->fin);	
                $r->bindParam(':id_ano_seccion',$respuesta);	
                $r->bindParam(':estado',$estado);		
               

            
             
                $r->execute();



                

                $lid = $co->lastInsertId();
                        


                $r= $co->prepare("Insert into materia_horario_secciones(
                    
                    id_materias,
                    id_horario_secciones
                    )
            

                    Values(
                    :id_materias,
                    :id_horario_secciones
                    
                    
                    )");
                $r->bindParam(':id_materias',$this->clase);	
                $r->bindParam(':id_horario_secciones',$lid);	
                $r->execute();








                   
            

         
                return "Registro incluido";	
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        


    

}

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        








 






//<!---------------------------------funcion modificar------------------------------------------------------------------>
private function modificar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
        try{
            



            $r= $co->prepare("UPDATE horario_secciones SET
             
             clase_inicia=:clase_inicia,
             clase_termina=:clase_termina,
             dia=:dia,
             inicio=:inicio,
             fin=:fin
            
             WHERE 
             id=:id


                
            ");
        $r->bindParam(':id',$this->id);
        $r->bindParam(':clase_inicia',$this->clase_inicia);	
        $r->bindParam(':clase_termina',$this->clase_termina);	
        $r->bindParam(':dia',$this->dia);	
        $r->bindParam(':inicio',$this->inicio);	
        $r->bindParam(':fin',$this->fin);	
        
        
  

        $r->execute();

        
         


         
                return "Registro modificado";	
            
            }catch(Exception $e){
                return $e->getMessage();
            }
        }else{
            return "clase no modificada";
        }
        }
           
  
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
  public function consultar(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT horario_secciones.*,materias.nombre as clase,concat(docentes.nombre ,' ', docentes.cedula) as cedula
            FROM horario_secciones
            
            
            
            
            INNER JOIN materia_horario_secciones
            ON horario_secciones.id= materia_horario_secciones.id_horario_secciones
            INNER JOIN materias
            ON materia_horario_secciones.id_materias = materias.id
            
            
            
            INNER JOIN secciones_años
            ON horario_secciones.id_ano_seccion = secciones_años.id  

            WHERE horario_secciones.estado = 1

            ORDER BY `horario_secciones`.`id` ASC;");
			$resultado->execute();
           $respuesta="";

            foreach ($resultado as $r) {
                $respuesta = $respuesta . '<tr>';
                $respuesta = $respuesta . "<th>" . $r['id'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['cedula'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['seccion'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['dia'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase_inicia'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase_termina'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['inicio'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['fin'] . "</th>";
                $respuesta = $respuesta . '<th>';
                if (in_array("modificar horario_secciones", $nivel1)) {
                    # code...


                    $respuesta = $respuesta . '<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`' . $r['id'] . '`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
                }
                if (in_array("eliminar horario_secciones", $nivel1)) {
                    $respuesta = $respuesta . '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`' . $r['id'] . '`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
               </a>';
                }
                $respuesta = $respuesta . '</th>';
                $respuesta = $respuesta . '</tr>';
            }


            return $respuesta;
        } catch (Exception $e) {

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




public function consultar4()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT secciones_años.id, años.anos, secciones.secciones FROM secciones_años INNER JOIN años on secciones_años.id_anos=años.id INNER JOIN secciones on secciones_años.id_secciones=secciones.id ORDER by  años.anos, secciones.secciones AND secciones.estado=1 and años.estado=1");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['id'] . '"  >' . $r['anos'] . " - " . $r['secciones'] . '</option>';



                $respuesta = $respuesta . '</tr>';
            }




            return $respuesta2;
        } catch (Exception $e) {

            return false;
        }
    }


public function consultar5(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * FROM años");
			$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['anos'].'</option>';
               
             
               
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
			
			
			$resultado = $co->prepare("SELECT horario_docente.*,materias.nombre as clase,concat(docentes.nombre ,' ', docentes.cedula) as cedula
            FROM horario_docente
            
            INNER JOIN docente_horario
            ON horario_docente.id = docente_horario.id_horario_docente 
            INNER JOIN docentes
            ON docente_horario.id_docente = docentes.cedula
            
            
            INNER JOIN materia_horario_docente
            ON horario_docente.id= materia_horario_docente.id_horario_docente
            INNER JOIN materias
            ON materia_horario_docente.id_materias = materias.id
            
            
            
            INNER JOIN secciones_años
            ON horario_docente.id_ano_seccion = secciones_años.id  

            WHERE horario_docente.estado = 1


            ORDER BY `horario_docente`.`id` ASC;");
			$resultado->execute();
            
            $evento=$resultado->fetchAll(PDO::FETCH_ASSOC);
           
            
           return $evento;
            
           
           
         
			
			
		}catch(Exception $e){
			
			return false;
		}
}

public function eventos_selector(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT DISTINCT concat(docentes.nombre ,' ', docentes.cedula) as cedula
            FROM horario_docente
            
            INNER JOIN docente_horario
            ON horario_docente.id = docente_horario.id_horario_docente 
            INNER JOIN docentes
            ON docente_horario.id_docente = docentes.cedula
            
            
            INNER JOIN materia_horario_docente
            ON horario_docente.id= materia_horario_docente.id_horario_docente
            INNER JOIN materias
            ON materia_horario_docente.id_materias = materias.id
            
            
            
            INNER JOIN secciones_años
            ON horario_docente.id_ano_seccion = secciones_años.id  

            WHERE horario_docente.estado = 1;


            ORDER BY `horario_docente`.`id` ASC;");
			$resultado->execute();
            
            $evento=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
           return $evento;
            
           
           
         
			
			
		}catch(Exception $e){
			
			return false;
		}
}

















//<!---------------------------------funcion existe------------------------------------------------------------------>
    
private function existe($id){
		
    $co = $this->conecta();
    
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    try{
        
        
        $resultado = $co->prepare("SELECT * FROM `horario_secciones` WHERE id= :id; ");
        
        $resultado->bindParam(':id',$id);
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
private function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
    

        try {
                $r=$co->prepare("UPDATE `horario_secciones` SET `estado`= 0 WHERE id=:id");
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



//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
}