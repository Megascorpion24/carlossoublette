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
<link rel="stylesheet" href="assets\css\jquery-ui.css">
<link rel="stylesheet" href="assets\css\año-btn-radio.css">
<style>
	/* para el autocompletado */
	#ui-id-1{
		z-index: 2000;
	}
</style>

</head>
<body>
 
	

							<!-- MAIN -->
			<main>
			<div class="head-title pt-3  mx-auto" style="width: 200px;  ">
				<div class="left">
					<h1>MATERIA</h1>
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
							    <h2 class="ml-lg-2">Registro de Materia</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							 <?PHP if (in_array("registrar materias", $nivel1)) {?>
							    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
									<i class="material-icons">&#xE147;</i>
									<span>Registrar</span>
							    </a>

								<?php } ?>

							 </div>
					     </div>
					   </div>
					 
					   <table id="tablas" style="width:100%" class="table table-striped table-hover">
					      <thead>
						     <tr>	 
							 <th>Id</th>
							 <th>Nombre</th>
							 <th>Año</th>
  
							 <th>docente1</th>
							 <th>docente2</th>
							 <th>docente3</th>
							 <th>docente4</th>
							 <th>docente5</th>
							 <th>docente6</th>
							 
	 
							 <th>Acciones</th>
							 </tr>
						  </thead>
						  
						  <tbody id="tabla">
						  <?PHP if (in_array("consultar materias", $nivel1)) {?>
								
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


<!------------------------------------------------MODAL REGISTRO------------------------------------------------->

<div class="modal modal-user  fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
  <form id="f" class="form modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title">Registro Materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
	
									
			<div class="form-group col-md-1" style="display:none;">
				<label>Id</label>
				<span id="id_v"></span> 
				<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" >
				<input type="text" class="form-control sm" name="id" id="id" placeholder="0000000">
			</div>
					

			<div class="form-group col-md-5"> 
				<label>Nombre</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" name="nombre" id="nombre"  placeholder="materia..">
				<span id="nombre_v"></span>
			</div>


			
		<div class="col-6 mb-1" id="form_radio"> 
			<label class="form-label ml-4">Año:</label>
			<br>
		<div class="ml-4" id="año">
					<?php
					
						if (!empty($Año)) {
								echo $Año;
						}
					?>
		</div>
		<br>
		<span id="año_msj"></span>

		</div>
			
<div class="container text-center">
  <span id="existe_msj" class="text-end text-warning  mb-2"></span>
</div>

		
	

				<div class="col-12 md-3" id="dc1">
						<label>Docentes a Impartir</label>
						<select class="js-example-placeholder-multiple js-states form-control"  multiple="multiple" name="docentes[]" id="docentes" style=" width: 100%;">
									<?php
										if (!empty($Docente)) {
												echo $Docente;
										}
									?>
						</select>			
				</div>	

			<br>
		<span id="docentes_msj"></span>

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


<div class="modal  modal-user fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
	<form id="f2" class="form modal-content">

    
    <div class="modal-header">
		
        <h5 class="modal-title">Editar Materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
	  <div class="modal-body">
	 
		<div class="form-row">
			<div class="form-group col-md-2" style="display:none;">
				<label>Id</label>
				<span id="id1_v"></span>
				<input type="text" class="form-control" style="display: none;"  name="id_edit" value="id_edit" required>
				<input type="text" class="form-control" name="id1" id="id1" required >
			</div>
			<div class="form-group col-md-6">
				<label>Nombre</label>
				<br>
				<input type="text"  class="form-control"  style="text-transform: uppercase;" name="nombre1" id="nombre1" required>
				<span id="nombre1_v"></span>			
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

			  <div class="col-12 md-3" id="dc1">
						<label>Modificar Docentes</label>
						<select class="js-example-placeholder-multiple js-states form-control"  multiple="multiple" name="docentes1[]" id="docentes1" style=" width: 100%;">
									<?php
										if (!empty($Docente)) {
												echo $Docente;
										}
									?>
						</select>			
				</div>
			<br>
		<span id="docentes1_msj"></span>


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
					   

					   
<!-----------------------------------------------MODAL BORRAR------------------------------------------------------>


<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Borrar Materia Registrado</h5>
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

<!-----------------------------------------------FIN MODAL BORRAR------------------------------------------------------>   
					   	
				 
			    </div>
			</div>
		</main>
<!-- MAIN -->
	</section>
<!-- CONTENT -->


	<?php require_once('comunes/footer.php') ?> 
	<script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/materia.js"></script>

    <!-- <script src="assets/js/tabla.js"></script> -->
	<!--<script  src="assets/js/script.js"></script>-->
</body>
</html>