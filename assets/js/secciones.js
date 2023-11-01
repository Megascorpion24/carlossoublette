$(document).ready(function() {

 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 $("#tablas").DataTable({
    
    responsive: true,   

  
    lengthMenu: [3, 5, 10, 15, 20, 100, 200, 500],
    columnDefs: [
      { className: 'centered', targets: [0, 1, 2, 3, 4, 5] },
      { orderable: false, targets: [2] },
      { searchable: false, targets: [1] },
      { width: '20%', targets: [1] },   
      
    ],

    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0
      },
      {
        responsivePriority: 2,
        targets: -1
      }
    ],
    pageLength: 5,
    destroy: true,
    language: {
    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
      processing: 'Procesando...',
      lengthMenu: 'Mostrar _MENU_ registros',
      zeroRecords: 'No se encontraron resultados',
      emptyTable: 'Ningún dato disponible en esta tabla',
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: '(filtrado de un total de _MAX_ registros)',
      search: 'Buscar:',
      infoThousands: ',',
      loadingRecords: 'Cargando...',
      paginate: {
        first: 'Primero',
        last: 'Último',
        next: 'Sig',
        previous: 'Ant',
      },
      aria: {
        sortAscending: ': Activar para ordenar la columna de manera ascendente',
        sortDescending: ': Activar para ordenar la columna de manera descendente',
      },
    }
    
    
  });


  $(".dataTables_filter input")
    .attr("placeholder", "Buscar...")


  $('[data-toggle="tooltip"]').tooltip();

  window.addEventListener('load', async () => {
    await initDataTable();
  });



    console.log(location.href);
    

    $('#ano').select2({
    dropdownParent: $('#addEmployeeModal')
  });
    $('#secciones').select2({
    dropdownParent: $('#addEmployeeModal')
  });
    $('#cedula_profesor').select2({
    dropdownParent: $('#addEmployeeModal')
  });
    $('#ano_academico').select2({
    dropdownParent: $('#addEmployeeModal')
  });



    $("#registrar").on("click", function() {
        if (validarenvio()) {
          
            enviaAjax($("#f"));
            $('#addEmployeeModal').modal('hide');
            $('#f').trigger('reset');

       }

    });
    

    /*$("#registrars").on("click", function() {
        if (validarenvio2()) {
          
            enviaAjax($("#fr"));
            $('#addEmployeeModalS').modal('hide');
            $('#fr').trigger('reset');

       }

    });

    $("#registrara").on("click", function() {
        if (validarenvio3()) {
          
            enviaAjax($("#fa"));
            $('#addEmployeeModalA').modal('hide');
            $('#fa').trigger('reset');

       }

    });*/




    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
          
            enviaAjax($("#f2"));
            $('#editEmployeeModal').modal('hide');
            $('#f2').trigger('reset');

       }
   

    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->



/*////////////////////////////////////////// validaciones para registrar ///////////////////////////////////////*/

$("#secciones").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\s]$/, e);
});

$("#secciones").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\s]{1,20}$/,
        $(this), $("#ssecciones"), "seleccione una sección");
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
    validarkeyup(/^[0-9\s]{1,20}$/,
        $(this), $("#sano"), "Selecione un año");
});

$("#ano_academico").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\s]$/, e);
});

$("#ano_academico").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\s]{8,20}$/,
        $(this), $("#sano_academico"), "Selecione un año academico");
});


$("#cantidad").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);

});

$("#cantidad").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
         $(this), $("#scantidad"), "El formato puede ser numeros del 0 al 9");
});
    
/*////////////////////////////////////////////////// aqui termina registrar //////////////////////////////////////////////////*/










//<!---------------------------------------------------------------------------------------------------------------------------->




/*validaciones para editar*/



$("#cantidad1").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);

});

$("#cantidad1").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#scantidad1"), "El formato puede ser numeros del 0-9");
});

/*aqui termina editar*/    
});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id1").val($(this).find("th:eq(0)").text());
                $("#cantidad1").val($(this).find("th:eq(3)").text());
               
                

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
        if (valor=='#secciones') {
            $('#secciones').prepend($(valor).val());
        }else{
            $('#secciones').append($(valor).val()); 
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

     function añadir4(valor){
        if (valor=='#ano_academico') {
            $('#ano_academico').prepend($(valor).val());
        }else{
            $('#ano_academico').append($(valor).val()); 
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

if (valseccion($('#seccion').val(),$("#sseccion")) == 0) {
    mensaje("<p >Debe de seleccionar una seccion</p>");
    return false;
}else if (valprof($('#cedula_profesor').val(),$("#scedula_profesor")) == 0) {
    mensaje("<p>Debe de seleccionar un profesor</p>");
    return false;
}else if (valano($('#ano').val(),$("#sano")) == 0) {
    mensaje("<p>Debe de seleccionar un año</p>");
    return false;
}else if (valano_aca($('#ano_academico').val(),$("#sano_academico")) == 0) {
    mensaje("<p>Debe de seleccionar un año</p>");
    return false;   
}else if (validarkeyup(/^[0-9]{1,5}$/,
    $("#cantidad"), $("#scantidad"), "El formato puede ser numeros del 0 al 9") == 0) {
    mensaje ("<p>El formato puede ser numeros del 0-9</p>");
    return false;
}

    return true;

}

    /*function validarenvio2() {

        if (validarkeyup(/^[Aa-Zz]{1,5}$/,
        $("#seccionesr"), $("#sseccionesr"), "El formato puede ser letras de la A a la Z") == 0) {
            mensaje("<p>El formato puede ser letras de la A a la Z</p>");
            return false;
        }
        return true;
    }*/

    /*function validarenvio3() {

        if (validarkeyup(/^[0-9]{1,2}$/,
        $("#anoa"), $("#sanoa"), "El formato puede ser 0-9") == 0) {
            mensaje("<p>El formato puede ser 0-9</p>");
            return false;

        }else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#turnoa"), $("#sturnoa"), "El formato puede ser A-Z a-z") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z</p>");
            return false;
        }
        return true;
    }*/


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
function valseccion(seccion,sseccion) {
    

    if (seccion != 'seleccionar') {
        
        return true;
    } else {
        sseccion.text("seleccione una seccion")
        setTimeout(function() {
            sseccion.fadeOut();
        }, 3000);
        return false;
    }



}
function valano(ano,sano) {
    

    if (ano != 'seleccionar') {
        
        return true;
    } else {
        sano.text("seleccione un año")
        setTimeout(function() {
            sano.fadeOut();
        }, 3000);
        return false;
    }



}

function valano_aca(ano_academico,sano_academico) {
    

    if (ano_academico != 'seleccionar') {
        
        return true;
    } else {
        sano_academico.text("seleccione un año academico")
        setTimeout(function() {
            sano_academico.fadeOut();
        }, 3000);
        return false;
    }



}




//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {

        if (validarkeyup(/^[0-9]{1,5}$/,
        $("#cantidad1"), $("#scantidad1"), "El formato puede ser numeros del 0 al 9") == 0) {
            mensaje("<p>El formato puede ser numeros del 0 al 9</p>");
            return false;
        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


    
const input1 = document.getElementById("cantidad");
const input2 = document.getElementById("cantidad1");


// Función para limitar la longitud del valor
const limitarLongitud = (input, maxLength) => {
  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
  }
};

input1.addEventListener("input", () => {
  const maxLength = 2; // Cambia este valor al límite máximo deseado
  limitarLongitud(input1, maxLength);
});
  
input2.addEventListener("input", () => {
    const maxLength = 2; // Cambia este valor al límite máximo deseado
    limitarLongitud(input2, maxLength);
});


    