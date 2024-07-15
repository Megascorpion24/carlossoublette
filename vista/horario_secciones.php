
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
				<h1>Horario de Secciones</h1>
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
									<h2 class="ml-lg-2">Registro de eventos</h2>
								</div>
								<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">

									<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
										<i class="material-icons">&#xE147;</i>
										<span>Registrar</span>
									</a>



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
								<div class="tab-content">
									<div class="tab-pane container active" id="home">


										<select id="selector">
											<option value="todos">todos</option>
											<?php
											foreach ($selector as $r) {
											?>
												<option><?php echo $r['cedula']; ?> </option>
											<?php
											}
											?>
										</select>


										<div id='calendar'></div>


										<script lenguage="JavaScript">
											document.addEventListener('DOMContentLoaded', function() {

												let selector = document.querySelector("#selector");
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
													},
													events: function(fetchInfo, successCallback, failureCallback) {
														successCallback([<?php
																			foreach ($evento as $r) {
																			?> {
																	id: "<?php echo $r["id"]; ?>",
																	title: "<?php echo $r["clase"]; ?>",

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
													eventColor: "#F27171",
													eventBackgroundColor: "#947BE6",



													eventClick: function(info) {

														alert('id: ' + info.event.id);
														alert('docente: ' + info.event.extendedProps.profe);
														alert('hora: ' + info.event.startTime);



														

													}
												});
												calendar.render();

												selector.addEventListener('change', function() {
													calendar.refetchEvents();
												});
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
													<th>Dia</th>
													<th>clase_inicia</th>
													<th>clase_terminal</th>
													<th>inicio</th>
													<th>fin</th>
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
							</div>







						</div>



						<!------------------------------------------clase_terminaAL DE LA TABLA -------------------------------------------------->
						<form id="f4" style="display: none;">

							<input type="text" name="consulta" id="consulta">



						</form>



						<div id="consultarm" class="modal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Modal body text goes here.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary">Guardar Cambios</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									</div>
								</div>
							</div>
						</div>

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


										<h5 class="modal-title">clases</h5>

										<div class="form-row">
											<div class="form-group col-md-4">
												<label>materia</label>
												<span style="color:#FF0000" id="sclase"></span>
												<input type="text" class="form-control" style="display: none;" name="accion" value="accion" required>
												<div class="form-group col-md-4">

													<select class="form-control" name="clase" id="clase" onchange="añadir('#clase')">
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
												<select class="form-control" name="cedula_profesor" id="cedula_profesor" onchange="añadir2('#cedula_profesor')">
													<?php
													if (!empty($consuta3)) {
														echo $consuta3;
													}
													?>
												</select>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-4">
												<div class="form-group col-md-4">
													<div class="form-group col-md-4">
											
														<label>selecciona un año y seccion:</label>
														<span style="color:#FF0000" id="sano"></span>
														<select name="ano" id="ano" onchange="añadir3('#ano')">
															<?php
															if (!empty($consuta4)) {
																echo $consuta4;
															}
															?>
														</select>
													</div>
												</div>
											</div>



										</div>

										<div class="form-row">

											<div class="form-group col-md-4">
												<label>dia</label>
												<span style="color:#FF0000" id="sdia"></span>
												<select class="form-control" id="dia" name="dia">
												<option value="0">-seleccionar</option>
													<option value="1">lunes</option>
													<option value="2">martes</option>
													<option value="3">miercoles</option>
													<option value="4">jueves</option>
													<option value="5">viernes</option>
												</select>
											</div>

											<div class="form-group col-md-4">
												<label>clase_inicia</label>
												<span style="color:#FF0000" id="sclase_inicia"></span>
												
												<input type="time" class="form-control" name="clase_inicia" id="clase_inicia" required>
											</div>
											<div class="form-group col-md-4">
												<label>clase_termina</label>
												
												<span style="color:#FF0000"  id="sclase_termina"></span>
												<input type="time" class="form-control" name="clase_termina" id="clase_termina" required>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>inicio</label>
												<span style="color:#FF0000" id="sinicio"></span>
												<input type="date" class="form-control" name="inicio" id="inicio" required>
											</div>
											<div class="form-group col-md-4">
												<label>fin</label>
												<span style="color:#FF0000" id="sfin"></span>
												<input type="date" class="form-control" name="fin" id="fin" required>
											</div>



										</div>
										<div class="form-row">
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
					</div>

					<!--------------------------------------clase_termina MODAL REGISTRO-------------------------------------------------->



					<!---MODAL BORRAR--------->
					<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Delete Employees</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"></span>
									</button>
								</div>
								<form id="f3">

									<input type="text" class="form-control" style="display: none;" name="id1" id="id1" required>
									<input style="display: none;" type="text" name="accion3" id="accion3" value="accion">
								</form>
								<div class="modal-body">
									<p>Are you sure you want to delete this Records</p>
									<p class="text-warning"><small>this action Cannot be Undone,</small></p>
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
									<h5 class="modal-title">Editar clases</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&datetime-locals;</span>
									</button>
							</div>
							<div class="modal-body">

								<h5 class="modal-title">clases</h5>
								<hr>

								<div class="form-row">



									<div class="form-row">

										<div class="form-group col-md-4">
											<label>dia</label>
											<span id="sdia"></span>
											<input type="text" class="form-control" style="display: none;" name="accion1" value="accion1" required>
											<input type="text" class="form-control" style="display: none;" name="id" id="id" required>
											<select class="form-control" id="dia1" name="dia1">
												<option value="1">lunes</option>
												<option value="2">martes</option>
												<option value="3">miercoles</option>
												<option value="4">jueves</option>
												<option value="5">viernes</option>
											</select>
										</div>

										<div class="form-group col-md-4">
											<label>clase_inicia</label>
											<span id="sclase_inicia1"></span>
											<input type="time" class="form-control" name="clase_inicia1" id="clase_inicia1" required>
										</div>
										<div class="form-group col-md-4">
											<label>clase_termina</label>
											<span id="sclase_termina1"></span>
											<input type="time" class="form-control" name="clase_termina1" id="clase_termina1" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label>inicio</label>
											<span id="sinicio1"></span>
											<input type="date" class="form-control" name="inicio1" id="inicio1" required>
										</div>
										<div class="form-group col-md-4">
											<label>fin</label>
											<span id="sfin1"></span>
											<input type="date" class="form-control" name="fin1" id="fin1" required>
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
	<script src="assets/js/horario_secciones.js"></script>
	<script src="assets/js/script.js"></script>





	<!-----------------------------------------------MODAL BORRAR------------------------------------------------------>





















</body>

</html>