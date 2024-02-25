<?php

require_once('conexion.php');
class eventos extends datos{


    private $id;
	private $fecha_ini;
    private $fecha_cierr;
    private $cedula_profesor;
    private $evento;
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
    public function set_cedula_profesor($valor){
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$valor )) {
        $this->cedula_profesor = $valor; 
        return true;
    }else{
        return false;
    }
    }
    public function set_evento($valor){
        if (preg_match("/^[a-zA-Z\s]+$/",$valor )) {
        $this->evento = $valor; 
        return true;
    }else{
        return false;
    }
    }
    public function set_ano_academico($valor){
        if (preg_match("/^[0-9]{1,4}$/",$valor )) {
        $this->ano_academico = $valor; 
        return true;
    }else{
        return false;
    }
    return true;
    }


    public function set_estado($valor){
        $this->estado = $valor; 
    }

    public function set_nivel($valor)
    {
        $this->nivel = $valor;
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

    
	
   






//<!---------------------------------funcion registrar------------------------------------------------------------------>
    private function registrar1(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->id)){
            try{

                $estado = 1;

                $r= $co->prepare("Insert into eventos(
						
                            fecha_ini,
                            fecha_cierr,
                            evento,
                            id_ano_academico,
                            estado
                            )
            
                    Values( :fecha_ini,
                            :fecha_cierr,
                            :evento,
                            :id_ano_academico,
                            :estado
                    )"
                );

                $r->bindParam(':fecha_ini',$this->fecha_ini);
                $r->bindParam(':fecha_cierr',$this->fecha_cierr);
                $r->bindParam(':evento',$this->evento);
                $r->bindParam(':id_ano_academico',$this->ano_academico);
                $r->bindParam(':estado', $estado);

                // Validar que fecha_ini no sea mayor a fecha_cierr
    if ($this->fecha_ini > $this->fecha_cierr) {
        return"4La fecha de inicio no puede ser mayor a la fecha de cierre";
    }

    // Validar que fecha_cierr no sea menor a fecha_ini
    if ($this->fecha_cierr < $this->fecha_ini) {
        return"4La fecha de finalizacion no puede ser menor a la fecha de inicio";
    }
            
             
                $r->execute();

                $lid = $co->lastInsertId();

                $r = $co->prepare("Insert into eventos_docente(
                    
                    id_docente,
                    id_evento
                    )
            

                    Values(
                    :id_docente,
                    :id_evento
                    
                    
                    )");
                $r->bindParam(':id_docente', $this->cedula_profesor);
                $r->bindParam(':id_evento', $lid);
                $r->execute();


                $this->bitacora("se registro un evento", "eventos", $this->nivel);

             
                    return "1Registro Incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
            else{
                return "4Evento Registrado";
            }
  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  


public function ano_academico(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * FROM ano_academico WHERE estado = 1 ");
        $resultado->execute();
        $respuesta2 = '';

        foreach($resultado as $r){
            
            $respuesta2 .= '<input type="text" class="form-control" name="ano_academico" style="display: none;" id="ano_academico" value="'.$r['id'].'">';
            $respuesta2 .= '<p class="p-1 mb-2 border border-secondary text-secondary rounded">'.$r['ano_academico']."</p>";
           

        }

        return $respuesta2;
    } catch(Exception $e){
        return false;
    }
}

 public function consultar1()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT * from docentes where estado = 1");
            $resultado->execute();

            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value= "seleccionar" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['cedula'] . '"  >' . $r['nombre'] . '</option>';



                $respuesta = $respuesta . '</tr>';
            }




            return $respuesta2;
        } catch (Exception $e) {

            return false;
        }
    }
        








//<!---------------------------------funcion modificar------------------------------------------------------------------>
        private function modificar1(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->id)){
                try{
                    $r= $co->prepare("Update eventos set 
                            
                       
                        fecha_ini=:fecha_ini,
                        fecha_cierr=:fecha_cierr,
                        evento=:evento
                        where
						id =:id
                        
                
                         
                            
                            
                        ");
                    $r->bindParam(':id',$this->id);	
                    $r->bindParam(':fecha_ini',$this->fecha_ini);	
                    $r->bindParam(':fecha_cierr',$this->fecha_cierr);
                    $r->bindParam(':evento',$this->evento);

                    // Validar que fecha_ini no sea mayor a fecha_cierr
    if ($this->fecha_ini > $this->fecha_cierr) {
        return"4La fecha de inicio no puede ser mayor a la fecha de cierre";
    }

    // Validar que fecha_cierr no sea menor a fecha_ini
    if ($this->fecha_cierr < $this->fecha_ini) {
        return"4La fecha de finalizacion no puede ser menor a la fecha de inicio";
    }
                
                 
                    $r->execute();

                    $this->bitacora("se modifico un evento", "eventos", $this->nivel);
    
                 
                        return "2Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "4Evento no registrado";
                }
        

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------> 



public function consultar($nivel1){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT eventos. *,concat(docentes.nombre ,'-', docentes.cedula) as cedula, ano_academico.ano_academico as ano
            FROM eventos

            INNER JOIN eventos_docente
            ON eventos.id = eventos_docente.id_evento
            INNER JOIN docentes
            ON eventos_docente.id_docente = docentes.cedula

            INNER JOIN ano_academico
            ON eventos.id_ano_academico = ano_academico.id 



            WHERE eventos.estado = 1

            ORDER BY `eventos`.`id` ASC ");

            $resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha_ini']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha_cierr']."</th>";
                $respuesta=$respuesta."<th>".$r['cedula']."</th>";
                $respuesta=$respuesta."<th>".$r['evento']."</th>";
                $respuesta=$respuesta."<th>".$r['ano']."</th>";
                $respuesta=$respuesta.'<th>';

                if (in_array("modificar_evento", $nivel1)) {
                    # code...
                
                $respuesta=$respuesta. '<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons" title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
               }
               
                if (in_array("eliminar_evento", $nivel1)) {
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
            
            
            $resultado = $co->prepare("Select * from eventos");
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
			
			
			$resultado = $co->prepare("Select * from eventos where id=:id");
			
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
        
                $r=$co->prepare("UPDATE `eventos` SET `estado`= 0 WHERE id=:id");
                $r->bindParam(':id', $this->id);
                $r->execute();

                $this->bitacora("se elimino un evento", "eventos", $this->nivel);
                return "3Registro Eliminado";

                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "4Evento no registrado";
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