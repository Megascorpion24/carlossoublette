<?php

require_once('conexion.php');
 
class secciones extends datos{

    private $id;
	private $secciones;
    private $ano;
    private $cedula_profesor;
    private $ano_academico;
    private $cantidad;
    private $nivel;
     
    
   

    public function set_id($valor){
		$this->id = $valor; 
	}
	public function set_secciones($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		    $this->secciones = $valor;  
            // $this->s;
            return true;
            }else{
                return false;
            }
	}
    public function set_ano($valor){
        if (preg_match("/^[0-9]{0,4}$/", $valor)) {
         $this->ano = $valor;  
            return true;
            }else{
                return false;
            }
    }
    public function set_cantidad($valor){
        if (preg_match("/^[0-9]{0,3}$/", $valor)) {
          $this->cantidad = $valor;     
            return true;
            }else{
                return false;
            }
    }
     public function set_cedula_profesor($valor){
        if (preg_match("/^[0-9]{3,15}$/", $valor)) {
                 $this->cedula_profesor = $valor;            
            return true;
            }else{
                return false;
            }
    }
    public function set_ano_academico($valor){
        $this->ano_academico = $valor; 
    }
    public function set_nivel($valor){
		$this->nivel = $valor; 
	}





    public function registrar(){
        $val=$this->registrar1();
        echo $val;
    }

    public function modificar(){
        $val=$this->modificar1();
        echo $val;
    }

    public function eliminar(){
        $val= $this->eliminar1();
        echo $val;
    }

//<!---------------------------------funcion registrar------------------------------------------------------------------>
private function registrar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!$this->exists($this->secciones,$this->ano)) {
   
        $estado=1;
        try{


                $r= $co->prepare("Insert into secciones_años(
                    
                    id,
                    cantidad,
                    id_secciones,
                    id_anos,
                    estado
                   
                    
                    )
            

                    Values(
                    :id,
                    :cantidad,
                    :id_secciones,
                    :id_anos,
                    :estado
                    

                    
                    )");
                $r->bindParam(':id',$this->id); 
                $r->bindParam(':cantidad',$this->cantidad);
                $r->bindParam(':id_secciones',$this->secciones);
                $r->bindParam(':id_anos',$this->ano);   
                $r->bindParam(':estado',$estado);   

                $r->execute();



                $lid = $co->lastInsertId();

                $r= $co->prepare("Insert into docente_guia(
                    
                    id_docente,
                    id_ano_seccion
                    )
            

                    Values(

                    :id_docente,
                    :id_ano_seccion
                    
                    
                    )");
 
                $r->bindParam(':id_docente',$this->cedula_profesor);    
                $r->bindParam(':id_ano_seccion',$lid);  
                $r->execute();

                $r= $co->prepare("Insert into ano_secciones(
                    
                    id_anos,
                    id_secciones
                    )
            

                    Values(

                    :id_anos,
                    :id_secciones
                    
                    
                    )");
 
                $r->bindParam(':id_anos',$this->ano_academico);    
                $r->bindParam(':id_secciones',$lid);  
                $r->execute();



                $this->bitacora("se registro una seccion", "secciones",$this->nivel);            
                return "Registro incluido"; 
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
    } else {
        return "Seccion Ya Registrada";
    }

}


 //<!---------------------------------Modal Registrar------------------------------------------------------------------>  


 public function abc(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT * from secciones");
            $resultado->execute();
           $respuesta2="";
           

            foreach($resultado as $r){
                $respuesta2 .='<option value="'.$r['id'].'">'.$r['secciones'].'</option>';

            }  

           
            return $respuesta2;  
            
        }catch(Exception $e){
            
            return false;
        }
}

 public function Año(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * from años");
        $resultado->execute();
        $respuesta = "";
        

        foreach($resultado as $r){
            // Construir un conjunto de elementos de radio con el valor del campo 'id' y el texto del campo 'anos'
            $respuesta .= '<div class="form-check mb-1">';
            $respuesta .= '<input class="form-check-input" type="radio" name="año" id="inlineRadio' . $r['id'] . '" value="' . $r['id'] . '">';
            $respuesta .= '<label class="form-check-label" for="inlineRadio' . $r['id'] . '">' . $r['anos'] . '</label>';
            $respuesta .= '</div>';
        }

        return $respuesta;
    }catch(Exception $e){
        return false;
    }
}

public function Doc_Guia(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT CONCAT(nombre, ' ', apellido) AS nombre_apellido, cedula
        FROM docentes Where anos_trabajo >= 3");
        $resultado->execute();
        $respuesta2 = '';
        // $respuesta2 .='<option value="seleccionar" selected hidden>-Seleccionar-</option>';

        foreach($resultado as $r){
            $respuesta2 .= '<option value="'.$r['cedula'].'">'.$r['nombre_apellido'].'</option>';
        }

        return $respuesta2;
    } catch(Exception $e){
        return false;
    }
}

public function academico(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT id FROM ano_academico WHERE estado = 1 ");
        $resultado->execute();
        $respuesta2 = '';

        foreach($resultado as $r){
            $respuesta2 .= '<input type="text" class="form-control" name="ano_academico" id="ano_academico" value="'.$r['id'].'">';

        }

        return $respuesta2;
    } catch(Exception $e){
        return false;
    }
}





 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
  // <!---------------------------------funcion modificar------------------------------------------------------------------>
private function modificar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!$this->exists($this->secciones,$this->ano)) {
        try {
            // Actualizar la tabla secciones_años
            $r = $co->prepare("UPDATE secciones_años 
                                SET cantidad = :cantidad,
                                    id_secciones = :id_secciones,
                                    id_anos = :id_anos
                                WHERE id = :id");

            $r->bindParam(':id', $this->id);
            $r->bindParam(':cantidad', $this->cantidad);
            $r->bindParam(':id_secciones', $this->secciones);
            $r->bindParam(':id_anos', $this->ano);

            $r->execute();

            // Actualizar la tabla docente_guia
            $r = $co->prepare("UPDATE docente_guia
                                SET id_docente = :id_docente
                                WHERE id_ano_seccion = :id");

            $r->bindParam(':id_docente', $this->cedula_profesor);
            $r->bindParam(':id', $this->id);

            $r->execute();

            $this->bitacora("se modifico una seccion", "secciones",$this->nivel);

            return "Registro modificado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } else {

        try {
            // Actualizar la tabla secciones_años
            $r = $co->prepare("UPDATE secciones_años 
                                SET cantidad = :cantidad        
                                WHERE id = :id");

            $r->bindParam(':id', $this->id);
            $r->bindParam(':cantidad', $this->cantidad);
            // $r->bindParam(':id_secciones', $this->secciones);
            // $r->bindParam(':id_anos', $this->ano);

            $r->execute();

            // Actualizar la tabla docente_guia
            $r = $co->prepare("UPDATE docente_guia
                                SET id_docente = :id_docente
                                WHERE id_ano_seccion = :id");

            $r->bindParam(':id_docente', $this->cedula_profesor);
            $r->bindParam(':id', $this->id);

            $r->execute();

       
            $this->bitacora("se modifico datos adicionales de una seccion", "secciones",$this->nivel);

            return "LA SECCION CON ESE AÑO YA EXISTE ,solo actualizo Datos Adicionales";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } 



}
 
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  


  public function Edit_Año(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * from años");
        $resultado->execute();
        $respuesta = "";

        foreach($resultado as $r){
            $respuesta.= '<option value="'.$r['id'].'">'.$r['anos'].'</option>';
        }

        return $respuesta;

    }catch(Exception $e){
        return false;
    }
}



  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
  public function consultar($nivel1){
    $co = $this->conecta(); 
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
             
            
           $resultado = $co->prepare("SELECT secciones_años.id, secciones.secciones, secciones_años.cantidad, años.anos AS año, años.turnos, CONCAT(docentes.nombre, ' ', docentes.apellido) AS docente_guia, ano_academico.ano_academico
           FROM secciones_años
           INNER JOIN secciones ON secciones_años.id_secciones = secciones.id
           INNER JOIN años ON secciones_años.id_anos = años.id
           INNER JOIN docente_guia ON secciones_años.id = docente_guia.id_ano_seccion
           INNER JOIN docentes ON docente_guia.id_docente = docentes.cedula
           INNER JOIN ano_secciones ON secciones_años.id = ano_secciones.id_secciones
           INNER JOIN ano_academico ON ano_secciones.id_anos = ano_academico.id
           WHERE secciones_años.estado = 1
           ORDER BY secciones_años.id         
           "); 
 
            $resultado->execute();
           $respuesta="";
 
            foreach($resultado as $r){

         $respuesta .= '<tr class="studentDataRow line" data-bs-toggle="modal" data-bs-target="#infoStudents" data-id="'.$r['id'].'">';
        $respuesta .= '<th class="text-muted id-column">' . $r['id'] . "</th>";
        $respuesta .= '<th> <span class="h6 font-weight-bold">' . $r['secciones'] . "</th>";
        $respuesta .= '<th>  <span class="h6 font-weight-bold">' . $r['año'] . '</th>';
        $respuesta .= "<th>" . $r['turnos'] . "</th>";
        $respuesta .= "<th>" . $r['docente_guia'] . "</th>";
        $respuesta .= "<th>" . $r['cantidad'] . "</th>";
        $respuesta .= "<th>" . $r['ano_academico'] . "</th>";
        $respuesta .= '<th id="option">';
        if (in_array("modificar secciones",$nivel1)) {

                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
            
            }
        if(in_array("eliminar secciones",$nivel1)){
            
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
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>


public function consulta_M($id){
    $co = $this->conecta(); 
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
             
            
           $resultado = $co->prepare("SELECT * FROM `estudiantes` WHERE id_anos_secciones =:id AND estado=1"); 
			$resultado->bindParam(':id',$id);
            $resultado->execute();
           return $resultado;

        }
        catch(Exception $e){     
        return false;
    }
}


//<!---------------------------------fin funcion consultar------------------------------------------------------------------>



//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($id){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try{
			
			$resultado = $co->prepare("SELECT * from secciones_años where id=:id");
			
			$resultado->bindParam(':id',$id);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 

				return true; 
			    
			}
            //necesario?
			else{
				
				return false; 
			}
			
		}catch(Exception $e){
			
			return false;
		}
	}
 
    private function exists($secciones, $ano){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try{
			
            $r = $co->prepare("SELECT * FROM secciones_años WHERE id_secciones= :id_seccion AND id_anos= :ano and estado =1");
            $r->bindParam(':id_seccion',$secciones);
             $r->bindParam(':ano', $ano);

        $r->execute();

 
            $fila = $r->fetchAll(PDO::FETCH_BOTH);
            // echo $fila;
			if($fila){ 

				return true; 
			    
			}
            //necesario?
			else{ 
				
				return false; 
			}
    
			
		}
        catch(Exception $e){
			
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
            $r=$co->prepare("UPDATE `secciones_años` SET `estado`= 0 WHERE id=:id");
            $r->bindParam(':id',$this->id);
            $r->execute();
           
            $this->bitacora("se elimino una seccion", "seccion",$this->nivel);

            return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "Sección no registrada o no existe";
    }
}


//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>


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


//fin classs
}


?>