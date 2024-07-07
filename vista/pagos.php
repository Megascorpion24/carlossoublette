<?php


require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("../carlossoublette/");
$dotenv->load();
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = $_ENV['JWT_SECRET_KEY'];

if(isset($_COOKIE['token'])){
	$decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
} else {
	header('location:index.php');
}
		  if(empty($_SESSION)){
		  session_start();
		  }

	  	  if(isset($_SESSION['permisos'])){
			 $nivel1 = $_SESSION['permisos'];
		
		  }
		  else{
			  $nivel1 = "";
		  }
	    ?>


<!DOCTYPE html>
	<html lang="es">
		<head>
			<?php  require_once('comunes/header.php');?>
			<?php require_once('comunes/menu.php'); ?>
		
		</head>
	<body>

 
	

<!---------------------------------------------------------------------- MAIN -------------------------------------------------------------------------->
	<main>

			<div class="head-title pt-3  mx-auto" style="width: 400px;  ">
				<div class="left">
					<h1 >GESTION DE PAGOS </h1>
				</div>
			</div>


			<div class="main-content">
			     <div class="row">
<!---------------------------------------------------------------------- TABLA -------------------------------------------------------------------------->	 
<div class="col-md-5">
					   <div class="table">
					     
							<div class="table-title  mb-3">
								<div class="row ">
										<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
											<h2 class="ml-lg-2">Tabla de Montos</h2>
										</div>
										
								</div>
							</div>
					   
							<table id="tablas2" style="width:100%" class="table table-striped display nowrap">
								<thead>
									<tr>
				
									<th>Codigo</th>
									<th>Tipo</th>	
									<th>Monto Bs</th>	
									<th>Monto $</th>													
									<th>Acción</th>
									</tr>
								</thead>
								<?PHP if (in_array("consultarmontos", $nivel1)) {?>
								<tbody id="tabla2">						  						
										<?php
											if(!empty($consutamonto)){
												echo $consutamonto;
											}
										?>   							 
								</tbody>
								<?php } ?>
					
		
																				
							</table>					   
						</div>
					</div>
<!---------------------------------------------------------------------- TABLA -------------------------------------------------------------------------->	 
<!---------------------------------------------------------------------- TABLA -------------------------------------------------------------------------->	 
				    <div class="col-md-12">
					   <div class="table">
					     
							<div class="table-title  mb-3">
								<div class="row ">
										<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
											<h2 class="ml-lg-2">Información de Pagos</h2>
										</div>
										<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<?PHP if (in_array("registrar pagos", $nivel1)) {?>
											<a href="#addpago" class="btn btn-success" data-toggle="modal">
												<i class="material-icons " style="width:100%" title="registrar"></i>
												<span>Realizar Pago</span>
											</a>

											<?php } ?>

											<?PHP if (in_array("Confirmar Pago", $nivel1)) {?>
											<a href="#confirmarpagos" class="btn btn-primary" data-toggle="modal">
												<i class="material-icons " style="width:100%" title="registrar"></i>
												<span>Confirmar Pago</span>
											</a>

											<?php } ?>

											<?PHP if (in_array("registrar pagos_tutor", $nivel1)) {?>
											<a href="#addpagorepre" class="btn btn-success" data-toggle="modal">
												<i class="material-icons " style="width:100%" title="registrarr"></i>
												<span>Realizar Pago ( Tutor )</span>
											</a>
											<?php } ?>
											
										</div>
								</div>
							</div>
					   

					   
							<table id="tablas" style="width:100% " class="table table-striped display nowrap ">
								<thead>
									<tr>
				
									<th>ID</th>
									<th>N° Deuda</th>	
									<th>C.I Tutor</th>
									<th>Tutor</th>								
									<th>Ref</th>
									<th>Concepto</th>
									<th>F/P</th>
									<th>Fecha Pago</th>
									<th>Desde</th>
									<th>Hasta</th>
									<th>Bs</th>									
									<th>C.I</th>
									<th>Estudiante</th>
									<th>Estado</th>							
									<th>Acción</th>
									</tr>
								</thead>
								<?PHP if (in_array("consultar pagos", $nivel1)) {?>
								<tbody id="tabla">						  						
										<?php
											if(!empty($consuta)){
												echo $consuta;
											}
										?>   							 
								</tbody>
								<?php } ?>
								<?PHP if (in_array("consultar pagos_tutor", $nivel1)) {?>
								<tbody id="tabla">						  						
										<?php
											if(!empty($consutat)){
												echo $consutat;
											}
										?>   							 
								</tbody>
								<?php } ?>
		
																				
							</table>					   
						</div>
					</div>
<!---------------------------------------------------------------------- TABLA -------------------------------------------------------------------------->	 





















<!-------------------------------------------------------------------------MODALES ---------------------------------------------------------------------------------->
<form id="f4" style="display: none;">
<input type="text" name="consulta" id="consulta">
</form>














<!-----------------------------------------------------------------MODAL REGISTRO------------------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="addpago" role="dialog">
  	<div class="modal-dialog " role="document">
    	<div class="modal-content">
				<div class="modal-header">
				<form id="f">
					<h5 class="modal-title">Registro de Pagos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

      		<div class="modal-body">



			
		<div class="form-row">
			<div class="form-group col-md-4">
				<h5 class="modal-title  mb-3">Inscripciones pagadas</h5>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">						
				<select type="text" class="form-control" name="mibuscador"  id="mibuscador"  onchange="añadir2()">
				<?php
    				if(!empty($consuta2[1])){
        				echo $consuta2[1];
   					}
	       		 ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<span style="color: green">Seleccionar la deuda que desea cancelar</span>
			</div>	

		</div>
		<div class="form-row">

			<div class="form-group col-md-4 " >	
			<label>Deuda Unica Pendiente</label>					
				<input type="text" class="form-control" id="montov" readonly >							
			</div>
			<div class="form-group col-md-2 " id="ocult2" >
			<label>Meses</label>						
				<input type="text" class="form-control" id="mesesv" readonly >							
			</div>
			<div class="form-group col-md-3 " id="ocult5" >	
			<label>Monto Total</label>				
				<input type="text" class="form-control" id="montot" readonly >							
			</div>
			<div class="form-group col-md-3 " >	
			<label>Precio Base</label>				
				<input type="text" class="form-control " id="montooculto" readonly >							
			</div>
			

		</div>


	

		<hr>



				<h5 class="modal-title"> Datos del Pago</h5>
				<hr>



					<div class="form-row">
					
						<div class="form-group col-md-2">
							<label>N° Deuda</label>	
								<span style="color:#FF0000" id="sid_deudas"></span>
								<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
							<input type="text" class="form-control" readonly="true" name="id_deudas" id="id_deudas" required>
						</div>

						<div class="form-group col-md-4">
							<label>Concepto</label>
								<span style="color:#FF0000" id="sconcepto"></span>
							<input type="text" class="form-control" readonly="true" name="concepto"  id="concepto" required onchange="checkConcepto()"  >
						</div>
						<!--------------------------------->
						<div class="form-group col-md-3">
							<label>Deuda Generada</label>
								<span style="color:#FF0000" id="sfecha"></span>
							<input type="date" class="form-control "  readonly="true" name="fecha" id="fecha"required  >
							<input type="text" class="form-control ocultar" name="fecha0" id="fecha0"  >							
						</div>
						<div class="form-group col-md-3 " >
							<label>Monto</label>
								<span style="color:#FF0000" id="smonto"></span>
							<input type="text" class="form-control"   name="monto"   id="monto" required placeholder="000.00">
							
						</div>
						<!--------------------------------->
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Identificador</label>
								<span style="color:#FF0000" id="sidentificador"></span>
							<input type="text" class="form-control" name="identificador" id="identificador" required placeholder="0000">
						</div>
						<div class="form-group col-md-4">
							<label>Forma de pago</label>
								<span style="color:#FF0000" id="sforma"></span>				
							<select type="text" class="form-control" name="forma" id="forma" required >
									<option value="" selected>- Seleccionar -</option>
									<option value="Transf">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	
								
									<option value="Otro">Otro</option>																			
							</select>
							<input type="text" class="form-control ocultar" name="forma0" id="forma0"  >							
						</div>				
						<div class="form-group col-md-3">
							<label>Estado</label>
								<span style="color:#FF0000" id="sestado"></span>		
							
							<select type="text" class="form-control" name="estado" id="estado" required >																
									<option value="Confirmado">CONFIRMAR</option>
									<option value="Pendiente">PENDIENTE</option>																									
							</select>
						</div>
						
						<div class="form-group col-md-2 ocultar" id="ocult">
							<label>Meses</label>
								<span id="smeses"></span>
							<input type="text" class="form-control" min="1"  name="meses" value="1" id="meses" required placeholder="0000">							
						</div>
						
				
					</div>

	
				
			</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" id="registrar">Registrar</button>
					</div>
			</form>
    	</div>
  	</div>
</div>

<!----------------------------------------------------------FIN MODAL REGISTRO----------------------------------------------------------------->

<!----------------------------------------------------------TABLA OCULTA----------------------------------------------------------------->
<table class="table table-striped table-hover ocultar">
			<thead>						 
			</thead>						  
	<tbody id="select">						      
		<?php if(!empty($consuta2[0])){ echo $consuta2[0];} ?>
					 
	</tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!----------------------------------------------------------TABLA OCULTA----------------------------------------------------------------->
























































<!-----------------------------------------------------------------MODAL CONFIRMAR----------------------------------------------------------------->
<div class="modal fade" tabindex="-1" id="confirmarpagos" role="dialog">
  	<div class="modal-dialog " role="document">
    	<div class="modal-content">
				<div class="modal-header">
				<form id="fp">
					<h5 class="modal-title">Confirmar Pagos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

      		<div class="modal-body">



			
		<div class="form-row">
			<div class="form-group col-md-4">
				<h5 class="modal-title  mb-3">Pagos Pendientes</h5>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">						
				<select type="text" class="form-control" name="mibuscador3"  id="mibuscador3"  onchange="añadir3()">
				<?php
    				if(!empty($consuta3[1])){
        				echo $consuta3[1];
   					}
	       		 ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<span style="color: green">Seleccionar Pagos que desea confirmar</span>
			</div>	

		</div>






		<div class="form-row">

			<div class="form-group col-md-4 " >	
			<label>Deuda Unica Pendiente</label>					
				<input type="text" class="form-control" id="montovp" readonly >							
			</div>
			<div class="form-group col-md-2 " id="ocultp2" >
			<label>Meses</label>						
				<input type="text" class="form-control" id="mesesvp" readonly >							
			</div>
			<div class="form-group col-md-3 " id="ocultp3" >	
			<label>Monto Total</label>				
				<input type="text" class="form-control" id="montotp" readonly >							
			</div>
			<div class="form-group col-md-3 " >	
			<label>Precio Base</label>				
				<input type="text" class="form-control " id="montoocultop" readonly >							
			</div>
			

		</div>








		<hr>



				<h5 class="modal-title"> Datos del Pago</h5>
				<hr>


				
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>ID</label>	
								<span style="color:#FF0000" id="sidp"></span>
								<input type="text" class="form-control" style="display: none;"  name="accionp" value="accionp" required>
							<input type="text" class="form-control" readonly="true" name="idp" id="idp" required>
						</div>
						<div class="form-group col-md-3">
							<label>N° Deuda</label>	
								<span style="color:#FF0000" id="sid_deudasp"></span>							
							<input type="text" class="form-control" readonly="true" name="id_deudasp" id="id_deudasp" required>
						</div>

						<div class="form-group col-md-3">
							<label>Concepto</label>
								<span style="color:#FF0000" id="sconceptop"></span>
							<input type="text" class="form-control" readonly="true" name="conceptop"  id="conceptop" required  >
						</div>
						<!--------------------------------->
						<div class="form-group col-md-3">
							<label>Identificador</label>
								<span style="color:#FF0000" id="sidentificadorp"></span>
							<input type="text" class="form-control" name="identificadorp" id="identificadorp" required placeholder="0000">
						</div>

					</div>	
	
						<!--------------------------------->
					
					
					<div class="form-row">
						<div class="form-group col-md-3">
								<label>Fecha Pago</label>
									<span style="color:#FF0000" id="sfechap"></span>
								<input type="date" class="form-control "  readonly="true" name="fechap" id="fechap"required  >							
							</div>
						<div class="form-group col-md-3">
								<label>Deuda Generada</label>
									<span style="color:#FF0000" id="sfechadp"></span>
								<input type="date" class="form-control "  readonly="true" name="fechadp" id="fechadp"required  >							
								<input type="text" class="form-control ocultar" name="fechadp0" id="fechadp0"required  >							
							</div>
						<div class="form-group col-md-3">
							<label>Forma de pago</label>
								<span style="color:#FF0000" id="sformap"></span>				
							<select type="text" class="form-control" name="formap" id="formap" required >
									<option value="" selected>- Seleccionar -</option>
									<option value="Transf">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	
								
									<option value="Otro">Otro</option>																			
							</select>
							<input type="text" class="form-control ocultar " name="formap0" id="formap0"required  >							
						</div>		
						<div class="form-group col-md-3 " >
								<label>Monto</label>
									<span style="color:#FF0000" id="smontop"></span>
								<input type="text" class="form-control"   name="montop"   id="montop" required placeholder="000.00">								
						</div>				
					</div>


					<div class="form-row">	
						<div class="form-group col-md-3  " id="ocultp1">
								<label>Meses</label>
									<span id="smesesp"></span>
								<input type="text" class="form-control" min="1"   name="mesesp"  id="mesesp" required placeholder="0000">							
						</div>

						<div class="form-group col-md-3 " >
								<label>Estado</label>
									<span id="sestadop"></span>
								<input type="text" class="form-control " readonly="true" name="estadop"  id="estadop" required >							
						</div>

						<div class="form-group col-md-3 " >
								<label>Estado Pago</label>
									<span id="sestado_pagosp"></span>
								<input type="text" class="form-control " readonly="true" name="estado_pagosp"  id="estado_pagosp" required >							
						</div>
						<div class="form-group col-md-3 " >
								<label>Estatus</label>
									<span id="sestatusp"></span>
								<input type="text" class="form-control " readonly="true" name="estatusp"  id="estatusp" required >							
						</div>
					</div>
				
			</div>
					<div class="modal-footer">
						
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" id="registrarp">Confirmar</button>
					</div>
			</form>
    	</div>
  	</div>
</div>

<!----------------------------------------------------------FIN MODAL CONFIRMAR----------------------------------------------------------------->
<table class="table table-striped table-hover ocultar">
			<thead>						 
			</thead>						  
	<tbody id="selectp">						      
		<?php if(!empty($consuta3[0])){ echo $consuta3[0];} ?>
					 
	</tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>















































































<!-------------------------------------------------------------MODAL EDITAR------------------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="editmontos" role="dialog">
 	<div class="modal-dialog " role="document">
    	<div class="modal-content">
				<div class="modal-header">
					<form id="fMM">
						<h5 class="modal-title">Editar Montos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
				</div>
      		<div class="modal-body">

					<h5 class="modal-title">Tutor</h5>
						<hr>

					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Codigo</label>
								<span style="color:#FF0000" id="scodigoMM"></span>
								<input type="text" class="form-control" style="display: none;"  name="accionMM" value="accionMM" required>
							<input type="text" class="form-control " readonly="true" name="codigoMM" id="codigoMM" required >
						</div>
						<div class="form-group col-md-3">
							<label>Tipo</label>
							<br>
								<span style="color:#FF0000" id="stipoMM"></span>			
							<input type="text" class="form-control" readonly="true" name="tipoMM" id="tipoMM" required >
						</div>
						<div class="form-group col-md-3">
							<label>Monto Bs</label>
								<span style="color:#FF0000" id="sm_montosMM"></span>			
							<input type="text" class="form-control" readonly="true" name="m_montosMM" id="m_montosMM" required >
						</div>	
						<div class="form-group col-md-3">
							<label>Monto $</label>
								<span style="color:#FF0000" id="sd_montosMM"></span>			
							<input type="text" class="form-control"name="d_montosMM" id="d_montosMM" required >
						</div>					
					</div>

     		 </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" id="registrarMM">Actualizar</button>
					</div>
			</form>
    	</div>
  	</div>
</div>

<!---------------------------------------------FIN MODAL EDITAR------------------------------------------------->	
















































					   

<!-------------------------------------------------------------MODAL EDITAR------------------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="editpago" role="dialog">
 	<div class="modal-dialog " role="document">
    	<div class="modal-content">
				<div class="modal-header">
					<form id="f2">
						<h5 class="modal-title">Editar Pagos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
				</div>
      		<div class="modal-body">


					<h5 class="modal-title">Tutor</h5>
						<hr>

					<div class="form-row">
						
						<div class="form-group col-md-3">
							<label>ID</label>
								<span style="color:#FF0000" id="sidM"></span>
								<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
							<input type="text" class="form-control " readonly="true" name="idM" id="idM" required >
						</div>
						<div class="form-group col-md-3">
							<label>N° Deuda</label>
							<br>
								<span style="color:#FF0000" id="scuposM"></span>			
							<input type="text" class="form-control" readonly="true" name="id_deudasM" id="id_deudasM" required >
						</div>
						<div class="form-group col-md-3">
							<label>Identificador</label>
								<span style="color:#FF0000" id="sidentificadorM"></span>			
							<input type="text" class="form-control"name="identificadorM" id="identificadorM" required >
						</div>
						<div class="form-group col-md-3">
							<label>Concepto</label>
								<span style="color:#FF0000" id="sconceptM"></span>
							<input type="text" class="form-control" readonly="true"name="conceptoM" id="conceptoM" required >
						</div>					
		
					</div>
					
					<div class="form-row">
					<div class="form-group col-md-4">
						<label>Fecha De Pago</label>
							<span style="color:#FF0000" id="sfechaM"></span>			
						<input type="text" class="form-control"readonly="true" name="fechaM" id="fechaM" required >
						<input type="text" class="form-control ocultar" name="fechaM0" id="fechaM0"  >
					</div>
					<div class="form-group col-md-4">
						<label>Fecha Deuda</label>
							<span style="color:#FF0000" id="sfechadM"></span>			
						<input type="text" class="form-control"readonly="true" name="fechadM" id="fechadM" required >
					</div>

			
						<div class="form-group col-md-4">
							<label>Monto</label>
								<span style="color:#FF0000" id="smontoM"></span>
							<input type="text" class="form-control" readonly="true" name="montoM"  id="montoM" required placeholder="000 / 000-000">
						</div>			
						

					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Cedula</label>
								<span style="color:#FF0000" id="scedulaM"></span>			
							<input type="text" class="form-control" disabled type="text" name="cedulaM" id="cedulaM" required >
						</div>
						<div class="form-group col-md-4">
							<label>Estudiante</label>
								<span style="color:#FF0000" id="snombreM"></span>			
							<input type="text" class="form-control" disabled type="text" name="nombreM" id="nombreM" required >
						</div>
						<div class="form-group col-md-4">
							<label>Forma de pago</label>
								<span style="color:#FF0000" id="sformaM"></span>				
							<select type="text" class="form-control" name="formaM" id="formaM" required >
									<option value="" selected>- Seleccionar -</option>
									<option value="Transf">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	

									<option value="Otro">Otro</option>																		
							</select>
							<input type="text" class="form-control ocultar" name="formaM0" id="formaM0"  >
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Cedula Tutor</label>
								<span style="color:#FF0000" id="scedula2M"></span>			
							<input type="text" class="form-control" disabled type="text" name="cedula2M" id="cedula2M" required >
						</div>
						<div class="form-group col-md-4">
							<label>Nombre Tutor</label>
								<span style="color:#FF0000" id="snombre1M"></span>			
							<input type="text" class="form-control" disabled type="text" name="nombre1M" id="nombre1M" required >
						</div>

						<div class="form-group col-md-4 " >
								<label>Estado</label>
									<span id="sestadoM"></span>
								<input type="text" class="form-control " readonly="true" name="estadoM"  id="estadoM" required >							
						</div>
												
			
					</div>

     		 </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" id="registrar2">Actualizar</button>
					</div>
			</form>
    	</div>
  	</div>
</div>

<!---------------------------------------------FIN MODAL EDITAR------------------------------------------------->	   
  
	















































					   
<!-----------------------------------------------MODAL BORRAR------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="deletepago" role="dialog">
  	<div class="modal-dialog" role="document">
   	 	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Borrar Pago Registrado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<form id="f3">
					<input style="display: none;" type="text" name="idE" id="idE">
					<input style="display: none;" type="text" name="accion3" id="accion3" value="accion3">
				</form>
				<div class="modal-body">
					<p>Estas seguro de querer eliminar este registro ?</p>
					<p class="text-warning"><small>Esta Accion no es reversible</small></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-success" id="borrar">Si, Borrar</button>
				</div>
    	</div>
 	</div>
</div>

<!-----------------------------------------------FIN MODAL BORRAR------------------------------------------------------>   































<!-----------------------------------------------MODAL RETORNAR------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="deletepago2" role="dialog">
  	<div class="modal-dialog" role="document">
   	 	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Retornar Pago Registrado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<form id="f5">
					<input style="display: none;" type="text" name="idE2" id="idE2">
					<input style="display: none;" type="text" name="accion4" id="accion4" value="accion4">
				</form>
				<div class="modal-body">
					<p>Estas seguro de querer retornar este registro ?</p>
					<p class="text-warning"><small>Esta Accion no es reversible y llevara la deuda a un punto anterior al pago retornado </small></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-success" id="borrar2">Si, Borrar</button>
				</div>
    	</div>
 	</div>
</div>

<!-----------------------------------------------FIN MODAL RETORNAR------------------------------------------------------>   



































<div class="modal fade" tabindex="-1" id="verpago" role="dialog">
 	<div class="modal-dialog " role="document">
    	<div class="modal-content">
				<div class="modal-header">
					<form id="f2">
						<h5 class="modal-title">Consulta de Pagos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
				</div>
      		<div class="modal-body">

					<h5 class="modal-title">Datos del Pago</h5>
						<hr>

					<div class="form-row">
						<div class="form-group col-md-3">
							<label>ID</label>
								<span style="color:#FF0000" id="sidC"></span>
								<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
							<input type="text" class="form-control " readonly="true" name="idC" id="idC" required >
						</div>
						<div class="form-group col-md-3">
							<label>N° Deuda</label>
							<br>
								<span style="color:#FF0000" id="scuposC"></span>			
							<input type="text" class="form-control" readonly="true" name="id_deudasC" id="id_deudasC" required >
						</div>
						<div class="form-group col-md-3">
							<label>Identificador</label>
								<span style="color:#FF0000" id="sidentificadorC"></span>			
							<input type="text" class="form-control"  readonly="true"  name="identificadorC" id="identificadorC" required >
						</div>
						<div class="form-group col-md-3">
							<label>Concepto</label>
								<span style="color:#FF0000" id="sconceptoC"></span>
							<input type="text" class="form-control" readonly="true"name="conceptoC" id="conceptoC" required >
						</div>					
		
					</div>
					
					<div class="form-row">
					<div class="form-group col-md-3">
						<label>Fecha De Pago</label>
							<span style="color:#FF0000" id="sfechaC"></span>			
						<input type="text" class="form-control"readonly="true" name="fechaC" id="fechaC" required >
					</div>
					<div class="form-group col-md-3">
						<label>Desde</label>
							<span style="color:#FF0000" id="sfechadC"></span>			
						<input type="text" class="form-control"readonly="true" name="fechadC" id="fechadC" required >
					</div>
					<div class="form-group col-md-3 " >
							<label>Hasta</label>
								<span id="smesesC"></span>
							<input type="text" class="form-control" readonly="true" name="mesesC"  id="mesesC" required placeholder="0000">							
						</div>
			
						<div class="form-group col-md-3">
							<label>Monto</label>
								<span style="color:#FF0000" id="smontoC"></span>
							<input type="text" class="form-control" readonly="true"  name="montoC"  id="montoC" required placeholder="000 / 000-000">
						</div>			
						

					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Cedula</label>
								<span style="color:#FF0000" id="scedulaC"></span>			
							<input type="text" class="form-control" readonly="true"  type="text" name="cedulaC" id="cedulaC" required >
						</div>
						<div class="form-group col-md-4">
							<label>Estudiante</label>
								<span style="color:#FF0000" id="snombreC"></span>			
							<input type="text" class="form-control" readonly="true"  type="text" name="nombreC" id="nombreC" required >
						</div>
						<div class="form-group col-md-4">
							<label>Forma de pago</label>
								<span style="color:#FF0000" id="sformaC"></span>				
							<select type="text" class="form-control" disabled  name="formaC" id="formaC" required >
									<option value="" selected>- Seleccionar -</option>
									<option value="Transf">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	

									<option value="Otro">Otro</option>																		
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Cedula Tutor</label>
								<span style="color:#FF0000" id="scedula2C"></span>			
							<input type="text" class="form-control" readonly="true"  type="text" name="cedula2C" id="cedula2C" required >
						</div>
						<div class="form-group col-md-4">
							<label>Nombre Tutor</label>
								<span style="color:#FF0000" id="snombre1C"></span>			
							<input type="text" class="form-control" readonly="true"  type="text" name="nombre1C" id="nombre1C" required >
						</div>
						<div class="form-group col-md-4">
							<label>Estado</label>
								<span style="color:#FF0000" id="sestadoC"></span>		
							
							<select type="text" class="form-control" disabled  name="estadoC" id="estadoC" required >																
									<option value="Confirmado">CONFIRMAR</option>
									<option value="Pendiente">PENDIENTE</option>																									
							</select>
						</div>
												
			
					</div>

     		 </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
						
					</div>
			</form>
    	</div>
  	</div>
</div>

<!---------------------------------------------FIN MODAL EDITAR------------------------------------------------->	   
  






















































<!-----------------------------------------------------------------MODAL REGISTRO REPRESENTANTES------------------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="addpagorepre" role="dialog">
  	<div class="modal-dialog " role="document">
    	<div class="modal-content">
				<div class="modal-header">
				<form id="fr">
					<h5 class="modal-title">Registro de Pagos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

      		<div class="modal-body">


			
		<div class="form-row">
			<div class="form-group col-md-4">
				<h5 class="modal-title  mb-3">Inscripciones pagadas</h5>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">						
				<select type="text" class="form-control" name="mibuscador2" id="mibuscador2" onchange="añadirr()">
				<?php
    				if(!empty($consutar[1])){
        				echo $consutar[1];
   					}
	       		 ?>
				</select>
			</div>	

			<div class="form-group col-md-6">
				<span style="color: green">Seleccionar la deuda que desea cancelar</span>
			</div>
		</div>
	
		<div class="form-row">

			<div class="form-group col-md-4 " >	
			<label>Deuda Unica Pendiente</label>					
				<input type="text" class="form-control" id="montovr" readonly >							
			</div>
			<div class="form-group col-md-2 " id="ocult4" >
			<label>Meses</label>						
				<input type="text" class="form-control" id="mesesvr" readonly >							
			</div>
			<div class="form-group col-md-3 " id="ocult6" >	
			<label>Monto Total</label>				
				<input type="text" class="form-control" id="montotr" readonly >							
			</div>
			<div class="form-group col-md-3 " >	
			<label>Precio Base</label>				
				<input type="text" class="form-control " id="montoocultor" readonly >							
			</div>


		</div>
		
			<hr>
			<h5 class="modal-title"> Datos del Pago</h5>
			<hr>



					<div class="form-row">
		
	
						<div class="form-group col-md-2">
							<label>N° Deuda</label>	
								<span style="color:#FF0000" id="sid_deudasr"></span>
								<input type="text" class="form-control" style="display: none;"  name="accionr" value="accionr" required>
							<input type="text" class="form-control" readonly="true" name="id_deudasr" id="id_deudasr" required>
						</div>
						<div class="form-group col-md-4">
							<label>Concepto</label>
								<span style="color:#FF0000" id="sconceptor"></span>
							<input type="text" class="form-control" readonly="true" name="conceptor"  id="conceptor" required onchange="checkConcepto()" >
						</div>
						<!--------------------------------->
						<div class="form-group col-md-3 ">
							<label>Fecha</label>
								<span style="color:#FF0000" id="sfechar"></span>
								<input type="date" class="form-control "  readonly="true" name="fechar" id="fechar"required >
								<input type="text" class="form-control ocultar "   name="fechar0"  id="fechar0" >
							</div>
						<div class="form-group col-md-3 " >
							<label>Monto</label>
								<span style="color:#FF0000" id="smontor"></span>
							<input type="text" class="form-control"   name="montor"  id="montor" required placeholder="000.00">
							
						</div>
						<!--------------------------------->

					</div>
					
					<div class="form-row">
					<div class="form-group col-md-2">
							<label>Identificador</label>
								<span style="color:#FF0000" id="sidentificadorr"></span>
							<input type="text" class="form-control" name="identificadorr" id="identificadorr" required placeholder="0000">
						</div>
						<div class="form-group col-md-3">
							<label>Forma de pago</label>
								<span style="color:#FF0000" id="sformar"></span>				
							<select type="text" class="form-control" name="formar" id="formar" required >
									<option value="" selected>- Seleccionar -</option>
									<option value="Transf">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	
	
									<option value="Otro">Otro</option>											
							</select>
							<input type="text" class="form-control ocultar"   name="formar0"  id="formar0" >
						</div>

						<div class="form-group col-md-3">
							<label>Estado</label>
								<span style="color:#FF0000" id="sestador"></span>
							<input type="text" class="form-control"  readonly="true" value="Pendiente" name="estador" id="estador" required placeholder="Activo">
						</div>
						<div class="form-group col-md-2 ocultar" id="ocult3">
							<label>Meses</label>
								<span id="smesesr"></span>
							<input type="text" class="form-control" min="1"  name="mesesr" value="1" id="mesesr" required placeholder="0000">
						</div>
					</div>
		

				
			</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" id="registrarr">Registrar</button>
					</div>
			</form>
    	</div>
  	</div>
</div>

<!----------------------------------------------------------FIN MODAL REGISTRO REPRESENTANTES----------------------------------------------------------------->

<!----------------------------------------------------------TABLA OCULTA----------------------------------------------------------------->
<table class="table table-striped table-hover ocultar">
			<thead>						 
			</thead>						  
	<tbody id="selectr">						      
		<?php if(!empty($consutar[0])){ echo $consutar[0];} ?>
					 
	</tbody>
</table>
<!----------------------------------------------------------TABLA OCULTA----------------------------------------------------------------->








	</main>
	</section>
	<?php require_once('comunes/footer.php') ?> 
	<script src="assets/js/pagos.js"></script>

	
</body>

</html>



