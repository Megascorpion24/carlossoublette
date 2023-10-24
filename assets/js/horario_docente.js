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
        
        if (validarenvio()) {
            enviaAjax($("#f"));
            $('#addEmployeeModal').modal('hide');
         
            $('#f').trigger('reset');
        }
        

    });

    $("#registrar2").on("click", function() {
        
          
            enviaAjax($("#f2"));
       
            $('#editEmployeeModal').modal('hide');
            
       
   

    });
    
    


//<!---------------------------------------------------------------------------------------------------------------------------->









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
        
    
if (valclase($('#clase').val(),$("#sclase")) == 0) {
    mensaje("<p >Debe de seleccionar una materia</p>");
    return false;
}else if (valprof($('#cedula_profesor').val(),$("#scedula_profesor")) == 0) {
    mensaje("<p>Debe de seleccionar una materia</p>");
    return false;
}else if (valseccion($('#ano').val(),$("#sano")) == 0) {
    mensaje("<p>Debe de seleccionar una materia</p>");
    return false;
}else if (valdia($('#dia').val(),$("#sdia")) == 0) {
    mensaje("<p>Debe de seleccionar un dia</p>");
    return false;
}else if (valhora($('#clase_inicia').val(),$("#sclase_inicia")) == 0) {
    mensaje("<p>Debe de seleccionar un dia</p>");
    return false;
}else if (valhora($('#clase_termina').val(),$("#sclase_termina")) == 0) {
    mensaje("<p>Debe de seleccionar un dia</p>");
    return false;
}else if (valrango($('#inicio').val(),$("#sinicio")) == 0) {
    mensaje("<p>Debe de seleccionar un dia</p>");
    return false;
}else if (valrango($('#fin').val(),$("#sfin")) == 0) {
    mensaje("<p>Debe de seleccionar un dia</p>");
    return false;
}

    
    return true;
}

function validarenvio2() {
        
    if (valdia($('#dia1').val(),$("#sdia1")) == 0) {
        mensaje("<p>Debe de seleccionar un dia</p>");
        return false;
    }else if (valhora($('#clase_inicia1').val(),$("#sclase_inicia1")) == 0) {
        mensaje("<p>Debe de seleccionar un dia</p>");
        return false;
    }else if (valhora($('#clase_termina1').val(),$("#sclase_termina1")) == 0) {
        mensaje("<p>Debe de seleccionar un dia</p>");
        return false;
    }else if (valrango($('#inicio1').val(),$("#sinicio1")) == 0) {
        mensaje("<p>Debe de seleccionar un dia</p>");
        return false;
    }else if (valrango($('#fin1').val(),$("#sfin1")) == 0) {
        mensaje("<p>Debe de seleccionar un dia</p>");
        return false;
    }
    
        
        return true;
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
function valclase(clase,sclase) {
    

    if (clase != 'seleccionar') {
        
        return true;
    } else {
        sclase.text("seleccione una materia")
        setTimeout(function() {
            sclase.fadeOut();
        }, 3000);
        return false;
    }



}
function valseccion(ano,sano) {
    

    if (ano != 'seleccionar') {
        
        return true;
    } else {
        sano.text("seleccione una seccion")
        setTimeout(function() {
            sano.fadeOut();
        }, 3000);
        return false;
    }



}


function valdia(dia,sdia) {
    

    if (dia != 0) {
        
        return true;
    } else {
        sdia.text("seleccione un dia")
        setTimeout(function() {
            sdia.fadeOut();
        }, 3000);
        return false;
    }



}
function valhora(clase_inicia,sclase_inicia) {
    

    if (clase_inicia != 0) {
        
        return true;
    } else {
        sclase_inicia.text("seleccione una hora")
        setTimeout(function() {
            sclase_inicia.fadeOut();
        }, 3000);
        return false;
    }



}
function valrango(inicia,sinicia) {
    

    if (inicia != 0) {
        
        return true;
    } else {
        sinicia.text("seleccione una fecha")
        setTimeout(function() {
            sinicia.fadeOut();
        }, 3000);
        return false;
    }



}



//<!---------------------------------------------------------------------------------------------------------------------------->




   
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    