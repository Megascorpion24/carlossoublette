$(document).ready(function() {

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
   CargarDataTable();

   PrimerValordeSeccion();//Validate_Exist.js

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //   -------------------Validar Envio Datos para Registrar--------------------------
    $("#registrar").on("click", function() {
 
        if (ValidarEnvio_Registrar()) { 
            console.log("se valido todo");
             console.log($('#f').serializeArray());

              enviaAjax($("#f"));  

            // Limpiar
            $('#addEmployeeModal').modal('hide');
            $('#f').trigger('reset');
            $("#Doc_Guia").val($("#Doc_Guia option:first").val()).trigger("change");
            //Valores de inicio
            Doc_Guia=0;
            seccion="";
            
            año="";

            //necesario
            PrimerValordeSeccion();
            }
    });  
  
    //   -------------------Validar Envio Datos para Modificar--------------------------
    $("#editar").on("click", function() {

        if (ValidarEnvio_Editar()) { 
            console.log("se valido edit");
        console.log($('#f2').serializeArray());


              enviaAjax($("#f2"));


              $('#editEmployeeModal').modal('hide');
              $('#f2').trigger('reset');
              }
    });
    

// -----------------Validar Envio de Abecedario-------------------------------    
$("#act_sec").on("click", function() { 
    if (ValidarEnvio_Abecedario()) { 
        // console.log("se valido todo");
          // console.log($('#f6').serializeArray());

          enviaAjax($("#f6")); 
          $('#exampleModalCenter').modal('hide');
          $('#f6').trigger('reset');
        }
});  


//<!---------------------------------------------------------------------------------------------------------------------------->
// ---------Libreria Select2----
$('#Doc_Guia').select2({
  dropdownParent: $('#addEmployeeModal')
});

// -------------MULTIPLE SELECT-------
  $(".js-example-placeholder-multiple").select2({
    placeholder: "Select a state",
    minimumResultsForSearch: 2 // Cambiar este valor al mínimo requerido
  });


    // ----------ABECEDARIO AGREGANDO CLASS---------
  $('#G_sec').on('click', function() {

    let sec = $('#sec');
    sec.find("option").each(function(index, option2) {
        var id = $(option2).attr('class');
        console.log(id);

        if (id === '1') {
            $(option2).prop("selected", true);
        }
    });

    sec.trigger("change");
  });
  // ------------------------------

    Validate_Init();//Llama a las validaciones

});

