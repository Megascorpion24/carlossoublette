<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
   
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
    if(!empty($mensaje ) ){
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


     

        <form  method="post" id="f" class="login100-form validate-form">



        <div class="container">
          <!-- Usuario -->
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">        
          <span for="usuario" class="label-input100">Usuario</span>
          <span id="suser"></span>
          <input type="text"id="user" name="user" class="ocultar"/>
          <input class="input100" type="text"id="user1" name="user1" placeholder="Introducir Usuario" autofocus/>
          <span class="focus-input100"></span>
        </div>

        
          <!-- Contraseña -->
        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">        
          <span for="password"class="label-input100">Contraseña</span>
            <span id="spassword"></span>
            <input type="password"id="password" name="password" class="ocultar"/>
            <input class="input100" type="password"id="password1" name="password1" id="password1" placeholder="Introducir Contraseña"/>
            <span class="focus-input100"></span>                   
        </div>

        
          <!-- Boton Recuperar Contraseña -->  
          <br>
          <div class="change-password">
          <?php echo generateEncryptedLink("recuperar", 'Recuperar contraseña');?>

          </div>

          <!-- Boton Envio de formulario -->
          <br>
          <div class="boton container-login100-form-btn" >
						<button class="login100-form-btn" id="enviar">
							INGRESAR
						</button>
					</div>
          </div>
          </form>
          
			</div>
		</div>
	</div>


  <script>
    // Add event listener for form submission on Enter key press
    document.getElementById('f').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            document.getElementById('enviar').click();
        }
    });
</script>




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
    <script src="assets/js/jsencrypt.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>

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