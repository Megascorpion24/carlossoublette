
function validarkeyup(er, etiqueta, etiquetamensaje, mensaje) {
    valid = er.test(etiqueta.val());
    if (valid) {
        etiquetamensaje.text("");
        return 1;
    }
    else {
        etiquetamensaje.text(mensaje);
        setTimeout(function() {
            etiquetamensaje.text("");
        }, 2000);
        

        return 0;
    }
}


function validarkeypress(er, e) {
    const key = e.keyCode;
    const tecla = String.fromCharCode(key);
    const isValid = er.test(tecla);
  
    if (!isValid) {
      e.preventDefault();
    }
  }
  
// -----------------------Validacion Registro-------------------------------------------

$("#nombre").on("keypress", function(e) {
    // const patron = /^[^\s]?[a-zA-Záéíóúñ]+$/;
    const patron =/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]$/;
    
    validarkeypress(patron, e);
});

$("#nombre").on("keyup", function() {
    validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/,
        $(this), $("#nombre1_v"), "El formato puede ser A-Z a-z 5-30");
});


// ---------------------Validacion Modificar---------------------------------------------
$("#nombre1").on("keypress", function(e) {
    const patron =/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]$/;
    
    validarkeypress(patron, e);
});

$("#nombre1").on("keyup", function() {
    validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/,
        $(this), $("#nombre1_v"), "El formato puede ser A-Z a-z 5-30");
});

 

//<!------------------------------------------------------------------------------------------------->


    function validarenvio() {
       
        if (validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/, $("#nombre"), $("#nombre_v"), "El formato puede ser A-Z a-z 5-30") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 5-30</p>");
            return false;
        }
    // -------------------------

            if (año == '') {
                $('#año_msj').text("Selecciona un Año..");
               
                setTimeout(function() {
                    $('#año_msj').text(""); 
                }, 2000); 

                return false;
            }
    // -------------------------

    var selectedValues = $("#docentes").val();

    if (!selectedValues || selectedValues.length < 1) {
      // Si no se ha seleccionado al menos un valor, muestra un mensaje de error
      $('#docentes_msj').text("Seleccione al menos 1 docente..");
      setTimeout(function() {
      $('#docentes_msj').text("");
    }, 2000);   

      return false;
    }
    
    // -------------------------  
    if (existe) { return false; }
    // -------------------------


        return true;
    }


//<!---------------------------------------------------------------------------------------------------------------------------->


    function validarEdit() {

        if (validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/,
        $("#nombre1"), $("#nombre1_v"), "El formato puede ser A-Z a-z 5-30") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-30</p>");
            return false;    
        } 
    // -------------------------

        if (año_edit == '') { 
            return false;
        }
    // -------------------------

        var selectedValues = $("#docentes1").val();

    if (!selectedValues || selectedValues.length < 1) {
      // Si no se ha seleccionado al menos un valor, muestra un mensaje de error
      $('#docentes1_msj').text("Seleccione al menos 1 docente..");
      setTimeout(function() {
      $('#docentes1_msj').text("");
    }, 2000);  

      return false;
    }

    
    // -------------------------
    if (existe2) {return false;}
    // -------------------------

        return true;
    }
