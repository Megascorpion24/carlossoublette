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
</head>
<body>
 



							<!-- MAIN -->
	<main>
			<div class="head-title pt-3  mx-auto" style="width: 200px;  ">
				<div class="left">
					<h1 >SECCIONES</h1>
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


							 		<?PHP if (in_array("registrar secciones", $nivel1)) { ?>
							    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
									<i class="material-icons" style="width:100%" title="registrar"></i>
									<span>Registrar</span>
							    </a>
							    <?php } ?>

							    <!---<a href="#addEmployeeModalS" class="btn btn-success" data-toggle="modal">
									<i class="material-icons " style="width:100%" title="registrar"></i>
									<span>Registrar Secciones</span>
									</a>----->

					

							 </div>
					     </div>
					   </div>
					 
					   <table id="tablas" style="width:100%" class="table table-striped ">
					      <thead>
						     <tr>

							 <th>Id</th>
							 <th>Secciones</th>
							 <th>Año</th>
							 <th>Cupos</th>
							 <th>Turno</th>
							 <th>Docente Guia</th>
							 <th>Año Academico</th>
							 <th>Acciones</th>
							 </tr>
						  </thead>
						  <?PHP if (in_array("consultar secciones", $nivel1)) {?>
						  <tbody id="tabla">
						  		
								
								<?php
									if(!empty($consuta)){
										echo $consuta;
									}
								?>   
							 
						  </tbody> 
						  <?php } ?>  
					   </table>
					   
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
        <h5 class="modal-title">Registrar Secciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


	  <h5 class="modal-title">Secciones</h5>
	    <hr>

	  <div class="form-row">

	  	<div class="form-group col-md-4">
					<label>Secciones</label>
							<span style="color:#FF0000" id="ssecciones"></span>
							<input type="text" class="form-control" style="display: none;" name="accion" value="accion" required>

						<div class="form-group col-md-4">

							<select class="form-control" name="secciones" id="secciones" onchange="añadir1('#secciones')">
								<?php
								if (!empty($consuta1)) {
											echo $consuta1;
									}
									?>
								</select>

						</div>
				</div>

			<div class="form-group col-md-4">
					<label>Años</label>
							<span style="color:#FF0000" id="sano"></span>

						<div class="form-group col-md-4">

							<select class="form-control" name="ano" id="ano" onchange="añadir2('#ano')">
								<?php
								if (!empty($consuta2)) {
											echo $consuta2;
									}
									?>
								</select>

						</div>
				</div>

				 <div class="form-group col-md-4">
						<label>Docente Guia</label>
							<span style="color:#FF0000" id="scedula_profesor"></span>

							<div class="form-group col-md-4">

							<select class="form-control" name="cedula_profesor" id="cedula_profesor" onchange="añadir3('#cedula_profesor')">
										<?php
											if (!empty($consuta3)) {
														echo $consuta3;
												}
												?>
								</select>
					</div>
				</div>

				<div class="form-group col-md-4">
						<label>Año Academico</label>
							<span style="color:#FF0000" id="sano_academico"></span>

							<div class="form-group col-md-4">

							<select class="form-control" name="ano_academico" id="ano_academico" onchange="añadir4('#ano_academico')">
										<?php
											if (!empty($consuta4)) {
														echo $consuta4;
												}
												?>
								</select>
					</div>
				</div>

		</div>

		<div class="form-row">

			<div class="form-group col-md-4" style="display:none;">
				<label>Id</label>
				<span id="sid"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
				<input type="text" class="form-control sm" name="id" id="id">
			</div>

			<div class="form-group col-md-4">
				<label>Cantidad</label>
				<span style="color:#FF0000" id="scantidad"></span>
				<input type="text" class="form-control" name="cantidad" id="cantidad" required placeholder="Ejemplo: 10">
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
        <h5 class="modal-title">Editar Sección</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <h5 class="modal-title">Sección</h5>
	    <hr>

		<div class="form-row">

			<div class="form-group col-md-4" style="display:none;">
				<label>Id</label>
				<span id="sid1"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
				<input type="text" class="form-control " name="id1" id="id1" required >
			</div>

			<div class="form-group col-md-4">
				<label>Cantidad</label>
				<br>
				<span style="color:#FF0000" id="scantidad1"></span>			
				<input type="text" class="form-control" name="cantidad1" id="cantidad1" required >
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
        <h5 class="modal-title">Borrar Sección Registrada</h5>
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
        <button type="button" class="btn btn-success" id="borrar">Si, Borrar</button>
      </div>
    </div>
  </div>
</div>

<!-----------------------------------------------FIN MODAL BORRAR------------------------------------------------------>   


<!-----------------------------------------------------------------MODAL REGISTRO SECCIONES------------------------------------------------------------------>
<!--<div class="modal fade" tabindex="-1" id="addEmployeeModalS" role="dialog">
  	<div class="modal-dialog " role="document">
    	<div class="modal-content">
				<div class="modal-header">
				<form id="fs">
					<h5 class="modal-title">Registro de Secciones</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

      		<div class="modal-body">


				<h5 class="modal-title">Secciones</h5>
				<hr>

					<div class="form-row">
						<div class="form-group col-md-4 " style="display: none;">
							<label>ID</label>
								<span id="sidr"></span>
								<input type="text" class="form-control" style="display: none;"  name="accions" value="accions" required>
							<input type="text" class="form-control" name="ids" id="ids" required placeholder="0000">
						</div>
	
						<div class="form-group col-md-4">
							<label>Seccion</label>	
								<span id="sseccionesr"></span>
							<input type="text" class="form-control" name="seccionesr" id="seccionesr" required>
						</div>

					</div>
			
			</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" id="registrars">Registrar</button>
					</div>
			</form>
    	</div>
  	</div>
</div>-->

<!----------------------------------------------------------FIN MODAL REGISTRO SECCIONES----------------------------------------------------------------->
					  

		
						
					
				 
			    </div>
			</div>
		</main>
<!-- MAIN -->
	</section>
<!-- CONTENT -->


	<?php require_once('comunes/footer.php') ?> 
    <script src="assets/js/secciones.js"></script>
    <script  src="assets/js/script.js"></script>
</body>
</html>