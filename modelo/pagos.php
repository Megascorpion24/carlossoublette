<?php

require_once('modelo/conexion.php');
class pagos extends datos{

    
    private $id;
	private $id_deudas;
	private $identificador;
    private $concepto;
    private $forma;
	private $fecha;
	private $estado;
    private $estado_pagos;
    private $estatus;
    private $monto;
    private $meses;
    private $nivel;

	


    public function set_id($valor){
        if (preg_match("/^[0-9]{1,5}$/", $valor)) {
            $this->id = $valor; 
            return true;
            }else{
                return false;
            }
        }
	public function set_id_deudas($valor){
        if (preg_match("/^[a-zA-Z0-9\s]{1,5}+$/", $valor)) {
		$this->id_deudas = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_identificador($valor){
        if (preg_match("/^[a-zA-Z0-9-\s]+$/", $valor)) {
		$this->identificador = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_concepto($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->concepto = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_forma($valor){
        if (preg_match("/^[-a-zA-Z0-9\s]+$/", $valor)) {
		$this->forma = $valor; 
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
	public function set_estado($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->estado = $valor; 
        return true;
        }else{
            return false;
        }
	} 
    public function set_estado_pagos($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->estado_pagos = $valor; 
        return true;
        }else{
            return false;
        }
	} 
    public function set_estatus($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->estatus = $valor; 
        return true;
        }else{
            return false;
        }
	} 
    public function set_monto($valor){
        if (preg_match("/^[0-9-\s]+$/", $valor)) {
		$this->monto = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_meses($valor){
        if (preg_match("/^[a-zA-Z1-9\s]+$/", $valor)) {
		$this->meses = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_nivel($valor){
		$this->nivel = $valor; 
	}





    public function registrar(){
       $VAL= $this->registrar1();
       echo $VAL;
    }

    public function registrarr(){
        $VAL=  $this->registrarr1();
        echo $VAL;
    }

    public function modificar(){
        $VAL=  $this->modificar1();
        echo $VAL;
    }

    public function eliminar(){
        $VAL= $this->eliminar1();
        echo $VAL;
    }

    public function eliminarr(){
        $VAL= $this->eliminar2();
        echo $VAL;
    }









	
  //<!--------------------------------FUNCION QUE USA EL ADMINISTRADOR PARA REGISTRAR UN PAGO------------------------------------------------------------------> 
    private function registrar1(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->id)){
            try{
              
                $r= $co->prepare("INSERT INTO pagos( id_deudas, identificador, concepto, forma, fecha,monto, meses, estado, estado_pagos,estatus )
                                  VALUES(:id_deudas,:identificador,:concepto, :forma, :fecha, :monto, :meses, :estado ,:estado_pagos,:estatus)  ");

                $estado_pagos=1;
                $estatus=1;    
                $r->bindParam(':id_deudas',$this->id_deudas);	
                $r->bindParam(':identificador',$this->identificador);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':forma',$this->forma);	
                $r->bindParam(':fecha',$this->fecha);	
                $r->bindParam(':monto',$this->monto);	
                $r->bindParam(':meses',$this->meses);
                $r->bindParam(':estado',$this->estado);
                $r->bindParam(':estado_pagos',$estado_pagos);	
                $r->bindParam(':estatus',$estatus);	
                $r->execute();
    
//<!-----------------------------SE EJECUTA SI CONCEPTO ES MENSUALIDAD----------------------------------------------------------------------------------------------------------------------->               
                    $r= $co->prepare("UPDATE deudas d SET d.fecha = DATE_ADD(d.fecha, INTERVAL :meses MONTH) WHERE d.id = :id_deudas AND :concepto = 'mensualidad'");
                    $r->bindParam(':meses',$this->meses);	
                    $r->bindParam(':id_deudas',$this->id_deudas);
                    $r->bindParam(':concepto',$this->concepto);	 
                    $r->execute();

                    $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudas AND d.fecha >= CURRENT_DATE() AND :concepto = 'mensualidad'");                     
                    $r->bindParam(':id_deudas',$this->id_deudas);	
                    $r->bindParam(':concepto',$this->concepto);	                    
                    $r->execute();
//<!-----------------------------SE EJECUTA SI CONCEPTO ES INSCRIPCION----------------------------------------------------------------------------------------------------------------------->    
                    $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudas AND :concepto = 'inscripcion' ");                 
                    $r->bindParam(':id_deudas',$this->id_deudas);	
                    $r->bindParam(':concepto',$this->concepto);	                
                    $r->execute();

                $this->bitacora("se registro un pago", "docentes",$this->nivel);
                return "EL PAGO FUE REGISTRADO CON EXITO";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
            }
            else{
                return "EL PAGO YA SE ENCUENTRA REGISTRADO";
            }
        }
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 

















  //<!---------------------------------FUNCION QUE USA EL REPRESENTANTE PARA REGISTRAR UN PAGO------------------------------------------------------------------>  
        private function registrarr1(){

            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(!$this->existe($this->id)){
                try{

                    $r= $co->prepare("INSERT INTO pagos( id_deudas, identificador,concepto, forma, fecha, monto, meses,estado, estado_pagos, estatus)
                                     VALUES(:id_deudasr,:identificadorr,:conceptor, :formar, :fechar, :montor, :mesesr, :estador,:estado_pagosr,:estatusr )");
    
                    $estado_pagos=1;
                    $estatus=1;                    	
                    $r->bindParam(':id_deudasr',$this->id_deudas);	
                    $r->bindParam(':identificadorr',$this->identificador);	
                    $r->bindParam(':conceptor',$this->concepto);
                    $r->bindParam(':formar',$this->forma);	
                    $r->bindParam(':fechar',$this->fecha);
                    $r->bindParam(':montor',$this->monto);	
                    $r->bindParam(':mesesr',$this->meses);	
                    $r->bindParam(':estador',$this->estado);	
                    $r->bindParam(':estado_pagosr',$estado_pagos);	
                    $r->bindParam(':estatusr',$estatus);	
                    $r->execute();
                
//<!-----------------------------SE EJECUTA SI CONCEPTO ES MENSUALIDAD----------------------------------------------------------------------------------------------------------------------->      
                    $r= $co->prepare("UPDATE deudas d SET d.fecha = DATE_ADD(d.fecha, INTERVAL :mesesr MONTH) WHERE d.id = :id_deudasr AND :conceptor = 'mensualidad'");
                    $r->bindParam(':mesesr',$this->meses);	
                    $r->bindParam(':id_deudasr',$this->id_deudas);
                    $r->bindParam(':conceptor',$this->concepto);	 
                    $r->execute();

                    $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudasr AND d.fecha >= CURRENT_DATE() AND :conceptor = 'mensualidad'");                     
                    $r->bindParam(':id_deudasr',$this->id_deudas);	
                    $r->bindParam(':conceptor',$this->concepto);	                    
                    $r->execute();   

//<!-----------------------------SE EJECUTA SI CONCEPTO ES INSCRIPCION----------------------------------------------------------------------------------------------------------------------->       
                    $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudasr AND :conceptor = 'inscripcion' ");                 
                    $r->bindParam(':id_deudasr',$this->id_deudas);	
                    $r->bindParam(':conceptor',$this->concepto);	                
                    $r->execute(); 
   
                    $this->bitacora("se registro un pago", "docentes",$this->nivel);
                    return "EL PAGO FUE REGISTRADO CON EXITO";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "EL PAGO YA SE ENCUENTRA REGISTRADO";
                }

            }
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 




   











//<!---------------------------------FUNCION QUE SE USA PARA MODIFICAR LOS REGISTROS------------------------------------------------------------------>
private function modificar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
        try{
            $r= $co->prepare("UPDATE pagos SET 
                    
                id_deudas=:id_deudas,
                identificador=:identificador,
                concepto=:concepto,
                forma=:forma,
                fecha=:fecha,
                monto=:monto,
                meses=:meses,
                estado=:estado,     
                estado_pagos=:estado_pagos            
                WHERE
                id=:id
  
                ");
                $r->bindParam(':id',$this->id);	
                $r->bindParam(':id_deudas',$this->id_deudas);	
                $r->bindParam(':identificador',$this->identificador);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':forma',$this->forma);	
                $r->bindParam(':fecha',$this->fecha);	
                $r->bindParam(':monto',$this->monto);	
                $r->bindParam(':meses',$this->meses);
                $r->bindParam(':estado',$this->estado);	
                $r->bindParam(':estado_pagos',$this->estado_pagos  );
            $r->execute();
            

            $this->bitacora("se modifico un pago", "docentes",$this->nivel);
         
                return "Registro modificado";	
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        }
        else{
            return "Pago no registrado";
        }


    }

  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 

















//<!---------------------------------FUNCION CONSULTAR DT ADMIN------------------------------------------------------------------>          
public function consultar($nivel1){
    $co = $this->conecta();		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{			
			$resultado = $co->prepare("SELECT p.*, e.nombre, e.cedula FROM pagos p, deudas d,estudiantes e WHERE p.id_deudas = d.id  AND d.id_estudiante = e.cedula  AND p.estatus=1");
	

            $resultado->execute(); 
           $respuesta="";
            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_deudas']."</th>";             
                $respuesta=$respuesta."<th>".$r['identificador']."</th>";               
                $respuesta=$respuesta."<th>".$r['concepto']."</th>"; 
                $respuesta=$respuesta."<th>".$r['forma']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";             
                $respuesta=$respuesta."<th>".$r['monto']."</th>";
                $respuesta=$respuesta."<th>".$r['meses']."</th>";
                $respuesta=$respuesta."<th>".$r['cedula']."</th>";  
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";                      
                $respuesta=$respuesta."<th>".$r['estado']."</th>";        
                
                $respuesta=$respuesta.'<th> ';
                if (in_array("modificar pagos",$nivel1)) {
                $respuesta=$respuesta.'<a href="#editpago" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
            </a>';
                  }  if (in_array("eliminar pagos",$nivel1)) {
                    $respuesta=$respuesta.'<a href="#deletepago2" class="delete" data-toggle="modal"  onclick="eliminarr(`'.$r['id'].'`)">
                <i class="material-icons"  title="Deshacer"><img src="assets/icon/deshacer.png"/></i>               
            </a>  ';
                 }if (in_array("eliminar pagos",$nivel1)) {
            $respuesta=$respuesta.'<a href="#deletepago" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>               
            </a>  ';
                  }
                  
            $respuesta=$respuesta.' </th>';
             $respuesta= $respuesta.'</tr>';
            }          
            return $respuesta;			
		}catch(Exception $e){
			return false;
		}
}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
















//<!---------------------------------FUNCION CONSULTAR DT TURORES------------------------------------------------------------------>          
public function consultart($var){
    $co = $this->conecta();		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{		
                      
            $resultado1 = $co->prepare("SELECT usuarios_tutor.id_tutor FROM usuarios_tutor WHERE usuarios_tutor.id_usuarios = $var");
            $resultado1->execute();
            $var="";
            foreach($resultado1 as $r){
              $var=$r["id_tutor"];     
            }

			$resultado = $co->prepare("SELECT p.*, e.nombre, e.cedula 
            FROM pagos p 
            INNER JOIN deudas d on p.id_deudas=d.id 
            INNER JOIN estudiantes e on e.cedula = d.id_estudiante 
            INNER JOIN estudiantes_tutor et on et.id_estudiantes  = d.id_estudiante 
            WHERE p.estatus=1 AND  et.id_tutor= $var");
    
            $resultado->execute(); 
           $respuesta="";
            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_deudas']."</th>";             
                $respuesta=$respuesta."<th>".$r['identificador']."</th>";               
                $respuesta=$respuesta."<th>".$r['concepto']."</th>"; 
                $respuesta=$respuesta."<th>".$r['forma']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";             
                $respuesta=$respuesta."<th>".$r['monto']."</th>";
                $respuesta=$respuesta."<th>".$r['meses']."</th>";
                $respuesta=$respuesta."<th>".$r['cedula']."</th>";  
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";                      
                $respuesta=$respuesta."<th>".$r['estado']."</th>";        
                
                $respuesta=$respuesta.'<th> ';
            $respuesta=$respuesta.' </th>';
             $respuesta= $respuesta.'</tr>';
            }          
            return $respuesta;			
		}catch(Exception $e){
			return false;
		}
}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 















//<!---------------------------------FUNCION CONSULTAR SELECT ADMIN------------------------------------------------------------------>
public function consultar2(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
            $resultado = $co->prepare("SELECT * from deudas WHERE estado_deudas = 1");
            //<!----------SELECT * from deudas WHERE estado_deudas = 1-------------------->
			$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['id_estudiante'].' / -  '.$r['concepto'].'</option>';   
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_estudiante']."</th>";
                $respuesta=$respuesta."<th>".$r['concepto']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['estado']."</th>";
                $respuesta=$respuesta."<th>".$r['estado_deudas']."</th>";
                $respuesta= $respuesta.'</tr>';

            }

            $fila= array($respuesta,$respuesta2);
          
            return $fila;
			
		}catch(Exception $e){
			
			return false;
		}
}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 

















//<!---------------------------------fUNCION CONSULTAR SELECT TUTORES----------------------------------------------------------------->
public function consultarr($var){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
      $resultado1 = $co->prepare("SELECT usuarios_tutor.id_tutor FROM usuarios_tutor WHERE usuarios_tutor.id_usuarios=$var");
      $resultado1->execute();
      $var="";
      foreach($resultado1 as $r){
        $var=$r["id_tutor"];

    }
      $resultado = $co->prepare("SELECT d.* from deudas d                    
        INNER JOIN estudiantes e    
        ON d.id_estudiante = e.cedula       
        INNER JOIN estudiantes_tutor et       
        ON e.cedula = et.id_estudiantes       
        WHERE d.estado_deudas = 1 AND et.id_tutor = $var");


		$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['id_estudiante'].' / - '.$r['concepto'].'</option>';   
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_estudiante']."</th>";
                $respuesta=$respuesta."<th>".$r['concepto']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['estado']."</th>";
                $respuesta=$respuesta."<th>".$r['estado_deudas']."</th>";
               
             $respuesta= $respuesta.'</tr>';

            }

            $fila= array($respuesta,$respuesta2);
     
            return $fila;
			
		}catch(Exception $e){
			
			return false;
		}
}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 























//<!----------------------------------------------FUNCION EXISTE ------------------------------------------------------------------>
    private function existe($id){		
		$co = $this->conecta();		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			$resultado = $co->prepare("Select * from pagos where id=:id and estatus = '1'");			
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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 


















//<!---------------------------------FUNCION ELIMINAR ------------------------------------------------------------------>
private function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
    
        try {
                $r=$co->prepare("UPDATE pagos SET estatus = 0 , estado = 'ELIMINADO' WHERE id=:id");
                $r->bindParam(':id',$this->id);
                $r->execute();

          /*      $r=$co->prepare("UPDATE pagos p, deudas d SET p.estatus = 0, d.estado_deudas = 1, d.monto = d.monto + p.monto WHERE p.id=:id AND d.id = p.id_deudas ");
                $r->bindParam(':id',$this->id);
                $r->execute();*/
                      
                $this->bitacora("se elimino un pago", "docentes",$this->nivel);
                return "Registro Eliminado";
                
        } catch(Exception $e) {
            
            return $e->getMessage();
        }
        
    }
    else{
        return "Pago no registrado";
    }
}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 



















//<!---------------------------------FUNCION DESHACER PAGO------------------------------------------------------------------>
private function eliminar2(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
    
        try {
            
                $r=$co->prepare("UPDATE pagos p, deudas d SET p.estatus = 0, d.estado_deudas = 1, p.estado = 'RETORNADO' WHERE p.id=:id AND d.id = p.id_deudas AND p.concepto = 'inscripcion'");
                $r->bindParam(':id',$this->id);
                $r->execute();

                $r=$co->prepare("UPDATE pagos p, deudas d SET p.estatus = 0, d.fecha = DATE_SUB(d.fecha, INTERVAL p.meses MONTH)  WHERE p.id = :id AND d.id = p.id_deudas AND p.concepto = 'mensualidad'");      
                $r->bindParam(':id',$this->id);                              
                $r->execute();

                $r=$co->prepare("UPDATE pagos p, deudas d SET  d.estado_deudas = 1 WHERE p.id=:id AND d.id = p.id_deudas AND d.fecha <= CURRENT_DATE() AND p.concepto = 'mensualidad'");      
                $r->bindParam(':id',$this->id);                              
                $r->execute();
                
                 
                $this->bitacora("se elimino un pago", "docentes",$this->nivel);
                return "Registro Eliminado";
                
        } catch(Exception $e) {
            
            return $e->getMessage();
        }

    }
    else{
        return "Pago no registrado";
    }
}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 




















//<!----------------------------------------------FUNCION BITACORA----------------------------------------------------------------->
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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
    }
?>