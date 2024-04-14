
// -----------ALGORITMO DE VALIDACION--------
function validarkeypress(er, e) {
    
    key = e.keyCode;
    tecla = String.fromCharCode(key);
    Valid = er.test(tecla);

    if (!Valid || isNaN(tecla)) {

        e.preventDefault();
    }

}

function validarkeyup(er, etiqueta, etiquetamensaje, mensaje) {
   
    Valid = er.test(etiqueta.val());

    if (Valid) {
        etiquetamensaje.text("");
        return 1;
    } else {
        etiquetamensaje.text(mensaje);
        setTimeout(function() {
            etiquetamensaje.text("");
        }, 2000);
        return 0;
    }
}

// ----------------------------------------------------------

function Validate_Init(){

/*validaciones para registrar*/

$("#cantidad").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#cantidad").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#cantidad_msj"), "debe ser solamente numeros");
});

$('#cantidad').on('input', function() {
    $(this).val(function(_, val) {
      return val.slice(0, 2);
    });
  });
// ----------------------------------------------------

/*validaciones para editar*/

$("#cantidad_e").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);

});

$("#cantidad_e").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#cantidad_msj"), "debe ser solamente numeros");
});

  $('#cantidad_e').on('input', function() {
    $(this).val(function(_, val) {
      return val.slice(0, 2);
    });
  });


}



//<!------------Validar REGISTRAR---------------->
// *?NOTA: Depende aqui de las variables de EventListener.js


function ValidarEnvio_Registrar() {
     // ----------SECCION---------
    if (seccion == '') { 
        alert('Debes seleccionar al menos una opción en Seccion');
        return false;
    }
     // -----------AÑO---------
    if (año == ''){
       $('#año_msj').text('Seleccione un año..');

       setTimeout(function() {
        $('#año_msj').text("");
        }, 2000); 

        return false;
    }
    // ----------DOCENTE GUIA----------
    if (Doc_Guia == 0) { 
        $('#dg_msj').text('Seleccione un docente..');
 
        setTimeout(function() {
            $('#dg_msj').text("");
        }, 2000); 
    
        return false;
    }
    // ----------CANTIDAD----------
    if (validarkeyup(/^[0-9]{1,2}$/,$("#cantidad"), $("#cantidad_msj"), "el campo no puede estar vacio") == 0) {
        mensaje("<p>Solo numeros 0-9</p>");
        return false;

    }
    if ($("#cantidad").val() < 10 || $("#cantidad").val() > 40) {
        $('#cantidad_msj').text('La cantidad debe ser mayor o igual a 10 y menor a 40');
        return false;
    }

        // ------Existe---
    //Resultado de Validate_Exist.js
    if (existe==1) {
        return false;
    }


return true;
}

//<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


//<!--------------------Validar Editar---------------------------->
// *?NOTA: Depende aqui de las variables de EventListener.js


function ValidarEnvio_Editar() {
        // ---------Seccion y Año-----------
        if (seccion_edit == '' || año_edit == '') { 
            return false;
        } 
        console.log(seccion_edit);
        // ---------Cantidad------------------
        if (validarkeyup(/^[0-9]{1,2}$/,
        $("#cantidad_e"), $("#cantidad_msj2"), "el campo no puede estar vacio") == 0) {
            mensaje("<p>Solo numeros 0-9</p>");
            return false;
    
        }
        
        var cantidad_editar = $("#cantidad_e").val();

         if( (cantidad_editar < 10 || cantidad_editar > 40 ) ){
            $('#cantidad_msj2').text('La cantidad debe ser mayor o igual a 10 y menor a 40');
            return false;
        }
         if(cantidad_editar < Cantidad_estudintes){
            // $('#cantidad_msj2').text('Debe ser mayor o igual a ' + Cantidad_estudintes);
            $('#cantidad_msj2').html('Debe ser mayor o igual a <strong>' + Cantidad_estudintes + '</strong>');

            return false;
        }

        // ------Existe---
    //Resultado de Validate_Exist.js
        if (existe2==1) {
            return false;
        }

    return true;
}



// -----------------------------------------------------------------------------------------------
function ValidarEnvio_Abecedario(){
 
    var selectedValues = $("#sec").val();

    if (!selectedValues || selectedValues.length < 1) {
      // Si no se ha seleccionado al menos un valor, muestra un mensaje de error
      $('#sec_msj').text("Seleccione al menos 1 seccion..");

        setTimeout(function() {
            $('#sec_msj').text("");
        }, 2000);   

      return false;
    }

    return true;
}