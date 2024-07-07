<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar</title>
   
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> 
    <linkn href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    <?php  require_once('comunes/header.php');?>

    <!--===============================================================================================-->	
 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>

   




  <div id="texto" style="display:none;">
    <?php
    if (!empty($mensaje)) {
      echo $mensaje;
    }
    ?>
  </div>

  <!-- Modal de Error -->
  <div id="errorModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Contenido del modal -->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Nuevo Mensaje</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id="mens">¡Ups! Algo salió mal. Por favor, inténtalo de nuevo.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



  <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
				  <div class="login100-form-title" style="background-image: url(assets/img/bg-01.png);">
					<span class="login100-form-title-1">
						Bienvenido
					</span>
				  </div>


      <div class="container-icon">
      <input type="hidden" id="url" name="url" id="url" value="<?php echo $_GET['token'] ?>"  />
      </div>


      <form  method="post" id="f" class="login100-form validate-form">



      <div class="container">
     
 
            
            <div class="wrap-input100 validate-input m-b-26" > 
              <span for="password" class="label-input100">Contraseña</span> 
              <span id="spassword"></span>
              <input class="input100" type="password" id="password" name="password" id="password" placeholder="Digite su Contrasena" />
              <i id="reveal-password" ></i>

              <span id="password-alert" style="display: none;">Las contraseñas no son iguales</span>
              <span id="spassword1" ></span>
              <input class="input100" type="password" id="password1" name="password1" id="password1" placeholder="Repita su Contrasena" />
              <i  id="reveal-password1" ></i>

              <span class="focus-input100"></span>
            </div>


            <br>           
        <div class="change-password "id="enviar">
        <a  class="">RECUPERAR</a></div>
        <br>
  




        </div>

        </form>
            
    </div>
  </div>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <?php require_once('comunes/footer.php') ?> 
  <script src="assets/js/password.js"></script>
</body>

</html>


<style>
.change-password {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px 20px;
  background-color: #b88646c4;
  color: #626262;
  text-decoration: none;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  font-size: 16px;
}

.change-password a {
  color: #fff;
  text-decoration: none;
}

.change-password:hover {
  background-color: #312e2e;
}

.change-password:hover a {
  color: #80c080; /* verde opaco */
}


#password-alert {
  color: red;
  font-size: 16px;
  display: none;
}
</style>