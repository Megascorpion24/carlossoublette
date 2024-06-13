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
				<a href="?pagina=principal" class="">Inicio </a>
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
					<a href="?pagina=usuarios"><img class="pr-3 " src="assets/icon/comment-user.png" />Usuarios </a>
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
				<a href="?pagina=docente"><img class="pr-3" src="assets/icon/usuario.png" />Docentes</a>
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
				<a href="?pagina=representante"><img class="pr-3" src="assets/icon/users.png" />Representantes </a>
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
				<a href="?pagina=inscripciones" class=""><img class="pr-3" src="assets/icon/comprobacion-de-comentarios.png" />Inscripciones </a>
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
				<a href="?pagina=pagos"><img class="pr-3" src="assets/icon/coins.png" />Pagos </a>
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
				<a href="?pagina=materia"><img class="pr-3" src="assets/icon/books.png" />Materias </a>
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
				<a href="?pagina=seccion"><img class="pr-3" src="assets/icon/usuario-de-pizarra.png" />Secciones</a>
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
					<li><a href="?pagina=ano_academico"><img class="pr-3" src="assets/icon/calendario2.png" />Año Academico</a>
					<li><a href="?pagina=eventos"><img class="pr-3" src="assets/icon/calendario.png" />Eventos</a></li>
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
				<a href="?pagina=horario_docente"><img class="pr-3" src="assets/icon/editar.png" />Horarios</a>
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
				<a href="?pagina=seguridad" class=""><img class="pr-3" src="assets/icon/layout-fluid.png" />seguridad </a>
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
					<li><a href="?pagina=reporte_ingreso" class=""><img class="pr-3" src="assets/icon/grafico-simple.png" />reporte de ingresos </a></li>
					<li><a href="?pagina=reporte_egresos" class=""><img class="pr-3" src="assets/icon/grafico-simple-horizontal.png" />reporte de egresos </a></li>
					<li><a href="?pagina=reporte_pagos" class=""><img class="pr-3" src="assets/icon/grafico-simple-horizontal.png" />reporte de pagos </a></li>
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
				<a href="?pagina=mantenimiento" class=""><img class="pr-3" src="assets/icon/reloj.png" />mantenimiento</a>
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
				<a href="?pagina=bitacora" class=""><img class="pr-3" src="assets/icon/ajustes.png" />bitacora</a>
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
											<li><a href="?pagina=salida">
													<img class="p-1" style="Width:20px; height:20px;" src="assets/icon/sign-out-alt.png" />
													Salir
												</a></li>

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