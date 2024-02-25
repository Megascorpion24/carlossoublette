<?php



require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = '1a3LM3W966D6QTJ5BJb9opunkUcw_d09NCOIJb9QZTsrneqOICoMoeYUDcd_NfaQyR787PAH98Vhue5g938jdkiyIZyJICytKlbjNBtebaHljIR6-zf3A2h3uy6pCtUFl1UhXWnV6madujY4_3SyUViRwBUOP-UudUL4wnJnKYUGDKsiZePPzBGrF4_gxJMRwF9lIWyUCHSh-PRGfvT7s1mu4-5ByYlFvGDQraP4ZiG5bC1TAKO_CnPyd1hrpdzBzNW4SfjqGKmz7IvLAHmRD-2AMQHpTU-hN2vwoA-iQxwQhfnqjM0nnwtZ0urE6HjKl6GWQW-KLnhtfw5n_84IRQ';

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
	<?php require_once('comunes/header.php'); ?>
	<?php require_once('comunes/menu.php'); ?>
</head>

<body>


	<!-- MAIN -->
	<main>
		<div class="head-title pt-3 mx-auto" style="width: 200px;">
			<div>
				<h1>mantenimiento </h1>
			</div>
		</div>
		<!--TABLA -->
		<!------main-content-start----------->

		<div class="main-content">
			<div class="container">
			<?//PHP if (in_array("registrar horario_docente", $nivel1)) { ?>
				<div class="row">
					<div class="col">
						<div class="col-lg-6 col-md-6 col-xs-12 text-center py-2 ">
							<div class="card">
								<div class="card-body">
									<i class="fas fa-copy fa-9x text-muted"></i>
									<h5 class="mt-2 text-dark fs-4">Respaldar Base de Datos</h5>
									<form method="post">
									<?PHP if (in_array("respaldar", $nivel1)) {?>
									<input type="hidden" name="respaldo" value="respaldo">
									<input type="submit" class="btn btn-success" value="respaldar" id="respaldo">
									<?php } ?>
								</form>


								</div>
							</div>
						</div>


					</div>
					<div class="col">
						<div class="col-lg-6 col-md-6 col-xs-12 text-center py-2 ">
							<div class="card">
								<div class="card-body">
									<i class="fas fa-copy fa-9x text-muted"></i>
									
									<h5 class="mt-2 text-dark fs-4">Restaurar Base de Datos</h5>
									<?PHP if (in_array("restaurar", $nivel1)) {?>
									<a href="#importar" class="btn btn-success" data-toggle="modal">
							   
							   <span>restaurar</span>
							   </a>
							   <?php } ?>
								</div>
							</div>
							


						</div>
					</div>


				</div>
				<?//php } ?>



			</div>

			<!--FINAL DE LA TABLA -->
			<div class="modal fade" id="importar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">restaurar base de datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="POST" enctype="multipart/form-data">
  <input type="file" name="import_file" id="file" class="form-control" required>
  <!-- Agregamos el atributo "required" para indicar que el campo es obligatorio -->

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button name="restaurar" class="btn btn-success">Restaurar</button>
  </div>
</form>
    </div>
  </div>
</div>







	</main>
	<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<?php require_once('comunes/footer.php') ?>
	<script src="assets/js/script.js"></script>

</body>

</html>