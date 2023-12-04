<?php


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
											<?PHP if (in_array("registrar pagos_tutor", $nivel1)) {?>
											<a href="#addpagorepre" class="btn btn-success" data-toggle="modal">
												<i class="material-icons " style="width:100%" title="registrarr"></i>
												<span>Realizar Pago ( Tutor )</span>
											</a>
											<?php } ?>
											
										</div>
								</div>
							</div>
					   

					   
							<table id="tablas" style="width:100%" class="table table-striped ">
								<thead>
									<tr>
				
									<th>ID</th>
									<th>N° Deuda</th>									
									<th>Identificador</th>
									<th>Concepto</th>
									<th>F/P</th>
									<th>Fecha Pago</th>
									<th>Monto Bs</th>
									<th>Meses Pagos</th>
									<th>C.I Estudiante</th>
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
				<select type="text" class="form-control" name="mibuscador" id="mibuscador" onchange="añadir2()">
				<?php
    				if(!empty($consuta2[1])){
        				echo $consuta2[1];
   					}
	       		 ?>
				</select>
			</div>	
			<div class="form-group col-md-2 ocultar "  id="ocult2" >					
				<input type="text" class="form-control"  id="total_deuda" readonly >							
			</div>
			<div class="form-group col-md-6">
				<span style="color: green">Seleccionar la deuda que desea cancelar</span>
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
							<input type="text" class="form-control" readonly="true" name="concepto"  id="concepto" required   >
						</div>
						<!--------------------------------->
						<div class="form-group col-md-3">
							<label>Deuda Generada</label>
								<span style="color:#FF0000" id="sfecha"></span>
							<input type="date" class="form-control "  readonly="true" name="fecha" id="fecha"required  >							
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
									<option value="Transferencia">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	
									<option value="Transf - PMV">Transf - PMV</option>
									<option value="Transf - Efec">Transf - Efec</option>
									<option value="PMV - Transf">PMV - Transf</option>
									<option value="PMV - Efec">PMV - Efec</option>
									<option value="Efec - Transf">Efec - Transf</option>
									<option value="Efec - PMV">Efec - PMV</option>		
									<option value="Otro">Otro</option>																			
							</select>
						</div>				
						<div class="form-group col-md-3">
							<label>Estado</label>
								<span style="color:#FF0000" id="sestado"></span>		
							
							<select type="text" class="form-control" name="estado" id="estado" required >																
									<option value="CONFIRMADO">CONFIRMAR</option>
									<option value="PENDIENTE">PENDIENTE</option>																									
							</select>
						</div>
						
						<div class="form-group col-md-2 ocultar" id="ocult">
							<label>Meses</label>
								<span id="smeses"></span>
							<input type="text" class="form-control"  name="meses" value="1" id="meses" required placeholder="0000">							
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
												
						<div class="form-group col-md-3 " >
							<label>Meses</label>
								<span id="smesesM"></span>
							<input type="text" class="form-control" readonly="true" name="mesesM"  id="mesesM" required placeholder="0000">							
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Concepto</label>
								<span style="color:#FF0000" id="sconceptM"></span>
							<input type="text" class="form-control" readonly="true"name="conceptoM" id="conceptoM" required >
						</div>
						<div class="form-group col-md-3">
							<label>Fecha</label>
								<span style="color:#FF0000" id="sfechaM"></span>			
							<input type="text" class="form-control"readonly="true" name="fechaM" id="fechaM" required >
						</div>
						<div class="form-group col-md-3">
							<label>Monto</label>
								<span style="color:#FF0000" id="smontoM"></span>
							<input type="text" class="form-control"  name="montoM"  id="montoM" required placeholder="000 / 000-000">
						</div>
						<div class="form-group col-md-3">
							<label>Forma de pago</label>
								<span style="color:#FF0000" id="sformaM"></span>				
							<select type="text" class="form-control" name="formaM" id="formaM" required >
									<option value="" selected>- Seleccionar -</option>
									<option value="Transferencia">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	
									<option value="Transf - PMV">Transf - PMV</option>
									<option value="Transf - Efec">Transf - Efec</option>
									<option value="PMV - Transf">PMV - Transf</option>
									<option value="PMV - Efec">PMV - Efec</option>
									<option value="Efec - Transf">Efec - Transf</option>
									<option value="Efec - PMV">Efec - PMV</option>		
									<option value="Otro">Otro</option>																		
							</select>
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
							<label>Estado</label>
								<span style="color:#FF0000" id="sestadoM"></span>		
							
							<select type="text" class="form-control" name="estadoM" id="estadoM" required >																
									<option value="CONFIRMADO">CONFIRMAR</option>
									<option value="PENDIENTE">PENDIENTE</option>																									
							</select>
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
			<div class="form-group col-md-2 ocultar "  id="ocult4" >					
				<input type="text" class="form-control"  id="total_deudar" readonly >							
			</div>
			<div class="form-group col-md-6">
				<span style="color: green">Seleccionar la deuda que desea cancelar</span>
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
							<input type="text" class="form-control" readonly="true" name="conceptor"  id="conceptor" required  >
						</div>
						<!--------------------------------->
						<div class="form-group col-md-3 ">
							<label>Fecha</label>
								<span style="color:#FF0000" id="sfechar"></span>
								<input type="date" class="form-control "  readonly="true" name="fechar" id="fechar"required >
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
									<option value="Transferencia">Trasferencia</option>
									<option value="Pago Movil">Pago Movil</option>
									<option value="Efectivo">Efectivo</option>	
									<option value="Transf - PMV">Transf - PMV</option>
									<option value="Transf - Efec">Transf - Efec</option>
									<option value="PMV - Transf">PMV - Transf</option>
									<option value="PMV - Efec">PMV - Efec</option>
									<option value="Efec - Transf">Efec - Transf</option>
									<option value="Efec - PMV">Efec - PMV</option>		
									<option value="Otro">Otro</option>											
							</select>
						</div>

						<div class="form-group col-md-3">
							<label>Estado</label>
								<span style="color:#FF0000" id="sestador"></span>
							<input type="text" class="form-control"  readonly="true" value="PENDIENTE" name="estador" id="estador" required placeholder="Activo">
						</div>
						<div class="form-group col-md-2 ocultar" id="ocult3">
							<label>Meses</label>
								<span id="smesesr"></span>
							<input type="text" class="form-control"  name="mesesr" value="1" id="mesesr" required placeholder="0000">
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



