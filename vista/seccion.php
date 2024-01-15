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
	<link rel="stylesheet" href="assets\css\año-btn-radio.css">
	<link rel="stylesheet" href="assets/css/modal.css">

</head>
<body> 
   
	    
 
							<!-- MAIN -->
			<main>
			<div class="head-title pt-3 mx-auto">
				<div class="left text-center">
					<h1>GESTIONAR SECCCIONES</h1>
				</div>
			</div>



							<!--TABLA -->	
<!--------------------------------------------------main-content-start------------------------------------------------------------> 
		     
           <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table">
					      
					   <div class="table-title  mb-3">
					     <div class="row ">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Registro de Secciones</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">

							 <?PHP if (in_array("registrar secciones", $nivel1)) {?>
								<!-- Button trigger modal -->
								<a href="#exampleModalCenter" id="G_sec" class="btn btn-success" data-toggle="modal">
									<i><img  src="assets/icon/bloque-abc1.png"/></i>
									<span>Abecedario</span>
							    </a>

							    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
									<i><img style="width: 18px; margin-top:-10px; margin-button:-15px;" src="assets/icon/add(1).png"/></i>
									<span>Registrar</span>
							    </a>
							<?php } ?>
					

							 </div>
					     </div>
					   </div>
					 
					   <table id="tablas" style="width:100%" class="table table-striped table-hover">
					      <thead>
							 <th>ID</th>
							 <th>NOMBRE</th>
							 <th>AÑO</th>
							 <th>TURNO</th>
							 <th>DOCENTE GUIA</th>
							 <th>CANTIDAD MAX</th>
							 <th>EST. REGISTRADOS</th>
							 <th>AÑO ACADEMICO</th>

	
							 <th>ACCIONES</th>
							 </tr>
						  </thead> 
						  
						  <tbody id="tabla">
						  <?PHP if (in_array("consultar secciones", $nivel1)) {?>
						
								<?php
									if(!empty($consulta)){
										echo $consulta;
									}
								?>   

							<?php } ?>

							 
						  </tbody>
						  
					      
					   </table>
					   


					   </div>
					</div>



<!------------------------------------------FINAL DE LA TABLA -------------------------------------------------->

<form id="f4" style="display: none;">

<input type="text" name="consulta" id="consulta">
</form>


<form id="f5" style="display: none;">
<input type="text" name="consulta_M" id="consulta_M" value="consulta_M">
<input type="text" class="form-control sm" name="id5" id="id5">
<input type="number" class="form-control " name="ident" id="ident" value="4">

</form>

<!------------------------------------------------MODAL REGISTRO------------------------------------------------->

<!-- .... -->
<div class="modal modal-user fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
	<form id="f" class="form modal-content">
 
      <div class="modal-header">

        <h5 class="modal-title">Registro Sección</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">


	
			<div class="col-1" style="display:none;">
				<label class="form-label">Id</label>
				<span id="id_v"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" >
				<input type="text" class="form-control sm" name="id" id="id" placeholder="0000000">
			</div>

		
			  <div class="col-2 mb-3">
   			 <label for="exampleFormControlSelect1">Ident.Abecedario</label>
   				 <select class="form-control" id="secciones" name="secciones">
								<!-- <?php
									// if (!empty($abc)) {
											// echo $abc; 
									// }
								?> -->
   				 </select>
  			</div>
			
 


	<div class="col-6 mb-3" id="form_radio"> 
			<label class="form-label ml-5">Año:</label>
			<br>
		<div class="form-check form-check-inline ml-5" id="año">
					<?php
					
						if (!empty($Año)) {
								echo $Año;
						}
					?>
		</div>
		<br>
		<span id="año_msj"></span>
	</div>
		   
					
			 <div class="col-4 md-3">
					<label>Docente Guia</label>
					<select class="form-control" name="Doc_Guia" id="Doc_Guia">
						<!-- contenido -->
					</select>
					<br>
				<span id="dg_msj"></span>
				</div>

<div class="container mb-3">
	 <span id="existe_msj" class="text-end text-warning  mb-2"></span>
 </div>


			<div class="form-group col-md-4">
				<label>Cantidad de Alumnos:</label>
				<input type="text" class="form-control" name="cantidad" id="cantidad" required placeholder="">
		<span id="cantidad_msj"></span>
			</div>
				
			<br>
				<div class="ml-3 mt-4">
					<?php
						if (!empty($academico)) {
								echo $academico;
							}
					?>
				</div>

       
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="registrar">Registrar</button>
      </div>
	  </form>
    
  </div>
</div>

<!--------------------------------------FIN MODAL REGISTRO-------------------------------------------------->
								   
					   
<!---------------------------------MODAL EDITAR------------------------------------------------------------------>
 <div class="modal modal-user fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
   
	<form id="f2" class="form modal-content">
      <div class="modal-header">
		
        <h5 class="modal-title">Editar Seccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">

			<div class="col-1" style="display:none;">
				<label class="form-label">Id</label>
				<span id="id_v"></span>
				<input type="text" class="form-control" style="display: none;"  name="id_edit" value="id_edit" >
				<input type="text" class="form-control sm" name="id1" id="id1">
			</div>
			
			<div class="col-5 mb-3">
   			 <label for="exampleFormControlSelect2">Seccion Actual: <span id="id_ac" class="text-primary"></span></label>
   				 <select class="form-control" id="secciones1" name="secciones1">
								
						<!-- ...INFORMACION -->
   				 </select>
  			</div>

			<div class="col-5 mb-3">
   			 <label for="exampleFormControlSelect3">Año Actual: <span  id="id_año" class="text-primary"></span> </label>
   				 <select class="form-control" id="año1" name="año1">
								<?php
									if (!empty($Edit_Año)) {
											echo $Edit_Año;
									}
								?> 
   				 </select>
  			</div> 

<div class="container text-center">
  <span id="existe_msj2" class="text-end text-warning  mb-2"></span>
  <span id="existe_msj3" class="text-end text-primary  mb-2"></span>
</div>

			  <div class="col-4 md-3">
					<label>Docente Guia</label>
					

					<select class="form-control" name="Doc_Guia1" id="E_Guia">
								
						</select>
					
				</div>

			<div class="form-group col-md-4"> 
				<label>Cantidad de Alumnos:</label>
				<input type="text" class="form-control" name="cantidad_e" id="cantidad_e">
		<span id="cantidad_msj2"></span>
			</div>
			
			<div class="ml-3 mt-4">
				<p class="p-1 mb-2 border border-secondary text-secondary rounded" id="año_acd"></p>
				<input type="text" class="form-control" name="acd" id="value_acd" style="display:none;">
			</div>	
			
			
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="editar">Actualizar</button>
      </div>
	  </form>
    
  </div>
</div> 

<!---------------------------------------------FIN MODAL EDITAR------------------------------------------------->	
    
					   	 
				 
			    </div>
			</div>
		</main>
<!-- MAIN -->
	</section>
<!-- CONTENT -->


<!-- ------------------------------------------------------------------------------- -->

<!-----------------------------------------------MODAL BORRAR------------------------------------------------------>

<div class="modal modal-user fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Borrar Seccion: "<span class="text-danger" id="seccion_b"></span>" <span id="año_b" class="text-danger"></span> Año</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="f3">

		<input style="display: none;" type="text" name="id2" id="id2">
		<input style="display: none;" type="text" name="accion3" id="accion3" value="accion">

	</form>
      <div class="modal-body">
        <p>Estas seguro de querer eliminar este registro ?</p>
		<p class="text-warning"><small>Esta Accion no es reversible</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="borrar">Si, Borrar</button>
      </div>
    </div>
  </div>
</div>



	<?php require_once('comunes/footer.php') ?> 
    <script src="assets/js/seccion.js"></script>


    <!-- <script src="assets/js/tabla.js"></script> -->
	<!--<script  src="assets/js/script.js"></script>-->
</body>
</html>


<!-- Modal: Informacion  -->
<div class="modal fade bd-example-modal-lg" id="info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
		<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seccion <span id="s_M" class="font-weight-bold"></span>
			 Año <span id="a_M" class="font-weight-bold"></span></h5>
			<!-- <input type="text" id="filtroEstudiantes" placeholder="Buscar estudiantes"> -->
        </div>

		 <div class="modal-body">
		
<table id="tablas" style="width:100%" class="table table-striped table-hover  tabla_estudiantes">
                <thead>
                   <th>CEDULA</th>
                   <th>NOMBRE</th>
                   <th>APELLIDO</th>
                   <th>EDAD</th>
                   <th>OBSERBACIONES</th> 
                   </tr>
                </thead> 
                 
                <tbody id="tabla_estudiantes">
                    
                </tbody>     
</table>

		</div>
	</div>

    <!-- </div> -->
  </div>
</div>

 

<!-- Modal -->
<div class="modal modal-user fade" id="exampleModalCenter" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Gestionar Abecedario de Secciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form id="f6">
								
									
      <div class="col-12 md-3">
							<select class="js-example-placeholder-multiple js-states form-control"  multiple="multiple" name="sec[]" id="sec" style=" width: 100%;">
									
							</select>
		</div>
			<br>
			<span id="sec_msj"></span>			
	</form>
		
	<p ><span class="font-weight-bold">NOTA: </span>Los cambios NO aplicaran a los datos registrados</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="act_sec">Actualizar</button>
      </div>
    </div>
  </div>
</div>