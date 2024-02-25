$(document).ready(function() {


    console.log(location.href);

    $('#cedula_profesor').select2({
        dropdownParent: $('#addEmployeeModal')
    });



    $("#registrar").on("click", function() {
        if (validarenvio()) {
          
            enviaAjax($("#f"));
            $('#addEmployeeModal').modal('hide');
            $('#f').trigger('reset');

       }
        

    });

    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
          
            enviaAjax($("#f2"));
            $('#editEmployeeModal').modal('hide');
            $('#f2').trigger('reset');

       }
   

    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->



/*validaciones para registrar*/


    $("#evento").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040\s]$/, e);

    });

    $("#evento").on("keyup", function() {
        validarkeyup(/^[A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040\s]{4,25}$/,
            $(this), $("#sevento"), "Los Lapsos debe ser solamente letras");
    });
    
/*aqui termina registrar*/










//<!---------------------------------------------------------------------------------------------------------------------------->




/*validaciones para editar*/

$("#evento1").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040\s]$/, e);

});

$("#evento1").on("keyup", function() {
        validarkeyup(/^[A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040\s]{4,25}$/,
            $(this), $("#sevento1"), "Los eventos debe ser solamente Letras");
});

/*aqui termina editar*/    
});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id1").val($(this).find("th:eq(0)").text());
                $("#fecha_ini1").val($(this).find("th:eq(1)").text());
                $("#fecha_cierr1").val($(this).find("th:eq(2)").text());
                $("#evento1").val($(this).find("th:eq(4)").text());
               
                

            }
        });
    
    }

//<!---------------------------------------------------------------------------------------------------------------------------->



    function eliminar(id){
        $("#id2").val(id);
        $("#borrar").on("click", function(){
           
        enviaAjax($("#f3"));
        $('#deleteEmployeeModal').modal('hide');
        });

    }


    function añadir1(valor){
        if (valor=='#cedula_profesor') {
            $('#cedula_profesor').prepend($(valor).val());
        }else{
            $('#cedula_profesor').append($(valor).val()); 
        }
        
    }




//<!---------------------------------------------------------------------------------------------------------------------------->


    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: function(respuesta) {
                 //alert(respuesta);
                LlamadaAlert(respuesta);
                 $("#consulta").val("consulta");
                 enviaAjax2($("#f4"));
                 setTimeout(function(){
                    window.location.reload();
                }, 1500);
                   
                },
                error: function(request, status, err){
                    if (status == "timeout") {
                        mensaje("Servidor ocupado, intente de nuevo");
                    } else {
                        mensaje("ERROR: <br/>" + request + status + err);
                    }
                },
                complete: function(){
                    
                }
                
        });
        
    }


//<!---------------------------------------------------------------------------------------------------------------------------->




    function enviaAjax2(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: function(respuesta) {
                 $("#tabla").html(respuesta);
                   
                },
                error: function(request, status, err){
                    if (status == "timeout") {
                        mensaje("Servidor ocupado, intente de nuevo");
                    } else {
                        mensaje("ERROR: <br/>" + request + status + err);
                    }
                },
                complete: function(){
                    
                }
                
        });
        
    }



//<!---------------------------------------------------------------------------------------------------------------------------->






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
            }, 2000);
            
    
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






//<!---------------------------------------------------------------------------------------------------------------------------->





    function validarenvio() {

    if (valini($('#fecha_ini').val(),$("#sfecha_ini")) == 0) {
        mensaje("<p>Debe de seleccionar una fecha </p>");
        return false;
    }else if (valprof($('#cedula_profesor').val(),$("#scedula_profesor")) == 0) {
              mensaje("<p>Debe de seleccionar una materia</p>");
              return false;
    }else if (valcierr($('#fecha_cierr').val(),$("#sfecha_cierr")) == 0) {
        mensaje("<p>Debe de seleccionar una fecha</p>");
        return false;
    }else if (validarkeyup(/^[A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040\s]{4,25}$/,
        $("#evento"), $("#sevento"), "Los lapsos debe ser solamente letras") == 0) {
        mensaje("<p>Solo letras de la A a la Z</p>");
        return false;
    
    }

    return true; 
    }





//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {

    if (valini($('#fecha_ini1').val(),$("#sfecha_ini1")) == 0) {
        mensaje("<p>Debe de seleccionar una fecha </p>");
        return false;
    }else if (valcierr($('#fecha_cierr1').val(),$("#sfecha_cierr1")) == 0) {
        mensaje("<p>Debe de seleccionar una fecha</p>");
        return false;
    }else if (validarkeyup(/^[0-9A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040\s]{4,25}$/,
        $("#evento1"), $("#sevento1"), "Los lapsos debe ser solamente letras") == 0) {
        mensaje("<p>Solo letras de la A a la Z</p>");
        return false;
    
    }
        
     return true;
    }



function valini(fecha_ini,sfecha_ini) {
    

    if (fecha_ini != 0) {
        
        return true;
    } else {
        sfecha_ini.text("seleccione una fecha de inicio")
        setTimeout(function() {
            sfecha_ini.fadeOut();
        }, 3000);
        return false;
    }



}

function valcierr(fecha_cierr,sfecha_cierr) {
    

    if (fecha_cierr != 0) {
        
        return true;
    } else {
        sfecha_cierr.text("seleccione una fecha de cierre")
        setTimeout(function() {
            sfecha_cierr.fadeOut();
        }, 3000);
        return false;
    }



}

function valprof(cedula_profesor,scedula_profesor) {
    

    if (cedula_profesor != 'seleccionar') {
        
        return true;
    } else {
        scedula_profesor.text("seleccione a un profesor")
        setTimeout(function() {
            scedula_profesor.fadeOut();
        }, 3000);
        return false;
    }



}





//<!---------------------------------------------------------------------------------------------------------------------------->

const input1 = document.getElementById("evento");
const input2 = document.getElementById("evento1");


// Función para limitar la longitud del valor
const limitarLongitud = (input, maxLength) => {
  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
  }
};

input1.addEventListener("input", () => {
  const maxLength = 25; // Cambia este valor al límite máximo deseado
  limitarLongitud(input1, maxLength);
});
  
input2.addEventListener("input", () => {
    const maxLength = 25; // Cambia este valor al límite máximo deseado
    limitarLongitud(input2, maxLength);
});

    
    
    