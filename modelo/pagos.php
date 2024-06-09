<?php

require_once('conexion.php');
class pagos extends datos{

    
    private $id;
	private $id_deudas;
	private $identificador;
    private $concepto;
    private $forma;
	private $fecha;
    private $fechad;
	private $estado;
    private $estado_pagos;
    private $estatus;
    private $monto;
    private $meses;
    private $nivel;

    private $codigo;
    private $tipo;
    private $m_montos;
    private $d_montos;


    private $fechaActual;
    private $file;
    private $precio;

    

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
    public function set_fechad($valor){
        if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $valor)) {
		$this->fechad = $valor; 
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



    public function set_codigo($valor){
        if (preg_match("/^[a-zA-Z1-9\s]+$/", $valor)) {
		$this->codigo = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_tipo($valor){
        if (preg_match("/^[a-zA-Z1-9\s]+$/", $valor)) {
		$this->tipo = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_m_montos($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->m_montos = $valor; 
        return true;
        }else{
            return false;
        }
	}
    public function set_d_montos($valor){
        if (preg_match("/^[a-zA-Z0-9\s]+$/", $valor)) {
		$this->d_montos = $valor; 
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
       return $VAL;
    }

    public function registrarr(){
        $VAL=  $this->registrarr1();
        return $VAL;
    }

    public function registrarp(){
        $VAL=  $this->registrarp1();
        return $VAL;
    }

    public function modificar(){
        $VAL=  $this->modificar1();
        return $VAL;
    }

    public function montos(){
        $VAL=  $this->modificarMM();
        return $VAL;
    }

    public function eliminar(){
        $VAL= $this->eliminar1();
        return $VAL;
    }

   


    




	
  //<!--------------------------------FUNCION QUE USA EL ADMINISTRADOR PARA REGISTRAR UN PAGO------------------------------------------------------------------> 
    private function registrar1(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->id)){
            try{
              
                $r= $co->prepare("INSERT INTO pagos( id_deudas, identificador, concepto, forma, fecha, fechad, monto, meses, estado, estado_pagos,estatus )
                                  VALUES(:id_deudas,:identificador,:concepto, :forma, :fecha, :fechad, :monto, :meses, :estado ,:estado_pagos,:estatus)  ");

                $estado_pagos=1; 
                $estatus=1;    
                $r->bindParam(':id_deudas',$this->id_deudas);	
                $r->bindParam(':identificador',$this->identificador);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':forma',$this->forma);	
                $r->bindParam(':fecha',$this->fecha);	
                $r->bindParam(':fechad',$this->fechad);
                $r->bindParam(':monto',$this->monto);	
                $r->bindParam(':meses',$this->meses);
                $r->bindParam(':estado',$this->estado);
                $r->bindParam(':estado_pagos',$estado_pagos);	
                $r->bindParam(':estatus',$estatus);	
                $r->execute();
    
//<!-----------------------------SE EJECUTA SI CONCEPTO ES MENSUALIDAD-----------------------------------------------------------------------------------------------------------------------> 
//<!-----------------------------suma el monto del formulario a la deuda en caso de pago de 1 mensualidad-----------------------------------------------------------------------------------------------------------------------> 
                $r= $co->prepare("UPDATE deudas d SET d.monto = d.monto + :monto WHERE d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses = 1 AND :estado = 'Confirmado'");                  	
                $r->bindParam(':id_deudas',$this->id_deudas);                    
                $r->bindParam(':monto',$this->monto);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':meses',$this->meses);
                $r->bindParam(':estado',$this->estado);
                $r->execute();

                $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE EXISTS (SELECT * FROM montos WHERE montos.m_montos = d.monto AND montos.tipo = 'mensualidad' ) AND d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses = 1 AND d.fecha >= CURRENT_DATE() AND :estado = 'Confirmado'");               	
                $r->bindParam(':id_deudas',$this->id_deudas);   
                $r->bindParam(':meses',$this->meses);                 
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':estado',$this->estado);
                $r->execute();
//<!-----------------------------suma los meses del formulario a la fecha de la deuda en caso se pago de 1 meses -----------------------------------------------------------------------------------------------------------------------> 
                $r= $co->prepare("UPDATE deudas d SET d.monto = 0, d.fecha = DATE_ADD(d.fecha, INTERVAL :meses MONTH) WHERE EXISTS (SELECT * FROM montos WHERE montos.m_montos = d.monto AND montos.tipo = 'mensualidad' ) AND d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses = 1 AND :estado = 'Confirmado'");
                $r->bindParam(':meses',$this->meses);	
                $r->bindParam(':id_deudas',$this->id_deudas);
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':estado',$this->estado); 
                $r->execute();


//<!-----------------------------PAGO MULTIPLE DE MENSUALIDAD-----------------------------------------------------------------------------------------------------------------------> 
//<!-----------------------------suma los meses del formulario a la fecha de la deuda en caso se pago de varios meses -----------------------------------------------------------------------------------------------------------------------> 
                $r= $co->prepare("UPDATE deudas d SET d.fecha = DATE_ADD(d.fecha, INTERVAL :meses MONTH) WHERE d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses >= 2 AND :estado = 'Confirmado'");
                $r->bindParam(':meses',$this->meses);	
                $r->bindParam(':id_deudas',$this->id_deudas);
                $r->bindParam(':concepto',$this->concepto);	 
                $r->bindParam(':estado',$this->estado);
                $r->execute();
//<!-----------------------------cambia el estado de la deuda a 0 si la fecha en igual o superior a la actual----------------------------------------------------------------------------------------------------------------------->
                $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE  d.id = :id_deudas AND d.fecha >= CURRENT_DATE() AND :concepto = 'mensualidad' AND :meses >= 2 AND :estado = 'Confirmado'");               	
                $r->bindParam(':id_deudas',$this->id_deudas);   
                $r->bindParam(':meses',$this->meses);                 
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':estado',$this->estado);
                $r->execute();




//<!-----------------------------SE EJECUTA SI CONCEPTO ES INSCRIPCION----------------------------------------------------------------------------------------------------------------------->    
                $r= $co->prepare("UPDATE deudas d SET d.monto = d.monto + :monto WHERE d.id = :id_deudas AND :concepto = 'inscripcion'AND :estado = 'Confirmado' ");                  	
                $r->bindParam(':id_deudas',$this->id_deudas);                    
                $r->bindParam(':monto',$this->monto);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':estado',$this->estado);
                $r->execute();

                $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE EXISTS (SELECT * FROM montos WHERE montos.m_montos = d.monto AND montos.tipo = 'inscripcion' ) AND d.id = :id_deudas AND :concepto = 'inscripcion' AND :estado = 'Confirmado'");               	
                $r->bindParam(':id_deudas',$this->id_deudas);                    
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':estado',$this->estado);
                $r->execute();
//<!----------------------------PAGO UNICO DE MENSUALIDAD-----------------------------------------------------------------------------------------------------------------------> 



                $this->bitacora("se registro un pago", "Pagos",$this->nivel);
                return "1PAGO REGISTRADO CON EXITO";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
            }
            else{
                return "4EL PAGO YA SE ENCUENTRA REGISTRADO";
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
                    $r= $co->prepare("INSERT INTO pagos( id_deudas, identificador, concepto, forma, fecha, fechad, monto, meses, estado, estado_pagos,estatus )
                    VALUES(:id_deudas,:identificador,:concepto, :forma, :fecha, :fechad, :monto, :meses, :estado ,:estado_pagos,:estatus)  ");

                    $estado_pagos=1;
                    $estatus=1;    
                    $r->bindParam(':id_deudas',$this->id_deudas);	
                    $r->bindParam(':identificador',$this->identificador);	
                    $r->bindParam(':concepto',$this->concepto);	
                    $r->bindParam(':forma',$this->forma);	
                    $r->bindParam(':fecha',$this->fecha);	
                    $r->bindParam(':fechad',$this->fechad);
                    $r->bindParam(':monto',$this->monto);	
                    $r->bindParam(':meses',$this->meses);
                    $r->bindParam(':estado',$this->estado);
                    $r->bindParam(':estado_pagos',$estado_pagos);	
                    $r->bindParam(':estatus',$estatus);	
                    $r->execute();
            
   
                    $this->bitacora("se registro un pago", "Pagos",$this->nivel);
                    return "1PAGO REGISTRADO CON EXITO";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "4EL PAGO YA SE ENCUENTRA REGISTRADO";
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
                estado=:estado                          
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
                $r->bindParam(':estado',$this->estado);	
         
            $r->execute();       


            $this->bitacora("se modifico un pago", "Pagos",$this->nivel);
         
                return "2REGISTRO MODIFICADO";
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        }
        else{
            return "4PAGO NO REGISTRADO";
        }


    }

  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 

 public function dolar(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{

            $fechaActual = date("Y-m-d");
            $file = "dolar-bcv.json";
            $precio = obtenerPrecioBCVOnline($fechaActual, $file);

            $r = $co->prepare("UPDATE dolar_venezuela SET  valor = :valor WHERE id = 1 ");    
                $r->bindParam(':valor',$precio);	         
                $r->execute();


            $r = $co->prepare("UPDATE montos SET m_montos = d_montos * :precio WHERE codigo = 1 OR codigo = 2");      
                $r->execute(['precio' => $precio]);


        }catch(Exception $e){
            return $e->getMessage();
        }
    }


    


//<!---------------------------------FUNCION QUE SE USA PARA MODIFICAR LOS REGISTROS------------------------------------------------------------------>
private function modificarMM(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe2($this->codigo)){
        try{


            $fechaActual = date("Y-m-d");
            $file = "dolar-bcv.json";
            $precio = obtenerPrecioBCVOnline($fechaActual, $file);
            $r = $co->prepare("UPDATE dolar_venezuela SET  valor = :valor WHERE id = 1");    
                $r->bindParam(':valor',$precio);	         
                $r->execute();


                $r = $co->prepare("UPDATE montos SET 
                tipo = :tipo,
                m_montos = (SELECT valor FROM dolar_venezuela) * :d_montos,
                d_montos = :d_montos
                WHERE
                codigo = :codigo");

                $r->bindParam(':codigo',$this->codigo);	
                $r->bindParam(':tipo',$this->tipo);	
                $r->bindParam(':m_montos',$this->m_montos);	
                $r->bindParam(':d_montos',$this->d_montos);	
                $r->execute();
  
                $r = $co->prepare("UPDATE deudas d
                SET d.estado_deudas = 0
                WHERE EXISTS (
                    SELECT *
                    FROM montos m
                    WHERE m.m_montos < d.monto )AND d.concepto = 'inscripcion'");
                $r->execute();  

      

     

            $this->bitacora("se modifico un pago", "Pagos",$this->nivel);
         
            return "2REGISTRO MODIFICADO";	
            
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    else{
        return "4MONTO NO REGISTRADO";
    } 
   


    }

  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 

















//<!---------------------------------FUNCION QUE SE USA PARA CONFIRMAR UN PAGO------------------------------------------------------------------>
private function registrarp1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
        try{
            
            
            $r= $co->prepare("UPDATE pagos SET 
                    
                id_deudas=:id_deudas,
                identificador=:identificador,
                fecha=:fecha,
                fechad=:fechad,
                concepto=:concepto,
                forma=:forma,
                monto=:monto,
                meses=:meses,
                estado=:estado,     
                estado_pagos=:estado_pagos,    
                estatus=:estatus           
                WHERE
                id=:id

                ");



         
                $r->bindParam(':id',$this->id);	
                $r->bindParam(':id_deudas',$this->id_deudas);	
                $r->bindParam(':identificador',$this->identificador);	
                $r->bindParam(':fecha',$this->fecha);	
                $r->bindParam(':fechad',$this->fechad);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':forma',$this->forma);	             
                $r->bindParam(':monto',$this->monto);	
                $r->bindParam(':meses',$this->meses);
                $r->bindParam(':estado',$this->estado);	
                $r->bindParam(':estado_pagos',$this->estado_pagos);
                $r->bindParam(':estatus',$this->estatus);	
            $r->execute();       


            //<!-----------------------------SE EJECUTA SI CONCEPTO ES INSCRIPCION----------------------------------------------------------------------------------------------------------------------->    
            $r2= $co->prepare("UPDATE deudas d INNER JOIN pagos p ON d.id = p.id_deudas SET d.monto = d.monto + :monto, p.estado = 'Confirmado' WHERE d.id = :id_deudas AND :concepto = 'inscripcion'; ");                  	
            $r2->bindParam(':id_deudas',$this->id_deudas);                    
            $r2->bindParam(':monto',$this->monto);	
            $r2->bindParam(':concepto',$this->concepto);	
            $r2->execute();

            $r3= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE EXISTS (SELECT * FROM montos WHERE montos.m_montos = d.monto AND montos.tipo = 'inscripcion' ) AND d.id = :id_deudas AND :concepto = 'inscripcion'");               	
            $r3->bindParam(':id_deudas',$this->id_deudas);                    
            $r3->bindParam(':concepto',$this->concepto);	
            $r3->execute();

            //<!-----------------------------PAGO MULTIPLE DE MENSUALIDAD-----------------------------------------------------------------------------------------------------------------------> 
            //<!-----------------------------suma los meses del formulario a la fecha de la deuda en caso se pago de varios meses -----------------------------------------------------------------------------------------------------------------------> 
            $r4= $co->prepare("UPDATE deudas d INNER JOIN pagos p ON d.id = p.id_deudas SET d.fecha = DATE_ADD(d.fecha, INTERVAL :meses MONTH), p.estado = 'Confirmado'WHERE d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses >= 2");
            $r4->bindParam(':meses',$this->meses);	
            $r4->bindParam(':id_deudas',$this->id_deudas);
            $r4->bindParam(':concepto',$this->concepto);	 
            $r4->execute();
            //<!-----------------------------cambia el estado de la deuda a 0 si la fecha en igual o superior a la actual----------------------------------------------------------------------------------------------------------------------->
            $r5= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE  d.id = :id_deudas AND d.fecha >= CURRENT_DATE() AND :concepto = 'mensualidad' AND :meses >= 2");               	
            $r5->bindParam(':id_deudas',$this->id_deudas);   
            $r5->bindParam(':meses',$this->meses);                 
            $r5->bindParam(':concepto',$this->concepto);	
            $r5->execute();
            //<!----------------------------PAGO UNICO DE MENSUALIDAD-----------------------------------------------------------------------------------------------------------------------> 

            //<!-----------------------------SE EJECUTA SI CONCEPTO ES MENSUALIDAD-----------------------------------------------------------------------------------------------------------------------> 
            //<!-----------------------------suma el monto del formulario a la deuda en caso de pago de 1 mensualidad-----------------------------------------------------------------------------------------------------------------------> 
            $r= $co->prepare("UPDATE deudas d INNER JOIN pagos p ON d.id = p.id_deudas SET d.monto = d.monto + :monto , p.estado = 'Confirmado' WHERE d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses = 1 ");                  	
            $r->bindParam(':id_deudas',$this->id_deudas);                    
            $r->bindParam(':monto',$this->monto);	
            $r->bindParam(':concepto',$this->concepto);	
            $r->bindParam(':meses',$this->meses);
            $r->execute();

            $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE EXISTS (SELECT * FROM montos WHERE montos.m_montos = d.monto AND montos.tipo = 'mensualidad' ) AND d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses = 1 AND d.fecha >= CURRENT_DATE()");               	
            $r->bindParam(':id_deudas',$this->id_deudas);   
            $r->bindParam(':meses',$this->meses);                 
            $r->bindParam(':concepto',$this->concepto);	
            $r->execute();
            //<!-----------------------------suma los meses del formulario a la fecha de la deuda en caso se pago de 1 meses -----------------------------------------------------------------------------------------------------------------------> 
            $r= $co->prepare("UPDATE deudas d SET d.monto = 0, d.fecha = DATE_ADD(d.fecha, INTERVAL :meses MONTH) WHERE EXISTS (SELECT * FROM montos WHERE montos.m_montos = d.monto AND montos.tipo = 'mensualidad' ) AND d.id = :id_deudas AND :concepto = 'mensualidad' AND :meses = 1");
            $r->bindParam(':meses',$this->meses);	
            $r->bindParam(':id_deudas',$this->id_deudas);
            $r->bindParam(':concepto',$this->concepto);	 
            $r->execute();


            $this->bitacora("se confirmo un pago", "Pagos",$this->nivel);
         
                return "1PAGO CONFIRMADO";	
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        }
        else{
            return "4PAGO NO REGISTRADO";
        }


    }

  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 






































  









//<!---------------------------------FUNCION CONSULTAR DE ADMIN------------------------------------------------------------------>          
public function consultar($nivel1){
    $co = $this->conecta();		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{	


	

            $resultado = $co->prepare("SELECT p.*, e.nombre, e.cedula, tl.nombre1, tl.cedula as 'cedula2', DATE_ADD(p.fechad, INTERVAL p.meses MONTH) AS 'fecha_vencimiento' FROM pagos p 
            INNER JOIN deudas d ON p.id_deudas = d.id 
            INNER JOIN estudiantes e ON d.id_estudiante = e.cedula 
            INNER JOIN estudiantes_tutor et ON e.cedula = et.id_estudiantes 
            INNER JOIN tutor_legal tl ON et.id_tutor = tl.cedula WHERE p.estatus = 1 ");
            $resultado->execute(); 


           //Consulta movil
           if(in_array("request_app", $nivel1)){ // Corregido aquí
            $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $r;
        }


           $respuesta="";
            foreach($resultado as $r){
                $respuesta=$respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_deudas']."</th>";  
                $respuesta=$respuesta."<th>".$r['cedula2']."</th>";  
                $respuesta=$respuesta."<th>".$r['nombre1']."</th>";            
                $respuesta=$respuesta."<th>".$r['identificador']."</th>";               
                $respuesta=$respuesta."<th>".$r['concepto']."</th>"; 
                $respuesta=$respuesta."<th>".$r['forma']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['fechad']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha_vencimiento']."</th>";
                $respuesta=$respuesta."<th>".$r['monto']."</th>";
                $respuesta=$respuesta."<th>".$r['cedula']."</th>";  
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";                      
                $respuesta=$respuesta."<th>".$r['estado']."</th>";  
                 

              
       
                
                $respuesta=$respuesta.'<th> ';
                if (in_array("modificar pagos",$nivel1)) {
                $respuesta=$respuesta.'<a href="#editpago" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
            </a>';
                 }if (in_array("modificar pagos",$nivel1)) {
                $respuesta=$respuesta.'<a href="#verpago" class="edit" data-toggle="modal" onclick="ver(`'.$r['id'].'`)">
               <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/search.png"/></i>
            </a>';
                 }if (in_array("eliminar pagos",$nivel1)) {
            $respuesta=$respuesta.'<a href="#deletepago" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>               
            </a>  ';
                  }
                  
            $respuesta=$respuesta.' </th>';
             $respuesta=$respuesta.'</tr>';
            }          
            return $respuesta;			
		}catch(Exception $e){
			return false;
		}
}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 






//<!---------------------------------FUNCION CONSULTAR DE TURORES------------------------------------------------------------------>          
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



			$resultado = $co->prepare("SELECT p.*, e.nombre, e.cedula, tl.nombre1, tl.cedula as 'cedula2', DATE_ADD(p.fechad, INTERVAL p.meses MONTH) AS 'fecha_vencimiento' FROM pagos p 
            INNER JOIN deudas d on p.id_deudas = d.id 
            INNER JOIN estudiantes e ON d.id_estudiante = e.cedula 
            INNER JOIN estudiantes_tutor et ON e.cedula = et.id_estudiantes 
            INNER JOIN tutor_legal tl ON et.id_tutor = tl.cedula
            WHERE p.estatus=1 AND  et.id_tutor= $var");
    
            $resultado->execute(); 
           $respuesta="";
            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_deudas']."</th>";  
                $respuesta=$respuesta."<th>".$r['cedula2']."</th>";  
                $respuesta=$respuesta."<th>".$r['nombre1']."</th>";            
                $respuesta=$respuesta."<th>".$r['identificador']."</th>";               
                $respuesta=$respuesta."<th>".$r['concepto']."</th>"; 
                $respuesta=$respuesta."<th>".$r['forma']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['fechad']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha_vencimiento']."</th>";
                $respuesta=$respuesta."<th>".$r['monto']."</th>";
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



//<!---------------------------------FUNCION CONSULTAR DT ADMIN MONTO------------------------------------------------------------------>          

public function consultamonto($nivel1){
    $co = $this->conecta();		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{	
 
            
			$resultado = $co->prepare("SELECT * FROM montos");
            $resultado->execute(); 

           $respuesta="";
            foreach($resultado as $r){
                $respuesta=$respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['codigo']."</th>";
                $respuesta=$respuesta."<th>".$r['tipo']."</th>";  
                $respuesta=$respuesta."<th>".$r['m_montos']."</th>";    
                $respuesta=$respuesta."<th>".$r['d_montos']."</th>";                    
                $respuesta=$respuesta.'<th> ';
                if (in_array("modificarmontos",$nivel1)) {
                $respuesta=$respuesta.'<a href="#editmontos" class="edit" data-toggle="modal" onclick="montos(`'.$r['codigo'].'`)">
               <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
            </a>';
                 }
                  
            $respuesta=$respuesta.' </th>';
             $respuesta=$respuesta.'</tr>';
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
			
			
            $resultado = $co->prepare("SELECT d.*, (m.m_montos - d.monto) AS monto_restante, (m.m_montos) AS montototal, (m.m_montos) AS montooculto
            FROM deudas d
            INNER JOIN montos m ON d.concepto = m.tipo
            WHERE d.estado_deudas = 1 AND TIMESTAMPDIFF(DAY, fecha, NOW()) > 30
            AND d.id NOT IN (SELECT id_deudas FROM pagos WHERE estado = 'pendiente')");      
			$resultado->execute();

           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="" >-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['id_estudiante'].' / -  '.$r['concepto'].'</option>';   
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_estudiante']."</th>";
                $respuesta=$respuesta."<th>".$r['concepto']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['estado']."</th>";
                $respuesta=$respuesta."<th>".$r['estado_deudas']."</th>";
                $respuesta=$respuesta."<th>".$r['monto_restante']."</th>";
                $respuesta=$respuesta."<th>".$r['montototal']."</th>";
                $respuesta=$respuesta."<th>".$r['montooculto']."</th>";
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







//<!---------------------------------FUNCION CONSULTAR SELECT ADMIN CONFIRMAR PAGOS------------------------------------------------------------------>
public function consultar3(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
            $resultado = $co->prepare("SELECT p.* , (m.m_montos - d.monto) AS monto_restante, (m.m_montos) AS montototal ,(m.m_montos) AS montooculto FROM pagos p 
            INNER JOIN deudas d ON p.id_deudas = d.id
            INNER JOIN montos m ON d.concepto = m.tipo
            WHERE p.estatus = 1 AND p.estado = 'pendiente' ");      
			$resultado->execute();

           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="" >-Seleccionar-</option>';
          
            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['id'].' /  '.$r['id_deudas'].' /  '.$r['concepto'].'</option>';   
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_deudas']."</th>";
                $respuesta=$respuesta."<th>".$r['concepto']."</th>";
                $respuesta=$respuesta."<th>".$r['identificador']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['fechad']."</th>";
                $respuesta=$respuesta."<th>".$r['forma']."</th>";
                $respuesta=$respuesta."<th>".$r['monto']."</th>";
                $respuesta=$respuesta."<th>".$r['meses']."</th>";
                $respuesta=$respuesta."<th>".$r['estado']."</th>";
                $respuesta=$respuesta."<th>".$r['estado_pagos']."</th>";
                $respuesta=$respuesta."<th>".$r['estatus']."</th>";

                $respuesta=$respuesta."<th>".$r['monto_restante']."</th>";
                $respuesta=$respuesta."<th>".$r['montototal']."</th>";
                $respuesta=$respuesta."<th>".$r['montooculto']."</th>";
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
      $resultado = $co->prepare("SELECT d.*, (m.m_montos - d.monto) AS monto_restante, (m.m_montos) AS montototal, (m.m_montos) AS montooculto
      FROM deudas d
      INNER JOIN estudiantes e
      ON d.id_estudiante = e.cedula
      INNER JOIN estudiantes_tutor et
      ON e.cedula = et.id_estudiantes
      INNER JOIN montos m
      ON d.concepto = m.tipo
      WHERE d.estado_deudas = 1 AND et.id_tutor = $var AND TIMESTAMPDIFF(DAY, fecha, NOW()) > 30
      AND d.id NOT IN (SELECT id_deudas FROM pagos WHERE estado = 'pendiente') ");


		$resultado->execute();



           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="" >-Seleccionar-</option>';

           foreach($resultado as $r){
            $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['id_estudiante'].' / -  '.$r['concepto'].'</option>';   
            $respuesta= $respuesta.'<tr>';
            $respuesta=$respuesta."<th>".$r['id']."</th>";
            $respuesta=$respuesta."<th>".$r['id_estudiante']."</th>";
            $respuesta=$respuesta."<th>".$r['concepto']."</th>";
            $respuesta=$respuesta."<th>".$r['fecha']."</th>";
            $respuesta=$respuesta."<th>".$r['estado']."</th>";
            $respuesta=$respuesta."<th>".$r['estado_deudas']."</th>";
            $respuesta=$respuesta."<th>".$r['monto_restante']."</th>";
            $respuesta=$respuesta."<th>".$r['montototal']."</th>";
            $respuesta=$respuesta."<th>".$r['montooculto']."</th>";
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







  




































  











//<!----------------------------------------------FUNCION EXISTE PAGOS ------------------------------------------------------------------>
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

//<!----------------------------------------------FUNCION EXISTE MONTOS------------------------------------------------------------------>
private function existe2($codigo){		
    $co = $this->conecta();		
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    try{
        $resultado = $co->prepare("Select * from montos where codigo=:codigo ");			
        $resultado->bindParam(':codigo',$codigo);
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


                      
                $this->bitacora("se elimino un pago", "Pagos",$this->nivel);
                return "3REGISTRO ELIMINADO";
                
        } catch(Exception $e) {
            
            return $e->getMessage();
        }
        
    }
    else{
        return "4REGISTRO NO EXISTE";
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