<?php

require_once('modelo/conexion.php');

class principal extends datos{

    private $id;
	private $nombre;
    private $nivel;
    

    public function set_id($valor){
		$this->id = $valor; 
	}
    public function set_nombre($valor){
		$this->nombre = $valor; 
	}
    public function set_nivel($valor){
		$val=$this->nivel = $valor; 
 
	}


//<!---------------------------------funcion registrar------------------------------------------------------------------>
    public function morocidad(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //Existe el id

                    try{
                        $resultado = $co->prepare("SELECT deudas.id_estudiante,pagos.id, estudiantes.nombre,pagos.fecha FROM pagos INNER JOIN deudas on deudas.id=pagos.id_deudas INNER JOIn estudiantes on estudiantes.cedula=deudas.id_estudiante WHERE pagos.estado_pagos=1 and pagos.estatus=1");
                    $resultado->execute();
                        $r1="";
                        $r2="";
                        $r3="";
                        date_default_timezone_set('America/Caracas');
                        $fecha= date('Y-m-d');
                    foreach($resultado as $r){
                        $r1=$r['id_estudiante'];
                        $r2=$r['nombre'];
                        $r3=$r['id'];
                        $fecha1 = $r["fecha"]; 
$nueva_fecha = date('Y-m-d', strtotime('-7 days', strtotime($fecha1)));
                        if(strtotime($fecha) == strtotime($nueva_fecha)){
                            $r= $co->prepare("Insert into notificaciones(
						
                                mensaje,
                                estado,
                                titulo
                                )
                
                        Values( 'la deuda se vence en 7 dias del estudiante: $r2',
                                1,
                                'pago de deuda'
                        )"
                    );
                    $r->execute();

                        }

                        if (strtotime($fecha) >= strtotime($nueva_fecha)) {
                            $r= $co->prepare("Insert into deudas(
						
                                id_estudiante,
                                monto,
                                concepto,
                                fecha,
                                estado,
                                estado_deudas
                                )
                        
            
                                Values(
                                :id_estudiante,
                                :monto,
                                :concepto,
                                :fecha,
                                :estado,
                                :estado_deudas
                                
                                
                                )");
        
                                $fecha= date('Y-m-d');
                                $monto="20";
                                $concepto="mensualidad";
                                $estado=1;
                            $r->bindParam(':id_estudiante', $r1);	
                            $r->bindParam(':monto',$monto);	
                            $r->bindParam(':concepto', $concepto);	
                            $r->bindParam(':fecha',$fecha);	
                            $r->bindParam(':estado',$estado);	
                            $r->bindParam(':estado_deudas',$estado);
                            $r->execute();


                            $r= $co->prepare("UPDATE pagos set 
                        
                        estado_pagos=0  
                           
                            where
                            id =:id
          
                            ");
                        $r->bindParam(':id',$r3);
                       	
                    
                     
                        $r->execute();

                        $this->bitacora("se genero una deuda", "principal",$this->nivel);

        
                        }

        
                    }
        
                       
        
                        
                            return $fecha;	
                        
                    }
            catch(Exception $e){  return $e->getMessage(); }
       

  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        


//<!---------------------------------funcion modificar------------------------------------------------------------------>
        public function notificaciones(){

            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
                try{
                    $resultado = $co->prepare("SELECT deudas.id,deudas.concepto, deudas.id_estudiante, estudiantes.nombre FROM deudas INNER JOIN estudiantes on deudas.id_estudiante=estudiantes.cedula WHERE deudas.estado_deudas=1 AND deudas.concepto='mensualidad'");
                    $resultado->execute();
                    $resultado1 = $co->prepare("SELECT * FROM notificaciones WHERE notificaciones.estado=1");
                    $resultado1->execute();
    if (!empty($resultado)) {
        $r1="";
        $r2="";
        $r3="";
        $r4="";
        $p1="";
        foreach($resultado1 as $r){
        $p1=$r['mensaje'];

        }
        foreach($resultado as $r){
            $r1=$r['id'];
            $r2=$r['id_estudiante'];
            $r3=$r['nombre'];
            $r4=$r['concepto'];
           

if (!$p1=='hay una deuda pendiente con concepto de: $r4 que corresponde al estudiante: $r3, $r2') {
    


        
            $r= $co->prepare("Insert into notificaciones(
						
                mensaje,
                estado,
                titulo
                )

        Values( 'hay una deuda pendiente con concepto de: $r4 que corresponde al estudiante: $r3, $r2',
                1,
                'pago de deuda'
        )"
    );
    $r->execute();
}

       
    }
}
                    
                        return "Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
           

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
public function consultar(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * FROM `notificaciones` WHERE notificaciones.estado=1");
			$resultado->execute();
           $respuesta="";
            $coun=0;
            foreach($resultado as $r){
              $respuesta=$respuesta.'<li><a href="?pagina=pagos">'.$r["titulo"].'</a><input type="text" value="'.$r["id"].'" class="ocultar" name="estado" id="estado" onclick="funcion_estado()"></li><hr>';
                $coun++;
            }
            $fila=array($respuesta,$coun);
            return $fila;
         	
			
		}catch(Exception $e){
			
			return false;
		}
}
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>

public function modificar(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
        try{
            $r= $co->prepare("Update notificaciones set 
                    
               
            estado=0
             
                where
                id =:id
                
        
                 
                    
                    
                ");
            $r->bindParam(':id',$this->id);	
          
        
         
            $r->execute();

         
                return "Registro modificado";	
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        }
        else{
            return "Año no registrado";
        }


    }

//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($id){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try{
			
			$resultado = $co->prepare("SELECT * from materias where id=:id");
			
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
//<!---------------------------------fin de funcion existe------------------------------------------------------------------>



//<!---------------------------------funcion eliminar------------------------------------------------------------------>
 private function eliminar1(){
     $co = $this->conecta();
     $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if($this->existe($this->id)){
    

         try {
              
                $estado=0;
                $r= $co->prepare("Update materias set 
                                            
                                    
                estado=:estado

                where
                id =:id

                    
                ");

                 



                 $r->bindParam(':id',$this->id);
                 $r->bindParam(':estado',$estado);
                 $r->execute();
                 $this->bitacora("se elimino una materia", "materias",$this->nivel);
                 return "Registro Eliminado";
                
         } catch(Exception $e) {
             return $e->getMessage();
         }
        

     }
     else{
         return "materia no registrada";
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
//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
?>