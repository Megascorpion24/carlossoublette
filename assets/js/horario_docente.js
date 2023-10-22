$(document).ready(function() { 
    
    
    console.log(location.href);
    

  $('#ano').select2({
    dropdownParent: $('#addEmployeeModal')
  });
  $('#clase').select2({
    dropdownParent: $('#addEmployeeModal')
  });
  $('#cedula_profesor').select2({
    dropdownParent: $('#addEmployeeModal')
  });
  
  







    $("#registrar").on("click", function() {
        
          
            enviaAjax($("#f"));
            $('#addEmployeeModal').modal('hide');
         
            $('#f').trigger('reset');
       
        

    });

    $("#registrar2").on("click", function() {
        
          
            enviaAjax($("#f2"));
       
            $('#editEmployeeModal').modal('hide');
            
       
   

    });
    
    


//<!---------------------------------------------------------------------------------------------------------------------------->
/*validaciones para registrar*/


$("#clase").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\s]$/, e);
});

$("#clase").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\s]{1,20}$/,
        $(this), $("#sclase"), "seleccione una sección");
});
$("#cedula_profesor").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\s]$/, e);
});

$("#cedula_profesor").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\s]{1,20}$/,
        $(this), $("#scedula_profesor"), "Selecione un docente");
});
$("#ano").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\s]$/, e);
});

$("#ano").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\s]{1,20}$/,
        $(this), $("#sano"), "Selecione una seccion");
});
$("#dia").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\s]$/, e);
});

$("#dia").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\s]{1,20}$/,
        $(this), $("#sdia"), "elegir un dia");
});









//<!---------------------------------------------------------------------------------------------------------------------------->











});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id").val($(this).find("th:eq(0)").text());
                $("#dia1").val($(this).find("th:eq(4)").text());
                $("#clase_inicia1").val($(this).find("th:eq(5)").text());
                $("#clase_termina1").val($(this).find("th:eq(6)").text());
                $("#inicio1").val($(this).find("th:eq(7)").text());
                $("#fin1").val($(this).find("th:eq(8)").text());
               
                

            }
        });
    
    }

//<!---------------------------------------------------------------------------------------------------------------------------->



    function eliminar(id){
        $("#id1").val(id);
        $("#borrar").on("click", function(){
           
        enviaAjax($("#f3"));
        });

    }

    function añadir(valor){
        if (valor=='#clase') {
            $('#clase').prepend($(valor).val());
        }else{
            $('#clase').append($(valor).val()); 
        }
        
       


    }


    function añadir2(valor){
        if (valor=='#ano') {
            $('#ano').prepend($(valor).val());
        }else{
            $('#ano').append($(valor).val()); 
        }
        
       


    }

    function añadir3(valor){
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
                 alert(respuesta);
                 $("#consulta").val("consulta");
                 enviaAjax2($("#f4"));
                 window.location.reload()
                
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
        
    
if (valfecha($("#clase"), $("#sclase")) == 0) {
        mensaje("La materia no puede estar vacia");
        return false;
    } else if (valfecha($("#cedula_profesor"), $("#scedula_profesor")) == 0) {
        mensaje("selecione una cedula");
        return false;
    } else if (valfecha($("#ano"), $("#sano")) == 0) {
        mensaje("selecione una sección");
        return false;
    } else if (valfecha($("#dia"), $("#sdia")) == 0) {
        mensaje("El dia no puede estar vacio");
        return false;
    }
    else if (valfecha($("#clase_inicia"), $("#sclase_inicia")) == 0) {
        mensaje("La hora no puede estar vacia");
        return false;
    }
    else if (valfecha($("#clase_termina"), $("#sclase_termina")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    else if (valfecha($("#inicio"), $("#sinicio")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    else if (valfecha($("#fin"), $("#sfin")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    
    
    return true;
}

function validarenvio() {
    if (validarkeyup(/^[0-9]{1,20}$/,
    $("#clase"), $("#sclase"), "selecione una materia") == 0) {
        mensaje("selecione una materia");
        return false;

    } else if (validarkeyup(/^[0-9]{4,10}$/,
    $("#cedula_profesor"), $("#scedula_profesor"), "selecione un docente") == 0) {
        mensaje("El diato puede ser 0000");
        return false;

    }  else if (validarkeyup(/^[A-Za-z]{4,26}$/,
    $("#ano"), $("#sano"), "seleccione una seccion") == 0) {
        mensaje("seleccione una seccion");
        return false;

    } else if (validarkeyup(/^[A-Za-z\s]{4,26}$/,
    $("#dia"), $("#sdia"), "selecione un dia") == 0) {
        mensaje("selecione un dia");
        return false;

    } else if (valfecha($("#clase_inicia"), $("#sclase_inicia")) == 0) {
        mensaje("La hora no puede estar vacia");
        return false;
    }
    else if (valfecha($("#clase_termina"), $("#sclase_termina")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    else if (valfecha($("#inicio"), $("#sinicio")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    else if (valfecha($("#fin"), $("#sfin")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    return true;
}




function valfecha(fecha, sfecha) {
    fechaq = fecha.val();
    if (fechaq == '') {
        sfecha.text("seleccione una fecha");
        setTimeout(function () {
            sfecha.text("");
        }, 3000);
        return false;
    } else {
        return true;
    }



}



   





//<!---------------------------------------------------------------------------------------------------------------------------->




   
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    