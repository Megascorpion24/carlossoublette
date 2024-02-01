<?php


if (empty($_SESSION)) {
	session_start();
}

if (isset($_SESSION['permisos'])) {
	$nivel1 = $_SESSION['permisos'];
} else {
	$nivel1 = "";
}
?>



<!DOCTYPE html>
<html lang="es">
<head>

	<?php  require_once('comunes/header.php');?>
    <?php require_once('comunes/menu.php'); ?>
    <link rel="stylesheet" href="assets/css/boton.css">

</head>
<body>
 
	

							<!-- MAIN -->
	<main>
			<div class="head-title pt-3  mx-auto" style="width: 200px;  ">
				<div class="left">
					<h1>AÑO ACADEMICO</h1>
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
							    <h2 class="ml-lg-2">Registro de Años Academicos</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">

							 		<?PHP if (in_array("registrar ano_academico", $nivel1)) { ?>

							    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
									<i class="material-icons" style="width:100%" title="registrar"></i>
									<span>Registrar</span>
							    </a>
							  
							    <?php } ?>

							 </div>




					     </div>

					     <div>
									<!-- Nav tabs -->
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#home">Año Academico</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#menu1">Tabla de registros</a>
										</li>
									</ul>

									<!-- Tab panes -->
									<?PHP if (in_array("consultar ano_academico", $nivel1)) { ?>
									<div class="tab-content">
										<div class="tab-pane container active" id="home">

											<div id='calendar'></div>

											<script lenguage="JavaScript">
											document.addEventListener('DOMContentLoaded', function() {

												let calendarEl = document.getElementById('calendar');

												let calendar = new FullCalendar.Calendar(calendarEl, {
													defaultView: 'timeGridWeek',
													weekends: true, // mostrar sabados y domingos
													allDaySlot: false,
													locale:'es',
													headerToolbar: {
														left: 'prev,today,next',
														center: 'title',
														right: 'dayGridMonth'
													},

													buttonText: {
															prev: 'Ant',
															next: 'Sig',
															today: 'Hoy',
															year: 'Año',
															month: 'Mes',
															week: 'Semana',
															day: 'Día',
															list: 'Agenda',
														},

													
													events: function(fetchInfo, successCallback, failureCallback) {
													successCallback([<?php
																		foreach ($evento as $r) {
																		?> {
																id: "<?php echo $r["id"]; ?>",
																title: "<?php echo $r["ano_academico"]; ?>",
																start: "<?php echo $r["fecha_ini"]; ?>",
																end: "<?php echo $r["fecha_cierr"]; ?>",

															},


														<?php
																		}
														?>
													]);
												},

													eventColor: "#F27171",
													eventBackgroundColor: "#947BE6",
													


													eventClick: function(calEvent, jsEvent, view) {

														$('#tituloEvento').html(calEvent.title);
														$('#desEvento').html(calEvent.descripcion);

														//$("#consultarm").modal();
													},


												});
												calendar.render();

												$('#addEmployeeModal').on('hidden.bs.modal', function() {
													calendar.render();
												});

											});
										</script>


										</div>






										

										<div class="tab-pane container fade" id="menu1">
									
											<table id="tablas" style="width:100%; color:black;" class="table table-striped table-hover">
											
											<thead>
													<tr>
														<th>ID</th>				
														<th>FECHA DE INICIO</th>		
														<th>FECHA DE CIERRE</th>
														<th>AÑO ACADEMICO</th>
														<th>ESTADO</th>
														<th>ACCIONES</th>
													</tr>
												</thead>

												<tbody id="tabla">


													<?php
													if (!empty($consuta)) {
														echo $consuta;
													}
													?>

												</tbody>

											</table>

										</div>




									</div>
									<?php } ?>
								</div>

					   	</div>
					 	</div>  
					</div>



<!------------------------------------------FINAL DE LA TABLA -------------------------------------------------->
					







<form id="f4" style="display: none;">

<input type="text" name="consulta" id="consulta">
</form>









<!------------------------------------------------MODAL REGISTRO------------------------------------------------->
<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <form id="f">
        <h5 class="modal-title">Registrar Años Academicos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


	  <h5 class="modal-title">Año Academico</h5>
	    <hr>
		<div class="form-row">

			<div class="form-group col-md-4">
				<label>Fecha Inicio</label>
				<span style="color:#FF0000" id="sfecha_ini"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
				<input type="date" class="form-control" name="fecha_ini" id="fecha_ini" required placeholder="3">
			</div>

			<div class="form-group col-md-4">
				<label>Fecha Cierre</label>
				<span style="color:#FF0000" id="sfecha_cierr"></span>
				<input type="date" class="form-control" name="fecha_cierr" id="fecha_cierr" required placeholder="Tarde">
			</div>

			<div class="form-group col-md-4">
				<label>Año Academico</label>
				<span style="color:#FF0000" id="sano_academico"></span>
				<input type="text" class="form-control" name="ano_academico" id="ano_academico" required placeholder="0000-0000">
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

<!--------------------------------------FIN MODAL REGISTRO-------------------------------------------------->
					   
					   
					   








					   
					   
<!---------------------------------MODAL EDITAR------------------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <form id="f2">
        <h5 class="modal-title">Editar Año Academico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <h5 class="modal-title">Año Academico</h5>
	    <hr>

		<div class="form-row">

			<div class="form-group col-md-4" style="display:none;">
				<label>Id</label>
				<span id="sid1"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
				<input type="text" class="form-control " name="id1" id="id1" required >
			</div>

			<div class="form-group col-md-4">
				<label>Fecha Inicio</label>
				<br>
				<span style="color:#FF0000" id="sfecha_ini1"></span>			
				<input type="date" class="form-control" name="fecha_ini1" id="fecha_ini1" required >
			</div>

			<div class="form-group col-md-4">
				<label>Fecha Cierre</label>
				<span style="color:#FF0000" id="sfecha_cierr1"></span>			
				<input type="date" class="form-control" name="fecha_cierr1" id="fecha_cierr1" required >
			</div>

			<div class="form-group col-md-4">
				<label>Año Academico</label>
				<span style="color:#FF0000" id="sano_academico1"></span>			
				<input type="text" class="form-control" name="ano_academico1" id="ano_academico1" required >
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
<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title">Borrar Año Academico Registrado</h5>
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
		<p style="color:#FF0000"><small>Esta Accion no es reversible</small></p>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="borrar">Si, Borrar</button>

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

    <script src="assets/js/ano_academico.js"></script>
    <script  src="assets/js/script.js"></script>

</body>

<style>
	* {
		font-family: 'Poppins',sans-serif;
                                                
       }
</style>

</html>




<!-- Modal: Informacion  -->
<div class="modal fade bd-example-modal-lg" id="info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content"> 
		<div class="modal-header">
             <h5 class="modal-title">Registrar Años Academicos</h5>
			<!-- <input type="text" id="filtroEstudiantes" placeholder="Buscar estudiantes"> -->
        </div>

		 <div class="modal-body">
		
<table id="tablas" style="width:100%" class="table table-striped table-hover  tabla_estudiantes">
                <thead>
                   <th>ID</th>
                   <th>FECHA INICIO</th>
                   <th>FECHA CIERRE</th>
                   <th>EVENTO</th>
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