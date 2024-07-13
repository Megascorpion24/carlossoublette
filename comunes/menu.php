<!-- MENU -->
<?php


require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("../carlossoublette/");
$dotenv->load();

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = $_ENV['JWT_SECRET_KEY'];

if (isset($_COOKIE['token'])) {
	$decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
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

<?php
function generateEncryptedLink($url, $img) {
    // Generar una clave de encriptación segura
    $key = openssl_random_pseudo_bytes(32); // AES-256 requiere una clave de 32 bytes
    $encoded_key = base64_encode($key); // Codificar la clave en base64 para almacenarla o transmitirla

    // Método de encriptación (AES-256-CBC en este caso)
    $method = "AES-256-CBC";

    // Generar un IV (vector de inicialización) aleatorio
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

    // Encriptar la URL
    $encrypted_url = openssl_encrypt($url, $method, $key, 0, $iv);

    // Codificar el resultado en base64, incluyendo el IV
    $encrypted_url = base64_encode($encrypted_url . '::' . base64_encode($iv));

    // Codificar la URL encriptada para que sea segura en una URL
    $encoded_encrypted_url = urlencode($encrypted_url);

    // Generar la etiqueta <a> con la URL encriptada y la clave como parámetros
    return '<a href="?pagina=' . $encoded_encrypted_url . '&key=' . urlencode($encoded_key) . '">' . $img . '</a>';
}
?>


<div class="wrapper">

	<div class="body-overlay"></div>

	<!-------TITULO------------>

	<div id="sidebar">
		<div class="sidebar-header">
			<h3><img src="assets/img/logo.jpeg" class="img-fluid" /><span>Sistema GPUECCS</span></h3>
		</div>
		<ul class="list-unstyled component m-0">
			<!-------1 PAGINA------------>
			<li class="">
			<?php echo generateEncryptedLink("principal", 'Inicio');?>

			</li>
			<!-------2 PAGINA------------>
			<?php
			if (in_array("consultar usuario", $nivel1)) {
			if ($pagina=="usuarios") {
				$variable="active";
			}else{
				$variable="";
			}
			?>
				<li class="<?php echo $variable?>">
				<?php echo generateEncryptedLink("usuarios", '<img class="pr-3 " src="assets/icon/comment-user.png" />Usuarios ');?>
				
				</li>
			<?php
			}
			?>
			<!-------3 PAGINA------------>
			<?php
			if (in_array("consultar docente", $nivel1)) {
				if ($pagina=="docente") {
					$variable="active";
				}else{
					$variable="";
				}

			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("docente", '<img class="pr-3" src="assets/icon/usuario.png" />Docentes');?>
			
			</li>
			<?php
			}
			?>
			
			<!-------4 PAGINA------------>
			<?php
			if (in_array("consultar representante", $nivel1)) {
				if ($pagina=="representante") {
					$variable="active";
				}else{
					$variable="";
				}
			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("representante", '<img class="pr-3" src="assets/icon/users.png" />Representantes ');?>
			
			</li>
			<?php
			}
			?>
			<!-------5 PAGINA------------>
			<?php
			if (in_array("consultar inscipcion", $nivel1)) {
				if ($pagina=="inscripciones") {
					$variable="active";
				}else{
					$variable="";
				}
			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("inscripciones", '<img class="pr-3" src="assets/icon/comprobacion-de-comentarios.png" />Inscripciones ');?>
				
			</li>
			<?php
			}
			?>
			<!-------6 PAGINA------------>
			<?php
			if (in_array("consultar pagos menu", $nivel1)) {
				if ($pagina=="pagos") {
					$variable="active";
				}else{
					$variable="";
				}
			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("pagos", '<img class="pr-3" src="assets/icon/coins.png" />Pagos');?>

			</li>
			<?php
			}
			?>
			<!-------6 PAGINA------------>
			<?php
			if (in_array("consultar materias", $nivel1)) {
				if ($pagina=="materia") {
					$variable="active";
				}else{
					$variable="";
				}
			?>
			<li class=" <?php echo $variable?>">
			<?php echo generateEncryptedLink("materia", '<img class="pr-3" src="assets/icon/books.png" />Materias');?>
		
			</li>
			<?php
			}
			?>

			<!-------7 PAGINA------------>
			<?php
			if (in_array("consultar secciones", $nivel1)) {
				if ($pagina=="seccion") {
					$variable="active";
				}else{
					$variable="";
				}
			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("seccion", '<img class="pr-3" src="assets/icon/usuario-de-pizarra.png" />Secciones');?>
				
			</li>
			<?php
			}
			?>
			<!-------8 PAGINA------------>
			<?php
			if (in_array("consultar ano_academico", $nivel1)) {
				if ($pagina=="ano_academico" or $pagina=="eventos") {
					$variable="active";
				}else{
					$variable="";
				}
			?>

			<li class="dropdown <?php echo $variable?>">
				<a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<img class="pr-3 " src="assets/icon/calculadora.png" />Lapso Academico
				</a>
				<ul class="collapse list-unstyled menu" id="homeSubmenu2">
				
					<li><?php echo generateEncryptedLink("ano_academico", '<img class="pr-3" src="assets/icon/calendario2.png" />Año Academico');?>
					<li><?php echo generateEncryptedLink("eventos", '<img class="pr-3" src="assets/icon/calendario.png" />Eventos');?></li>
				</ul>
			</li>

			<?php
			}
			?>
			<!-------9 PAGINA------------>
			<?php
			if (in_array("consultar horario_docente", $nivel1)) {
				if ($pagina=="horario_docente") {
					$variable="active";
				}else{
					$variable="";
				}
			?>

			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("horario_docente", '<img class="pr-3" src="assets/icon/editar.png" />Horarios');?>
		
				
			</li>
			<?php
			}
			?>
			<!-------11 PAGINA------------>
			<?php
			if (in_array("consultar seguridad", $nivel1)) {
				if ($pagina=="seguridad") {
					$variable="active";
				}else{
					$variable="";
				}
				
			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("seguridad", '<img class="pr-3" src="assets/icon/layout-fluid.png" />seguridad');?>
				
			</li>
			<?php
			}
			?>
			<!-------12 PAGINA------------>
			<?php
			if (in_array("consultar seguridad", $nivel1)) {
				if ($pagina=="reporte_egresos" or $pagina=="reporte_ingreso" or $pagina=="reporte_pagos") {
					$variable="active";
				}else{
					$variable="";
				}
			?>

			<li class="dropdown <?php echo $variable?>">
				<a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<img class="pr-3" src="assets/icon/grafico.png" />Reportes
				</a>
				<ul class="collapse list-unstyled menu" id="homeSubmenu3">
				
					<li><?php echo generateEncryptedLink("reporte_ingreso", '<img class="pr-3" src="assets/icon/grafico-simple.png" />reporte de ingresos');?></li>
					<li><?php echo generateEncryptedLink("reporte_egresos", '<img class="pr-3" src="assets/icon/grafico-simple-horizontal.png" />reporte de egresos ');?></li>
					
					<li><?php echo generateEncryptedLink("reporte_pagos", '<img class="pr-3" src="assets/icon/grafico-simple-horizontal.png" />reporte de pagos ');?></li>
				</ul>
			</li>
			<?php
			}
			?>

			<?php
			if (in_array("Consultar Bitacora", $nivel1)) {
				if ($pagina=="mantenimiento") {
					$variable="active";
				}else{
					$variable="";
				}
			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("mantenimiento", '<img class="pr-3" src="assets/icon/reloj.png" />mantenimiento');?>
				
			</li>
			<?php
			}
			?>
			<!-------13 PAGINA------------>
			<?php
			if (in_array("Consultar Bitacora", $nivel1)) {
				if ($pagina=="bitacora") {
					$variable="active";
				}else{
					$variable="";
				}
			?>
			<li class="<?php echo $variable?>">
			<?php echo generateEncryptedLink("bitacora", '<img class="pr-3" src="assets/icon/ajustes.png" />bitacora');?>

			</li>
			<?php
			}
			?>
			<li class="">
				
				<a href="?pagina=manual" target="_blank" class=""><img class="pr-3" src="assets/icon/ajustes.png" />manual de usuario</a>
			</li>



		</ul>
	</div>

	<!-------fIN DEL MENU----------->



	<!-------page-content start----------->

	<div id="content">

		<!------BOTON RESPONSIVE----------->

		<div class="top-navbar">
			<div class="xd-topbar">
				<div class="row">
					<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
						<div class="xp-menubar">
							<img class="p-1" style="Width:30px; height:30px;" src="assets/icon/apps.png" />
						</div>
					</div>


					<!------NOTIFICACIONES----------->

					<div class="col-10 col-md-6 col-lg-11 order-1 order-md-3">
						<div class="xp-profilebar text-right">
							<nav class="navbar p-0">
								<ul class="nav navbar-nav flex-row ml-auto">
									<li class="dropdown nav-item active">
										<a class="nav-link" href="#" data-toggle="dropdown">
											<img class="pt-1 pb-1" style="Width:30px; height:42px;" src="assets/icon/bookmark.png" />
											<span class="notification"><?php if (!empty($_SESSION['cantidad'])) {
																			echo $_SESSION['cantidad'];
																		} ?></span>
										</a>
										<ul class="dropdown-menu">
											<form id="r" class="">
												<?php if (!empty($_SESSION['notificaciones'])) {
													echo $_SESSION['notificaciones'];
												} ?>
											</form>
										</ul>
									</li>

									<!------USUARIOS----------->

									<li class="dropdown nav-item">
										<a class="nav-link" href="#" data-toggle="dropdown">
											<img src="assets/img/user.png" style="width:40px; border-radius:50%;" />
											<span class="xp-user-live"></span>
										</a>
										<ul class="dropdown-menu small-menu">
										
											<li><?php echo generateEncryptedLink("salida", '<img class="p-1" style="Width:20px; height:20px;" src="assets/icon/sign-out-alt.png" />
													Salir');?></li>

										</ul>
									</li>
									<!----------------->

								</ul>
							</nav>
						</div>
					</div>

				</div>




			</div>
		</div>
		<!------top-navbar-end----------->