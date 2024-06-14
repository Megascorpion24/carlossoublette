<?php

require_once('modelo/conexion.php');
class tutor_legal extends datos{


    private $cedula;
	private $nombre1;
    private $nombre2;
    private $apellido1;
	private $apellido2;
	private $telefono;
	private $correo;
	private $contacto_emer;
    private $nivel;

    public function set_cedula($valor){
        if (preg_match("/^[0-9]{6,8}$/", $valor)) {
            $this->cedula = $valor; 
            return true;
            }else{
                return false;
            }
        }
	public function set_nombre1($valor){
        if (preg_match("/^[A-Za-z]{4,20}$/", $valor)) {
            $this->nombre1 = $valor; 
            return true;
            }else{
                return false;
            }
        }
    public function set_nombre2($valor){
        if (preg_match("/^[A-Za-z]{4,20}$/", $valor)) {
            $this->nombre2 = $valor; 
            return true;
            }else{
                return false;
            }
        }
    public function set_apellido1($valor){
        if (preg_match("/^[A-Za-z]{4,20}$/", $valor)) {
            $this->apellido1 = $valor; 
            return true;
            }else{
                return false;
            }
        }
	public function set_apellido2($valor){
        if (preg_match("/^[A-Za-z]{4,20}$/", $valor)) {
            $this->apellido2 = $valor; 
            return true;
            }else{
                return false;
            }
        }
	public function set_telefono($valor){
        if (preg_match("/^[0-9]{11}$/", $valor)) {
            $this->telefono = $valor; 
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
	public function set_contacto_emer($valor){
        if (preg_match("/^[0-9]{11}$/", $valor)) {
            $this->contacto_emer = $valor; 
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
       return  $val;
    }

    public function modificar(){
        $val=  $this->modificar1();
        return  $val;
    }

    public function eliminar(){
        $val=$this->eliminar1();
        return  $val;
    }
  
    








//<!---------------------------------funcion registrar------------------------------------------------------------------>
    public function registrar1(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->cedula, "Select * from tutor_legal where cedula=:cedula and estado = '1'", ':cedula')){
            try{
                $r= $co->prepare("Insert into tutor_legal(
						
                            cedula,
                            nombre1,
                            nombre2,
                            apellido1,
                            apellido2,
                            telefono,
                            correo,
                            contacto_emer,
                            estado
                            )
            
                    Values( :cedula,
                            :nombre1,
                            :nombre2,
                            :apellido1,
                            :apellido2,
                            :telefono,
                            :correo,
                            :contacto_emer,
                            :estado
                    )"
                );
                $estado=1;
                $r->bindParam(':cedula',$this->cedula);	
                $r->bindParam(':nombre1',$this->nombre1);		
                $r->bindParam(':nombre2',$this->nombre2);	
                $r->bindParam(':apellido1',$this->apellido1);
                $r->bindParam(':apellido2',$this->apellido2);	
                $r->bindParam(':telefono',$this->telefono);	
                $r->bindParam(':correo',$this->correo);	
                $r->bindParam(':contacto_emer',$this->contacto_emer);	
                $r->bindParam(':estado',$estado);	
            
             
                $r->execute();

                $t="1";
                $claveencr=password_hash($this->cedula, PASSWORD_DEFAULT, ['cost'=>10]);
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
                        19
                    )");
                    $r->bindParam(':id',$this->cedula);
                $r->bindParam(':nombre',$this->nombre1);	
                
               
                $r->bindParam(':correo',$this->correo);	
                $r->bindParam(':clave',$claveencr);	
                $r->bindParam(':estado',$t);
                
                $r->execute();
                $lid1 = $co->lastInsertId();

                $r= $co->prepare("Insert into usuarios_tutor(
						
                    
                    id_usuarios, 
                    id_tutor
                    )
            

                    Values(
                        
                        :id_usuarios,
                        :id_tutor
                    )");
                    $r->bindParam(':id_usuarios',$this->cedula);	
                    $r->bindParam(':id_tutor',$this->cedula);
                    
                    $r->execute();
      
                
               	

                $this->bitacora("se registro un representante", "representantes",$this->nivel);
             
                return "1REGISTRADO CON EXITO";
                
            }catch(Exception $e){
                
                return $e->getMessage();
            }
        }
            else{
                return "4CEDULA YA EXISTE";
            }
  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        








 






//<!---------------------------------funcion modificar------------------------------------------------------------------>
        public function modificar1(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->cedula, "Select * from tutor_legal where cedula=:cedula and estado = '1'", ':cedula')){
                try{
                    $r= $co->prepare("Update tutor_legal set 
                            
                       
                        nombre1=:nombre1,
                        nombre2=:nombre2,
                        apellido1=:apellido1,
                        apellido2=:apellido2,
                        telefono=:telefono,                      
                        correo=:correo,
                        contacto_emer=:contacto_emer
                        where
						cedula =:cedula
                        
                
                         
                            
                            
                        ");
                    $r->bindParam(':cedula',$this->cedula);	
                    $r->bindParam(':nombre1',$this->nombre1);	
                    $r->bindParam(':nombre2',$this->nombre2);	
                    $r->bindParam(':apellido1',$this->apellido1);	
                    $r->bindParam(':apellido2',$this->apellido2);	
                    $r->bindParam(':telefono',$this->telefono);	
                    $r->bindParam(':correo',$this->correo);	
                    $r->bindParam(':contacto_emer',$this->contacto_emer);	                 
                    $r->execute();

                    
                    $this->bitacora("se modifico un representante", "representantes",$this->nivel);
                    
                    return "2REGISTRO MODIFICADO";
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "4PAGO NO REGISTRADO";
                }
        

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
public function consultar($nivel1){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * FROM tutor_legal WHERE estado=1");
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta=$respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['cedula']."</th>";
                $respuesta=$respuesta."<th>".$r['nombre1']."</th>";  
                $respuesta=$respuesta."<th>".$r['nombre2']."</th>";           
                $respuesta=$respuesta."<th>".$r['apellido1']."</th>";      
                $respuesta=$respuesta."<th>".$r['apellido2']."</th>";        
                $respuesta=$respuesta."<th>".$r['telefono']."</th>";
                $respuesta=$respuesta."<th>".$r['correo']."</th>";
                $respuesta=$respuesta."<th>".$r['contacto_emer']."</th>";
                $respuesta=$respuesta.'<th>';
                if (in_array("modificar representante",$nivel1)) {               
                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['cedula'].'`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
            }
            if(in_array("eliminar representante",$nivel1)){
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
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>


















//<!---------------------------------fin de funcion existe------------------------------------------------------------------>






















//<!---------------------------------funcion eliminar------------------------------------------------------------------>
public function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->cedula, "Select * from tutor_legal where cedula=:cedula and estado = '1'", ':cedula')){
        try {




        $resultado = $co->prepare("SELECT e.*, et.*
        FROM estudiantes e
        JOIN estudiantes_tutor et ON e.cedula = et.id_estudiantes
        WHERE et.id_tutor = :cedula AND e.estado = 1;");
        $resultado->bindParam(':cedula',$this->cedula);
        $resultado->execute();
        $respuesta="";
        $respuesta2="";
        foreach($resultado as $r){
        $respuesta2 =$r['cedula'];
        }

                if (empty($respuesta2)) {
                    # code...
                    
                
                $r= $co->prepare("UPDATE tutor_legal  SET estado = 0 WHERE cedula=:cedula");           
                $r->bindParam(':cedula',$this->cedula);	               	
                $r->execute();

                $this->bitacora("Se Elimino Un Representante", "Pagos",$this->nivel);
                    return "3REGISTRO ELIMINADO";
                    }else{
                    return "4No se puede eliminar Tiene estudiante activo";
                    }                       
                } catch(Exception $e) {
                    return $e->getMessage();
                }        
            }
      else{
            return "4CEDULA NO REGISTRADA";
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