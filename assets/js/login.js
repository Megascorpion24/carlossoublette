






$(document).ready(function() {

   
  var publicKey = `-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl/s/lMg8oJcuiz4vRlYu
Q96OFjlwhIy/cpEXgYxtr/NV47BNISKv+4L0IulDkcYsTj8YjuCX6dZV0dy60yOr
MxTVWb162pfVvOQmHDzB4OUQGy+ksjvuUFnpmZ20vY7BzWIp2a2esBluiHAnAz8I
rWmZvgok6iaOunkcdmfbb88ZYnPucPIy0g0f1ndQgs9oRQ4VdNC6fQYyH3gZMBHf
fy8naxxpz8ew8CT2bM1QbLZUWVsB3ISn7zge3+GzIgUn8s2DolSlZ1/DCEVhf1sA
Ok9k828PnOT4EW/L++7I+JlZ5ExuEXLm45zccpoKrwDllrbDjVTtVo3ASmeE5jJU
gQIDAQAB
-----END PUBLIC KEY-----`;


    




 
  if ($.trim($("#texto").text()) != "") {
    $("#errorModal").modal();
    $("#mens").text($("#texto").text());
      
      }
      
   $("#user1").on("keypress", function(e) {
          validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]$/, e);
  
      });
  
      $("#user1").on("keyup", function() {
          validarkeyup(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,10}$/,
              $(this), $("#suser1"), "El formato puede ser A-Z a-z (.)(#)(@)(*) 4-10");
      });
  
      $("#password1").on("keypress", function(e) {
          validarkeypress(/^[0-9A-Za-z\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]$/, e);
      });
  
      $("#password1").on("keyup", function() {
          validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,10}$/,
              $(this), $("#spassword1"), "la contraseña puede llevar: A-Z a-z (.),(#),(@)(*),  4-10 caracteres ");
      });
  
  
      $("#enviar").on("click", function() {
        if (validarenvio()) {
          var user = $('#user1').val();
                var password = $('#password1').val();
                var encrypt = new JSEncrypt();
                encrypt.setPublicKey(publicKey);
                
                var encryptedUser = encrypt.encrypt(user);
                var encryptedPassword = encrypt.encrypt(password);
                
                $('#user').val(encryptedUser);
                $('#password').val(encryptedPassword);
                $('#password1').val("");
                $('#user1').val("");
          $("#f").submit();

        }
    });
      const input1 = document.getElementById("password1");
      const input2 = document.getElementById("user1");
  
  
    
    // Función para limitar la longitud del valor
    const limitarLongitud = (input, maxLength) => {
        if (input.value.length > maxLength) {
          input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
        }
      };
      
      input1.addEventListener("input", () => {
        const maxLength = 10; // Cambia este valor al límite máximo deseado
        limitarLongitud(input1, maxLength);
      });
        
      input2.addEventListener("input", () => {
          const maxLength = 10; // Cambia este valor al límite máximo deseado
          limitarLongitud(input2, maxLength);
      });



  
  });
  
    
 

  
  
  function validarkeyup(er, etiqueta, etiquetamensaje,
      mensaje) {
      a = er.test(etiqueta.val());
      if (a) {
          etiquetamensaje.text("");
          return 1;
      } else {
        etiquetamensaje.text(mensaje);
        setTimeout(function() {
            etiquetamensaje.text("");
        }, 5000);
  
          return 0;
      }
  }
  
  
  
  
  
  function validarkeypress(er, e) {
  
      key = e.keyCode;
  
  
      tecla = String.fromCharCode(key);
  
  
      a = er.test(tecla);
  
      if (!a) {
  
          e.preventDefault();
      }
  
  
  }
  
  function mensaje(mensaje) {
      $("#modal_content").html(mensaje);
      $("#modal_show").fadeIn();
      $('.ba_clos').click(function() {
          $('#modal_show').fadeOut();
      });
      setTimeout(function() {
          $("#modal_show").fadeOut();
      }, 10000);
  
  }
  
  function validarenvio() {
      if (validarkeyup(/^[0-9A-Za-z\b\s\u002A\u002E\u00F1\u00D1]{4,26}$/, $("#user1"),
              $("#suser1"), "El usuario debe tener de [8 - 26] caracteres, solo(.)(#)") == 0) {
          mensaje("<p>El usuario debe coincidir con el formato <br/>" +
              "de 8 a 26 caracteres y puede llevar (.)(#)</p>");
          return false;
      } else if (validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
              $("#password1"), $("#spassword1"), "Solo letras entre 8 y 16 caracteres, numeros, (.),(#),(@)(*)") == 0) {
          mensaje("<p>la clave debe tener entre 8 y 16 caracteres</p>");
          return false;
  
      }
      return true;
  }