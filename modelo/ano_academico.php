<?php

require_once('modelo/conexion.php');
class ano_academico extends datos{


    private $id;
	private $fecha_ini;
    private $fecha_cierr;
    private $ano_academico;
    private $nivel;
    private $estado;


    public function set_id($valor){
        if (preg_match("/^[0-9]{1,5}$/", $valor)) {
		$this->id = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_fecha_ini($valor){
        if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$valor )) {
		$this->fecha_ini = $valor; 
        return true;
    }else{
        return false;
    }
        
	}
    public function set_fecha_cierr($valor){
        if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$valor )) {
		$this->fecha_cierr = $valor; 
        return true;
    }else{
        return false;
    }
	}
	public function set_ano_academico($valor){
        if (preg_match("/^\d{4}-\d{4}$/",$valor )) {
		$this->ano_academico = $valor; 
        return true;
    }else{
        return false;
    }
	}

    public function set_estado($valor){
        $this->estado = $valor; 
    }


    public function registrar()
    {
        $val = $this->registrar1();
        echo $val;
    }

    public function modificar()
    {
        $val = $this->modificar1();
        echo $val;
    }

    public function eliminar()
    {
        $val = $this->eliminar1();
        echo $val;
    }

    public function set_nivel($valor)
    {
        $this->nivel = $valor;
    }
	
   






//<!---------------------------------funcion registrar------------------------------------------------------------------>
    private function registrar1(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->id)){
            try{

                $estado = 1;

                $r= $co->prepare("Insert into ano_academico(
						
                            id,
                            fecha_ini,
                            fecha_cierr,
                            ano_academico,
                            estado
                            )
            
                    Values( :id,
                            :fecha_ini,
                            :fecha_cierr,
                            :ano_academico,
                            :estado
                    )"
                );

                $r->bindParam(':id',$this->id);	
                $r->bindParam(':fecha_ini',$this->fecha_ini);
                $r->bindParam(':fecha_cierr',$this->fecha_cierr);
                $r->bindParam(':ano_academico',$this->ano_academico);
                $r->bindParam(':estado', $estado);
            
             
                $r->execute();

                $this->bitacora("se registro un año academico", "ano_academico", $this->nivel);

             
                    return "Registro Incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
            else{
                return "Año Registrado";
            }
  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        








 






//<!---------------------------------funcion modificar------------------------------------------------------------------>
        private function modificar1(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->id)){
                try{
                    $r= $co->prepare("Update ano_academico set 
                            
                       
                        fecha_ini=:fecha_ini,
                        fecha_cierr=:fecha_cierr,
                        ano_academico=:ano_academico
                        where
						id =:id
                        
                
                         
                            
                            
                        ");
                    $r->bindParam(':id',$this->id);	
                    $r->bindParam(':fecha_ini',$this->fecha_ini);	
                    $r->bindParam(':fecha_cierr',$this->fecha_cierr);
                    $r->bindParam(':ano_academico',$this->ano_academico); 
                
                 
                    $r->execute();

                    $this->bitacora("se modifico un año academico", "ano_academico", $this->nivel);
    
                 
                        return "Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "Año no registrado";
                }
        

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------> 



public function consultar($nivel1){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT * from ano_academico 

            WHERE ano_academico.estado = 1

            ORDER BY `ano_academico`.`id` ASC ");

            $resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha_ini']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha_cierr']."</th>";
                $respuesta=$respuesta."<th>".$r['ano_academico']."</th>";
                $respuesta=$respuesta.'<th>';

                if (in_array("modificar ano_academico", $nivel1)) {
                    # code...
                
                $respuesta=$respuesta. '<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons" title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
               }
               
                if (in_array("eliminar ano_academico", $nivel1)) {
                    # code...
                    
               $respuesta=$respuesta. '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons" title="BORRAR"><img src="assets/icon/trashh.png"/></i>
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












 //<!---------------------------------funcion eventos------------------------------------------------------------------>         
public function eventos(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("Select * from ano_academico");
            $resultado->execute();
            
            $evento=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
           return $evento;
            
           
           
         
            
            
        }catch(Exception $e){
            
            return false;
        }
}


//<!---------------------------------fin funcion eventos------------------------------------------------------------------>













//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($id){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			
			$resultado = $co->prepare("Select * from ano_academico where id=:id");
			
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
    if($this->existe($this->id)) {
    

        try {
        
                $r=$co->prepare("UPDATE ano_academico 

                INNER JOIN ano_estudiantes 
                ON  ano_estudiantes.id_ano  = ano_academico.id

                INNER JOIN estudiantes 
                ON ano_estudiantes.id_estudiantes = estudiantes.cedula 

                INNER JOIN eventos_ano
                ON eventos_ano.id_anos = ano_academico.id

                INNER JOIN eventos 
                ON eventos_ano.id_evento = eventos.id

                INNER JOIN horario_ano
                ON horario_ano.id_ano = ano_academico.id

                INNER JOIN horario_docente
                ON horario_ano.id_horario = horario_docente.id



                SET ano_academico.estado = 0, estudiantes.estado = 0 , eventos.estado = 0, horario_docente.estado = 0
                WHERE ano_academico.estado = 1 AND estudiantes.estado = 1 AND eventos.estado = 1 AND horario_docente.estado = 1 ;");
                

                $r->execute();

                $this->bitacora("se elimino un año academico", "ano_academico", $this->nivel);
                return "Registro Eliminado";

                return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "Año no registrado";
    }
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
//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
?>