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
 
      
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//<!---------------------------------------------------------------------------------------------------------------------------->


$('#mibuscador').select2({
    dropdownParent: $('#addpago')
});

$('#mibuscador2').select2({
    dropdownParent: $('#addpagorepre')
});







    $("#registrar").on("click", function() {
        if (validarenvio()) {
          
            enviaAjax($("#f"));
            $('#addpago').modal('hide');
            $('#f').trigger('reset');          
           
       }
        

    });

    $("#registrarr").on("click", function() {
        if (validarenvio2()) {
          
            enviaAjax($("#fr"));
            $('#addpagorepre').modal('hide');
            $('#fr').trigger('reset');
            
       }
        

    });


    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
          
            enviaAjax($("#f2"));
            $('#editpago').modal('hide');
       }
   

    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->
/*validaciones para registrar*/




    $("#id_deudas").on("keypress", function(e) {
        validarkeypress(/^[0-9\b]*$/, e);
    });

    $("#id_deudas").on("keyup", function() {
        validarkeyup(/^[0-9]{1,5}$/,
            $(this), $("#sid_deudas"), "La ID debe ser en el siguiente formato 0000");
    });

    $("#identificador").on("keypress", function(e) {
        validarkeypress(/^[0-9-\u002E\b]*$/, e);
    });

    $("#identificador").on("keyup", function() {
        validarkeyup(/^[0-9-]{4,11}$/,
            $(this), $("#sidentificador"), "El formato puede ser 0000");
    });

    $("#concepto").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);
    });

    $("#concepto").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,20}$/,
            $(this), $("#sconcepto"), "El formato puede ser 0000");
    });

    $("#forma").on("keypress", function(e) {
        validarkeypress(/^[-A-Z a-z\s]$/, e);
    });

    $("#forma").on("keyup", function() {
        validarkeyup(/^[-A-Za-z\s]{4,25}$/,
            $(this), $("#sforma"), "");
    });

    $("#estado").on("keypress", function(e) {
        validarkeypress(/^[A-Z a-z\s]$/, e);
    });

    $("#estado").on("keyup", function() {
        validarkeyup(/^[A-Za-z\s]{4,10}$/,
            $(this), $("#sestado"), "El formato puede ser valido");
    });
    $("#monto").on("keypress", function(e) {
        validarkeypress(/^[0-9-]$/, e);
    });

    $("#monto").on("keyup", function() {
        validarkeyup(/^[0-9-]{2,11}$/,
            $(this), $("#smonto"), "El formato puede ser valido");
    });
    $("#meses").on("keypress", function(e) {
        validarkeypress(/^[1-9]$/, e);
    });

    $("#meses").on("keyup", function() {
        validarkeyup(/^[1-9]{1,2}$/,
            $(this), $("#smeses"), "El formato puede ser valido");
    });




    
/*aqui termina registrar*/
//<!---------------------------------------------------------------------------------------------------------------------------->










//<!---------------------------------------------------------------------------------------------------------------------------->
/*validaciones para registrar*/


$("#id_deudasr").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);
});

$("#id_deudasr").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#sid_deudasr"), "La ID debe ser en el siguiente formato 0000");
});

$("#identificadorr").on("keypress", function(e) {
    validarkeypress(/^[0-9\u002E\b]*$/, e);
});

$("#identificadorr").on("keyup", function() {
    validarkeyup(/^[0-9]{4,11}$/,
        $(this), $("#sidentificadorr"), "El formato puede ser 0000");
});
$("#conceptor").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);
});

$("#conceptor").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#sconceptor"), "El formato puede ser 0000");
});

$("#formar").on("keypress", function(e) {
    validarkeypress(/^[-A-Za-z\s]$/, e);
});

$("#formar").on("keyup", function() {
    validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $(this), $("#sformar"), "");
});

$("#estador").on("keypress", function(e) {
    validarkeypress(/^[A-Z a-z\s]$/, e);
});

$("#estador").on("keyup", function() {
    validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $(this), $("#sestador"), "El formato puede ser valido");
});

$("#montor").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);
});

$("#montor").on("keyup", function() {
    validarkeyup(/^[0-9]{2,11}$/,
        $(this), $("#smontor"), "El formato puede ser valido");
});
$("#mesesr").on("keypress", function(e) {
    validarkeypress(/^[1-9]$/, e);
});

$("#mesesr").on("keyup", function() {
    validarkeyup(/^[1-9]{1,2}$/,
        $(this), $("#smesesr"), "El formato puede ser valido");
});



/*aqui termina registrar*/
//<!---------------------------------------------------------------------------------------------------------------------------->












//<!---------------------------------------------------------------------------------------------------------------------------->


$("#id_deudasM").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);
});

$("#id_deudasM").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#sid_deudasM"), "La ID debe ser en el siguiente formato 0000");
});

$("#identificadorM").on("keypress", function(e) {
    validarkeypress(/^[0-9-]*$/, e);
});

$("#identificadorM").on("keyup", function() {
    validarkeyup(/^[0-9-]{4,11}$/,
        $(this), $("#sidentificadorM"), "El formato puede ser 0000.00");
});
$("#conceptoM").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);
});

$("#conceptoM").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#sconceptoM"), "El formato puede ser 0000");
});

$("#formaM").on("keypress", function(e) {
    validarkeypress(/^[-A-Za-z\s]$/, e);
});

$("#formaM").on("keyup", function() {
    validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $(this), $("#sformaM"), "");
});

$("#estadoM").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z\s]$/, e);
});

$("#estadoM").on("keyup", function() {
    validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $(this), $("#sestadoM"), "El formato puede ser valido");
});
$("#montosM").on("keypress", function(e) {
    validarkeypress(/^[0-9-]$/, e);
});

$("#montoM").on("keyup", function() {
    validarkeyup(/^[0-9-]{2,11}$/,
        $(this), $("#smontoM"), "El formato puede ser valido");
});

$("#mesesM").on("keypress", function(e) {
    validarkeypress(/^[1-9]$/, e);
});

$("#mesesM").on("keyup", function() {
    validarkeyup(/^[1-9]{1,2}$/,
        $(this), $("#smesesM"), "El formato puede ser valido");
});


});
//<!---------------------------------------------------------------------------------------------------------------------------->









//<!---------------------------------------------------------------------------------------------------------------------------->
    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#idM").val($(this).find("th:eq(0)").text());
                $("#id_deudasM").val($(this).find("th:eq(1)").text());
                $("#identificadorM").val($(this).find("th:eq(2)").text());
                $("#conceptoM").val($(this).find("th:eq(3)").text());               
                $("#formaM").val($(this).find("th:eq(4)").text());
                $("#fechaM").val($(this).find("th:eq(5)").text());               
                $("#montoM").val($(this).find("th:eq(6)").text());
                $("#mesesM").val($(this).find("th:eq(7)").text());
                $("#cedulaM").val($(this).find("th:eq(8)").text());
                $("#nombreM").val($(this).find("th:eq(9)").text());         
                $("#estadoM").val($(this).find("th:eq(10)").text());
            

            }
        });
    
    }
//<!---------------------------------------------------------------------------------------------------------------------------->










//<!---------------------------------------------------------------------------------------------------------------------------->
function eliminar(id){
    $("#idE").val(id);
    $("#borrar").on("click", function(){
       
    enviaAjax($("#f3"));
    $('#deletepago').modal('hide');
    });

}

function eliminarr(id){
    $("#idE2").val(id);
    $("#borrar2").on("click", function(){
       
    enviaAjax($("#f5"));
    $('#deletepago2').modal('hide');
    });

}
//<!---------------------------------------------------------------------------------------------------------------------------->






function añadir2() {
    id = $("#mibuscador").val();
    $("#select tr").each(function () {
        if (id == $(this).find("th:eq(0)").text()) {
            $("#id_deudas").val($(this).find("th:eq(0)").text());
            $("#concepto").val($(this).find("th:eq(2)").text());
            $("#fecha").val($(this).find("th:eq(3)").text());

            var fechaActual = new Date();
            var fechaDeuda = new Date($(this).find("th:eq(3)").text());
            var diferencia = fechaActual.getTime() - fechaDeuda.getTime();
            var mes = Math.floor(diferencia / (30 * 24 * 60 * 60 * 1000)); // 30 días en milisegundos
            $("#total_deuda").val(mes);

            if ($(this).find("th:eq(2)").text() == "mensualidad") {
                $("#ocult").removeClass("ocultar");
                $("#ocult2").removeClass("ocultar");
            } else {
                $("#ocult").addClass("ocultar");
                $("#ocult2").addClass("ocultar");
            }

        }
    });
}

  function añadirr() {
    id = $("#mibuscador2").val();
    $("#selectr tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
            $("#id_deudasr").val($(this).find("th:eq(0)").text());
            $("#conceptor").val($(this).find("th:eq(2)").text());
            $("#fechar").val($(this).find("th:eq(3)").text());

           
            var fechaActual = new Date();
            var fechaDeuda = new Date($(this).find("th:eq(3)").text());
            var diferencia = fechaActual.getTime() - fechaDeuda.getTime();
            var mes = Math.floor(diferencia / (30 * 24 * 60 * 60 * 1000)); // 30 días en milisegundos
            $("#total_deudar").val(mes);

            if ($(this).find("th:eq(2)").text() == "mensualidad") {
                $("#ocult3").removeClass("ocultar");
                $("#ocult4").removeClass("ocultar");
            } else {
                $("#ocult3").addClass("ocultar");
                $("#ocult4").addClass("ocultar");
            }

        }
    });
}





//<!---------------------------------------------------------------------------------------------------------------------------->














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
//<!---------------------------------------------------------------------------------------------------------------------------->
function validarkeypress(er, e) {
    key = e.keyCode;
    tecla = String.fromCharCode(key);
    a = er.test(tecla);
    if (!a) {
        e.preventDefault();
    }
}
//<!---------------------------------------------------------------------------------------------------------------------------->












//<!---------------------------------------------------------------------------------------------------------------------------->

    function validarenvio() {
        if (validarkeyup(/^[0-9]{1,5}$/,
        $("#id_deudas"), $("#sid_deudas"), "La ID debe ser en el siguiente formato 0000") == 0) {
            mensaje("La ID debe ser en el siguiente formato 0000");
            return false;
    
        } else if (validarkeyup(/^[0-9-]{2,11}$/,
        $("#monto"), $("#smonto"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        } else if (validarkeyup(/^[0-9-]{4,11}$/,
        $("#identificador"), $("#sidentificador"), "El formato puede ser 0000") == 0) {
            mensaje("El formato puede ser 0000");
            return false;

        }  else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#concepto"), $("#sconcepto"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $("#forma"), $("#sforma"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $("#estado"), $("#sestado"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        }  else if (validarkeyup(/^[1-9]{1,2}$/,
        $("#meses"), $("#smeses"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        } 
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->










//<!---------------------------------------------------------------------------------------------------------------------------->
    function validarenvio2() {
        if (validarkeyup(/^[0-9]{1,5}$/,
        $("#id_deudasr"), $("#sid_deudasr"), "La ID debe ser en el siguiente formato 0000") == 0) {
            mensaje("La ID debe ser en el siguiente formato 0000");
            return false;
    
        }  else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#conceptor"), $("#sconceptor"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $("#formar"), $("#sformar"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[0-9-]{2,11}$/,
        $("#montor"), $("#smontor"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;
            
        } else if (validarkeyup(/^[0-9-]{4,11}$/,
        $("#identificadorr"), $("#sidentificadorr"), "El formato puede ser 0000") == 0) {
            mensaje("El formato puede ser 0000");
            return false;

        } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $("#estador"), $("#sestador"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        }  else if (validarkeyup(/^[1-9]{1,2}$/,
        $("#mesesr"), $("#smesesr"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;
            
        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->








//<!---------------------------------------------------------------------------------------------------------------------------->
    function validarenvio1() {
        if (validarkeyup(/^[0-9]{1,5}$/,
        $("#id_deudasM"), $("#sid_deudasM"), "La ID debe ser en el siguiente formato 0000") == 0) {
            mensaje("La ID debe ser en el siguiente formato 0000");
            return false;
    
        } else if (validarkeyup(/^[0-9-]{2,11}$/,
        $("#montoM"), $("#smontoM"), "El formato puede ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[0-9-]{4,11}$/,
        $("#identificadorM"), $("#sidentificadorM"), "El formato puede ser 0000.00") == 0) {
            mensaje("El formato puede ser 0000");
            return false;

        }  else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#conceptoM"), $("#sconceptoM"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $("#formaM"), $("#sformaM"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $("#estadoM"), $("#sestadoM"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        }  else if (validarkeyup(/^[1-9]{1,2}$/,
        $("#mesesM"), $("#smesesM"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->




const input1 = document.getElementById("identificador");
const input2 = document.getElementById("monto");
const input3 = document.getElementById("meses");
const input4 = document.getElementById("identificadorr");
const input5 = document.getElementById("montor");
const input6 = document.getElementById("mesesr");
const input7 = document.getElementById("identificadorM");
const input8 = document.getElementById("montoM");
const input9 = document.getElementById("mesesM");

// Función para limitar la longitud del valor
const limitarLongitud = (input, maxLength) => {
  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
  }
};

input1.addEventListener("input", () => {
  const maxLength = 11; // Cambia este valor al límite máximo deseado
  limitarLongitud(input1, maxLength);
});
  
input2.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input2, maxLength);
});
input3.addEventListener("input", () => {
    const maxLength = 2; // Cambia este valor al límite máximo deseado
    limitarLongitud(input3, maxLength);
  });
    
input4.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input4, maxLength);
});

input5.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input5, maxLength);
  });

  input6.addEventListener("input", () => {
    const maxLength = 2; // Cambia este valor al límite máximo deseado
    limitarLongitud(input6, maxLength);
  });

  input7.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input7, maxLength);
  });

  input8.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input8, maxLength);
  });

  input9.addEventListener("input", () => {
    const maxLength = 2; // Cambia este valor al límite máximo deseado
    limitarLongitud(input9, maxLength);
  });








 




