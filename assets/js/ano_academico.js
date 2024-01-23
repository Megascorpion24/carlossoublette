$(document).ready(function() {

     console.log(location.href);



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


    $("#ano_academico").on("keypress", function(e) {
        validarkeypress(/^[0-9\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

    });

    $("#ano_academico").on("keyup", function() {
        validarkeyup(/^[0-9]{4}[\.-]{1}[0-9]{4}$/,
            $(this), $("#sano_academico"), "Los años debe ser solamente numeros");
    });
    
/*aqui termina registrar*/










//<!---------------------------------------------------------------------------------------------------------------------------->




/*validaciones para editar*/

$("#ano_academico1").on("keypress", function(e) {
    validarkeypress(/^[0-9\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);
});

$("#ano academico1").on("keyup", function() {
     validarkeyup(/^[0-9]{4}[\.-]{1}[0-9]{4}$/,
        $(this), $("#sano_academico1"), "Los años debe ser solamente numeros");
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
                $("#ano_academico1").val($(this).find("th:eq(3)").text());
               
                

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


    function delete_info(estado) {
    var mensaje = '';

    if (estado == 0) {
        mensaje = 'No se puede eliminar el año académico porque está DESHABILITADO';
    }

     

alert(mensaje);

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
                 alert(respuesta);
                 $("#consulta").val("consulta");
                 enviaAjax2($("#f4"));
                 window.location.reload();
                   
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
    }else if (valcierr($('#fecha_cierr').val(),$("#sfecha_cierr")) == 0) {
        mensaje("<p>Debe de seleccionar una fecha</p>");
        return false;
    }else if (validarkeyup(/^[0-9]{4}[\.-]{1}[0-9]{4}$/,
        $("#ano_academico"), $("#sano_academico"), "Los años debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000</p>");
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
    }else if (validarkeyup(/^[0-9]{4}[\.-]{1}[0-9]{4}$/,
        $("#ano_academico1"), $("#sano_academico1"), "Los años debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000</p>");
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





//<!---------------------------------------------------------------------------------------------------------------------------->

const input1 = document.getElementById("ano_academico");
const input2 = document.getElementById("ano_academico1");


// Función para limitar la longitud del valor
const limitarLongitud = (input, maxLength) => {
  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
  }
};

  
input1.addEventListener("input", () => {
    const maxLength = 9; // Cambia este valor al límite máximo deseado
    limitarLongitud(input1, maxLength);
});
    
input2.addEventListener("input", () => {
    const maxLength = 9; // Cambia este valor al límite máximo deseado
    limitarLongitud(input2, maxLength);
});

    
    
    