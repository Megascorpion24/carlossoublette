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


	<?php require_once('comunes/header.php'); ?>
	<?php require_once('comunes/menu.php'); ?>


</head>

<body>



	<!-- MAIN -->
	<main>
		<div class="head-title pt-3  mx-auto" style="width: 200px;  ">
			<div class="left">
				<h1>Gestión de Horarios</h1>
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
									<h2 class="ml-lg-2">Registro de clases</h2>
								</div>
								<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
									<?PHP if (in_array("registrar horario_docente", $nivel1)) { ?>
										<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xE147;</i>
											<span>Registrar</span>
										</a>
									<?php } ?>


								</div>
							</div>

							<div>
								<!-- Nav tabs -->
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#home">Horario</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#menu1">Tabla de registros</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<?PHP if (in_array("consultar horario_docente", $nivel1)) { ?>
									<div id="body2" class="tab-content">
										<div class="tab-pane container active" id="home">
									
										<div class="form-row">
										<div class="form-group col-md-4">
											<label >docente</label>
											<select  class="form-control col-md-4" id="selector">
												<option value="todos">todos</option>
												<?php
												foreach ($selector as $r) {
												?>
													<option><?php echo $r['cedula']; ?> </option>
												<?php
												}
												?>
											</select>
										</div>

										<div class="form-group col-md-4">
											<label for="">sección</label>
												
											<select class="form-control col-md-4" id="selector2">
												<option value="todos">todos</option>
												<?php
												foreach ($selector2 as $r) {
												?>
													<option><?php echo $r['seccion']; ?> </option>
												<?php
												}
												?>
											</select>
										</div>
										</div>

											<div id='calendar'></div>


											<script lenguage="JavaScript">
												document.addEventListener('DOMContentLoaded', function() {

													let selector = document.querySelector("#selector");
													let selector2 = document.querySelector("#selector2");
													let calendarEl = document.getElementById('calendar');

													let calendar = new FullCalendar.Calendar(calendarEl, {
														initialView: 'timeGridWeek',
														weekends: false, // oculta sabados y domingos
														locale: "es",
														allDaySlot: false,
														headerToolbar: {
															left: 'prev,today,next',
															center: 'title',
															right: 'dayGridMonth,timeGridWeek,timeGridDay'
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
														businessHours: {
															// days of week. an array of zero-based day of week integers (0=Sunday)


															startTime: '06:00', // a start time (10am in this example)
															endTime: '18:00', // an end time (6pm in this example)
														},

														eventDidMount: function(arg) {
															let val = selector.value;
															if (!(val == arg.event.extendedProps.profe || val == "todos")) {
																arg.el.style.display = "none";
															
															}
																let val2 = selector2.value;
															if (!(val2 == arg.event.extendedProps.seccion || val2 == "todos")) {
																arg.el.style.display = "none";
															}
														
														},
														
														
														events: function(fetchInfo, successCallback, failureCallback) {
															successCallback([<?php
																				foreach ($evento as $r) {
																				?> {
																		id: "<?php echo $r["id"]; ?>",
																		title: "<?php echo $r["clase"]; ?>",
																		seccion:"<?php echo $r["seccion"]; ?>",		
																		profe: "<?php echo $r["cedula"]; ?>",
																		daysOfWeek: "<?php echo $r["dia"]; ?>",
																		startTime: "<?php echo $r["clase_inicia"]; ?>",
																		endTime: "<?php echo $r["clase_termina"]; ?>",
																		startRecur: "<?php echo $r["inicio"]; ?>",
																		endRecur: "<?php echo $r["fin"]; ?>",


																	},




																<?php
																				}
																?>
															]);
														},



														eventClick: function(info, view, jsEvent) {

															$("#id").val(info.event.id);

															$("#editEmployeeModal").modal();



														},


														eventColor: "#F27171",
														eventBackgroundColor: "#947BE6",




													});
													calendar.render();

													selector.addEventListener('change', function() {
														calendar.refetchEvents();
													}
													);
													selector2.addEventListener('change', function() {
														calendar.refetchEvents();
													}
													);
													$('#addEmployeeModal').on('hidden.bs.modal', function() {
														calendar.render();
													});
												});
											</script>


										</div>











										<div class="tab-pane container fade" id="menu1">

											<table id="tablas" style="width:100%; color:black;" class="table table-hover table-dark">

												<thead>
													<tr>
														<th>ID</th>
														<th>Clase</th>
														<th>Profesor</th>
														<th>Seccion</th>
														<th >ID dia</th>
														<th>Dia</th>
														<th>Clase inicia</th>
														<th>Clase termina</th>
														<th>Año academico</th>
														<th>Acciones</th>
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



						<!------------------------------------------clase_terminaAL DE LA TABLA -------------------------------------------------->
						<form id="f4" style="display: none;">

							<input type="text" name="consulta" id="consulta">



						</form>




						<!------------------------------------------------MODAL REGISTRO------------------------------------------------->
						<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<form id="f">
											<h5 class="modal-title">Registrar clase</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
									</div>
									<div class="modal-body">


										<h5 class="modal-title"> Ingresar información clase</h5>

										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Materia</label>
												<span style="color:#FF0000" id="sclase"></span>
												<input type="text" class="form-control" style="display: none;" name="accion" value="accion" required>
												<div class="form-group col-md-4">

													<select class="form-control col-md-4" name="clase" id="clase" onchange="añadir('#clase')">
														<?php
														if (!empty($consuta2)) {
															echo $consuta2;
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group col-md-4">
												<label>docente</label>
												<div class="form-group col-md-4">
													<span style="color:#FF0000" id="scedula_profesor"></span>
													<input type="text" class="form-control" style="display: none;" name="accion" value="accion" required>
													<select class="form-control" name="cedula_profesor" id="cedula_profesor" onchange="añadir2('#cedula_profesor')">
														<?php
														if (!empty($consuta3)) {
															echo $consuta3;
														}
														?>
													</select>
												</div>
											</div>


										
												
													<div class="form-group col-md-4">
														<label>Sección:</label>
														<span style="color:#FF0000" id="sano"></span>
														<input type="text" class="form-control" style="display: none;" name="accion" value="accion" required>
														<select name="ano" id="ano" onchange="añadir3('#ano')">
															<?php
															if (!empty($consuta4)) {
																echo $consuta4;
															}
															?>
														</select>
													</div>
										
											



										

										

											<div class="form-group col-md-4">
												<label>dia</label>
												<span style="color:#FF0000" id="sdia"></span>
												<select class="form-control" id="dia" name="dia">
													<option value="0">-Selecionar-</option>
													<option value="1">lunes</option>
													<option value="2">martes</option>
													<option value="3">miercoles</option>
													<option value="4">jueves</option>
													<option value="5">viernes</option>
												</select>
											</div>

											<div class="form-group col-md-4">
												<label>Clase inicia</label>
												<span style="color:#FF0000" id="sclase_inicia"></span>
												<input type="time" class="form-control" name="clase_inicia" id="clase_inicia" required>
											</div>
											<div class="form-group col-md-4">
												<label>Clase termina</label>
												<span style="color:#FF0000" id="sclase_termina"></span>
												<input type="time" placeholder="hh/mm" class="form-control" name="clase_termina" id="clase_termina" required>
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
						</div>
					</div>

					<!--------------------------------------clase_termina MODAL REGISTRO-------------------------------------------------->



					<!---MODAL BORRAR--------->
					<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Anular Clase</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"></span>
									</button>
								</div>
								<form id="f3">

									<input type="text" class="form-control" style="display: none;" name="id1" id="id1" required>
									<input style="display: none;" type="text" name="accion3" id="accion3" value="accion">
								</form>
								<div class="modal-body">
									<p>Esta seguro/segura que desea anular este registro?</p>
									<p style="color:#FF0000">esta accion no puede ser revertida</p>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									<button type="button" class="btn btn-success" id="borrar">borrar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!----FIN MODAL BORRAR--------->


				<!-----------------------------------------------clase_termina MODAL BORRAR------------------------------------------------------>



				<!---------------------------------MODAL EDITAR------------------------------------------------------------------>
				<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<form id="f2">
									<h5 class="modal-title">Editar clase</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"></span>
									</button>
							</div>
							<div class="modal-body">

								<h5 class="modal-title">Modifcar informacion de la clases</h5>
								<hr>

								<div class="form-row">



									<div class="form-row">

										<div class="form-group col-md-4">
											<label>Dia</label>
											<span style="color:#FF0000" id="sdia1"></span>
											<input type="text" class="form-control" style="display: none;" name="accion1" value="accion1" required>
											<input type="text" class="form-control" style="display: none;" name="id" id="id" required>
											<select class="form-control" id="dia1" name="dia1">
												<option value="0">-Seleccionar-</option>
												<option value="1">lunes</option>
												<option value="2">martes</option>
												<option value="3">miercoles</option>
												<option value="4">jueves</option>
												<option value="5">viernes</option>
											</select>
										</div>
										
											<div class="form-group col-md-4">
												<div class="form-group col-md-4">
													<label>sección:</label>
													<span style="color:#FF0000" id="sano1"></span>

													<select class="form-control" name="ano1" id="ano1" onchange="añadir3('#ano')">
														<?php
														if (!empty($consuta4)) {
															echo $consuta4;
														}
														?>
													</select>
												</div>
											</div>
										
									
									
										<div class="form-group col-md-4">
											<label>inicio de la clase</label>
											<span style="color:#FF0000" id="sclase_inicia1"></span>
											<input type="time" class="form-control" name="clase_inicia1" id="clase_inicia1" required>
										</div>
										<div class="form-group col-md-4">
											<label>clase_termina</label>
											<span style="color:#FF0000" id="sclase_termina1"></span>
											<input type="time" class="form-control" name="clase_termina1" id="clase_termina1" required>
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
					</div>
				</div>
				<!---------------------------------------------clase_termina MODAL EDITAR------------------------------------------------->

			</div>


			<!-- End popup dialog box -->


















	</main>
	<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<?php require_once('comunes/footer.php') ?>
	<script src="assets/js/horario_docente.js"></script>
	<script src="assets/js/script.js"></script>





	<!-----------------------------------------------MODAL BORRAR------------------------------------------------------>





















</body>
<style>
	* {
		font-family: 'Poppins',sans-serif;
                                                
       }
</style>
</html>


