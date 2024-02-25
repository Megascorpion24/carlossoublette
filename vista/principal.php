
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

?>



<!DOCTYPE html>
<html lang="es">
<head>
	<?php  require_once('comunes/header.php');?>
    <?php require_once('comunes/menu.php'); ?>










</head>
<body>
 
<main>
	<div class="container border mt-5 shadow p-5 mb-4 bg-white rounded" style="width:85%;">
		
		<div class="h3 font-italic text-center mt-5">
			¡Bienvenido!
		</div>
		<div class="container ">
			
			<div class="card-body">
			<div class="h5">
		
				</div>

				<div class="mt-3">
					<p class="font-weight-normal text-justify">
					La Unidad Educativa Colegio Carlos Soublette es una institucional privada ubicada en la cerrera 18 entre calles 49 y 50 de Barquisimeto del estado Lara en el municipio Iribarren parroquia concepción , es una institución educativa la cual tiene como principal misión ayudar en su desarrollo educativo a los jóvenes adolescentes, presentadores una educación de calidad en todas las diferentes materias educativas tanto en el campo de la ciencias y ámbitos sociales sociales.
					</p>
				</div>
	

				<div class="mt-5">
					<p class="font-weight-normal text-justify">
					Ademas la institución a lo largo del año presenta a los estudiantes con diversas actividades unidas a las distintas festividades y celebraciones presentes a lo largo del año, al igual que distintos proyectos centrados en labores sociales que permiten a la institución y sus estudiantes unirse aun mas a la comunidad. Como unidad educativa, se centra en los niveles académicos de 1ro a 5to año de bachillerato al culminar sus estudios en la institución el estudiante se graduara con el titulo de bachiller en ciencias.
					</p>
				</div>

		



			</div>
		</div>
	</div> 

	</main>




	<?php require_once('comunes/footer.php') ?> 
    <script src="assets/js/principar.js"></script>



</body>
</html>