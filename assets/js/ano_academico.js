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


    /*function delete_info(estado) {
    var mensaje = '';

    if (estado == 0) {
        mensaje = 'No se puede eliminar/modificar el año académico porque está DESHABILITADO';
    }

     

alert(mensaje);

}*/




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




    // Esta función se encarga de cargar los datos en el tbody
function cargarDatosEnTabla() {
    // ... tu lógica actual para cargar los datos en el tbody ...

    // Una vez que los datos se han cargado en el tbody, inicializa DataTables
    $('.tabla_estudiantes').DataTable({
        // Personaliza el encabezado del modal con el campo de búsqueda
        initComplete: function () {
            this.api().search('').draw();
            var searchField = $('#tabla_estudiantes_filter').find('input');
            searchField.attr('placeholder', 'Buscar estudiantes');
            searchField.addClass('form-control');
            searchField.appendTo($('#info .tabla_estudiantes'));
        }
    });
}

var ObtenerID;

function handleRowClick(id,ano_academico, event) {
    console.log('click' + ano_academico);
    if ($(event.target).closest('#option').length === 0) {
        ObtenerID = id;
        // console.log(ObtenerID);
        // $('#s_M').text(s);
        // $('#a_M').text(a);

        $.ajax({
            url: 'controlador/ajax/eventos_consulta.php',
            type: 'POST',
            data: { ajaxPet: true, id: ObtenerID, action: 'getData' },
            success: function (respuesta) {
                var studData = JSON.parse(respuesta);
                // console.log(studData);

                  // Elimina la instancia actual de DataTables
                  $('.tabla_estudiantes').DataTable().destroy();
                // Vacía el contenido anterior del modal antes de agregar los nuevos datos
                $('#info #tabla_estudiantes').empty();

                // Itera sobre cada estudiante en studData
                for (var i = 0; i < studData.length; i++) {
                    var eventos = studData[i];

                    // Crea un nuevo modal para cada estudiante
                    var modalContent = `
                    <tr>
                        <td class="id">${eventos.id}</td>
                        <td class="fecha_ini">${eventos.fecha_ini}</td>
                        <td class="fecha_cierr">${eventos.fecha_cierr}</td>
                        <td class="evento" style="font-size: 16px;">${eventos.evento}</td>
                    </tr>    
                    `;

                    // Agrega el contenido del modal al elemento .modal-content
                    $('#info #tabla_estudiantes').append(modalContent);
                }

              
                 // Muestra el modal después de agregar todos los estudiantes
                 $('#info').modal('show');

                // Llama a la función para inicializar DataTables después de cargar los datos
                cargarDatosEnTabla();
                // Inicia el filtrado y la paginación
                // iniciarFiltradoYPaginacion();
            },

            error: function (request, status, err) {
                if (status == "timeout") {
                    mensaje("Servidor ocupado, intente de nuevo");
                } else {
                    mensaje("ERROR: <br/>" + request + status + err);
                }
            },
            complete: function () {

            }
        });
    } 
}





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

    
    
    