$(document).ready(function() {
 
  if ($.trim($("#texto").text()) != "") {
    $("#errorModal").modal();
    $("#mens").text($("#texto").text());
      
      }
      
   $("#user").on("keypress", function(e) {
          validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]$/, e);
  
      });
  
      $("#user").on("keyup", function() {
          validarkeyup(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,10}$/,
              $(this), $("#suser"), "El formato puede ser A-Z a-z (.)(#)(@)(*) 4-10");
      });
  
     
  
      $("#enviar").on("click", function() {
        
          if (validarenvio()) {
               $("#f").submit();
  
          }
      });
      
      const input1 = document.getElementById("user");
  
  
    
    // Función para limitar la longitud del valor
    const limitarLongitud = (input, maxLength) => {
        if (input.value.length > maxLength) {
          input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
        }
      };
      
      
        
      input1.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input1, maxLength);
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
      if (validarkeyup(/^[0-9A-Za-z\b\s\u002A\u002E\u00F1\u00D1]{4,26}$/, $("#user"),
              $("#suser"), "El usuario debe tener de [4 - 26] caracteres, solo(.)(#)") == 0) {
          mensaje("<p>El usuario debe coincidir con el formato <br/>" +
              "de 4 a 26 caracteres y puede llevar (.)(#)</p>");
          return false;
      } 
  
     
      return true;
  }
