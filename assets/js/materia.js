 var FilterYear;
 function CargarDataTable(){
       /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

       var pageLengthSetting = localStorage.getItem('pageLength2') || 15;

var table = $("#tablas").DataTable({
    
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
    pageLength: pageLengthSetting,
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
 
  //--------------------
  
  $('select[name="tablas_length"]').change(function() {
    var value = $(this).val();
    localStorage.setItem('pageLength2', value); // Guarda en localStorage
    table.page.len(value).draw(); // Actualiza el pageLength y redibuja la tabla
});

  //--------------------
 
  
$('.btn-light').on('click', function () {
    // Limpiar la clase 'border-secondary' de todos los botones
    $('.btn-light').removeClass('border-secondary');
    // Agregar la clase 'border-secondary' al botón clicado
    $(this).addClass('border-secondary');
});
// --------------
$('[id^=filtro-]').on('click', function() {
    FilterYear = $(this).data('value');
    table.columns(2).search(FilterYear).draw();
    console.log(FilterYear);

});

// Evento de clic para el botón de limpiar filtro
$('#limpiar-filtro').on('click', function() {
table.columns(2).search('').draw();

}); 
if (FilterYear !== '') {
    table.columns(2).search(FilterYear).draw();
} 



 }

$(document).ready(function() {

 
     CargarDataTable();
    

    $("#registrar").on("click", function() {
        
 
        if (validarenvio()) { 
            // console.log("se valido todo");
             console.log($('#f').serializeArray());
              enviaAjax($("#f")); 

              $('#addEmployeeModal').modal('hide');
              $('#f').trigger('reset');
            $("#docentes").val(null).trigger("change");
                nombre_valor="";
                seleccionado="";
            }
    }); 
 
    //editar
    $("#editar").on("click", function() {

        if (validarEdit()) { 
            // console.log("se valido edit");
        console.log($('#f2').serializeArray());

              enviaAjax($("#f2"));
              $('#editEmployeeModal').modal('hide');
            $('#f2').trigger('reset');
            $("#docentes1").val(null).trigger("change");
            
            nombre_valor2="";
            seleccionado2="";
            $('#existe_msj2').text('');
            $('#existe_msj3').text('');

              }
    });
    

 
$(".js-example-placeholder-multiple").select2({
    placeholder: "Select a state",
    maximumSelectionLength: 6 // Limita a un máximo de 6 selecciones
  });


  materia();//llenar
});//end ready

// ----------------------Autocompletar Materia--------------
var materias = [];

function materia(){
    
  $.ajax({
    url: 'controlador/ajax/materia_consulta.php', // URL de tu script PHP
    type: "POST", // Usar método POST
    dataType: "json",
    data: {
      term: 1
    },
    success: function(data) {
      // Recorrer el arreglo de resultados
      for (var i = 0; i < data.length; i++) {
        // Agregar el nombre de la materia al arreglo
        materias.push(data[i].nombre);
        // console.log(data[i].nombre);
    
      }
      CargaAutoComplete();
    }
  });
}

var nombre_valor="";

function CargaAutoComplete(){
    
$("#nombre" ).autocomplete({
    source: materias,
    select: function(event, ui) {
        nombre_valor = ui.item.value; // ui.item.value contiene el valor seleccionado
        // nombre_valor = this.value; // 
        inputName();
    }
  });


}

// ------------------------- 

//<!---------------------------------------------------------------------------------------------------------------------------->

var dc1;
var dc2;
var dc3;
var dc4;
var dc5;
var dc6;

let docentes_e= $("#docentes1");
var nombres_m;
//donde se aplicara el option
var id_Año = $("#año1");
//se guardara el año actual y se usara para el Option en Modificar
var año2;//elimina espacios en blanco
var añOrginal;
var año_id;


function modificar(id){
    $("#tabla tr").each(function(){
    
        if(id == $(this).find("th:eq(0)").text()){
            $("#id1").val($(this).find("th:eq(0)").text());
            $("#nombre1").val($(this).find("th:eq(1)").text().trim());

    
            dc1 = $(this).find("th:eq(3)").attr("value");
            dc2 = $(this).find("th:eq(4)").attr("value");
            dc3 = $(this).find("th:eq(5)").attr("value");
            dc4 = $(this).find("th:eq(6)").attr("value");
            dc5 = $(this).find("th:eq(7)").attr("value");
            dc6 = $(this).find("th:eq(8)").attr("value");


            var año=$(this).find("th:eq(2)").text();//optengo 1,2,3..
            año2= año.replace(/\s/g, "");//elimina espacios en blanco
            añOrginal=año2
            año_id=$(this).find("th:eq(2)").attr("value");


            nombres_m=$(this).find("th:eq(1)").text().trim();//
            // console.log(nombres_m);
            // console.log(añOrginal);
          
           
            MostrarSelect(año2);
            MostrarSelectDocentes(dc1, dc2, dc3, dc4, dc5, dc6);

        }
    });

}

    //-------Año Agregar "Select" al Modificar-------------           

function MostrarSelect(value_año){
    
    
      // Iterar a través de las opciones
      id_Año.find("option").each(function(index, option2) {
        // Obtener el valor y el texto de la opción usando $(option)
        var texto2 = $(option2).text();
        if (value_año==texto2){
            // console.log("añade atributo");
        $(option2).attr("selected",true);
             
        }

      });
    // ---------------------------------------------------------------
    
    }

    
    


 // Función para mostrar la selección de docentes
 function MostrarSelectDocentes(value_dc1, value_dc2, value_dc3,  value_dc4,  value_dc5,  value_dc6) {
    const selectedValues = [value_dc1, value_dc2, value_dc3,  value_dc4,  value_dc5,  value_dc6];
    
    // Recorre los elementos <option> del campo de selección de docentes
    docentes_e.find("option").each(function (index, option) {
        const optionText = $(option).val();

        if (selectedValues.includes(optionText)) {
            $(option).prop("selected", true);
        }
    });

    docentes_e.trigger("change");
 }


 // Cuando el modal se cierra, elimina la selección y se vacía la variable
$("#editEmployeeModal").on("hidden.bs.modal", function () {
    // Itera a través de las opciones del <select> de docentes
    docentes_e.find("option").each(function(index, option) {
        // Comprueba si la opción tiene el atributo "selected"
        if (option.hasAttribute("selected")) {
            // Elimina el atributo "selected"
            $(option).removeAttr("selected");
        }
    });

    // También puedes hacer lo mismo con el <select> de años si es necesario
    id_Año.find("option").each(function(index, option) {
        if (option.hasAttribute("selected")) {
            $(option).removeAttr("selected");
        }
    });

    // Elimina la selección en el <select> de años
    id_Año.val("");

    // Elimina la selección en los elementos <select> de docentes
    docentes_e.val("");

    //Vacia todo
    $('#f2').trigger('reset');
            $("#docentes1").val(null).trigger("change");
            
            nombre_valor2="";
            seleccionado2="";
            $('#existe_msj2').text('');
            $('#existe_msj3').text('');
});


//<!---------------------------------------------------------------------------------------------------------------------------->
function eliminar(id) {
    $("#id2").val(id);
    $("#borrar").on("click", () => {
            
         enviaAjax($("#f3"));
        });
}



// ----------------------------------------
    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
          
                },
                
                success: (respuesta) => {
                    // alert(respuesta); 
                    LlamadaAlert(respuesta);

        // --------------------------------------------

                    materias = [];//vaciar
                    materia();//llenar

                    //$("#id").val(respuesta);
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
                 $('#tablas').DataTable().destroy();
                 $("#tabla").html(respuesta);
                CargarDataTable();

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



// ------------CONSULTA SI EXISTE AL REGISTRAR--------------
function inputName(){
    if (nombre_valor != "" && seleccionado != "") {
        consulta_existe(nombre_valor, seleccionado);
        }
}

    $("#nombre").on("input", function() {
           nombre_valor = $(this).val();
           console.log(nombre_valor);
        
        inputName();   
    });

    var seleccionado="";

    $('#año').change(function() {
        seleccionado = $('#form_radio input:radio:checked').val();
        console.log(seleccionado);

        if (nombre_valor != "" && seleccionado != "") {
          consulta_existe(nombre_valor, seleccionado);
          }
         
    });

    var existe;
    function consulta_existe(nombre_valor, seleccionado){
         $.ajax({
        url: 'controlador/ajax/materia_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 nombre: nombre_valor,
                 ano: seleccionado, 
                 action: 'getData'},
        success: function(respuesta) {
            console.log(respuesta);

                if (respuesta == 1) {
                $('#existe_msj').text('Ya Existe la Materia con ese Año');
                    existe=1;
                }
                else{
                $('#existe_msj').text('');
                    existe=0;
                }

            }
    });
    }

   
// ----------------------------------

 
// ------------CONSULTA SI EXISTE AL EDITAR--------------

var nombre_valor2="";
var seleccionado2="";
var nombre1=$("#nombre1");
// ----------
nombre1.on("input", function() {
      var nombre_valor2 = $(this).val();
       console.log(nombre_valor2.length);

       if (nombre_valor2 != "" && seleccionado2 != "") {
        consulta_existe2(nombre_valor2, seleccionado2);
        }
        else{
            consulta_existe2(nombre_valor2, año_id);
            }
});
// ----------
var selected;
id_Año.on('change', function(){
    
    seleccionado2 = id_Año.val();
    selected = id_Año.find(":selected").text();

    console.log(seleccionado2);
    console.log(selected);

    if (nombre_valor2 != "" && seleccionado2 != "") {
      consulta_existe2(nombre_valor2, seleccionado2);
      }
      else{
        consulta_existe2(nombres_m, seleccionado2);
        }

});



var existe2;
function consulta_existe2(nombre_valor2, seleccionado2){
    
     $.ajax({
    url: 'controlador/ajax/materia_consulta.php',
    type: 'POST',
    data: {ajaxPet: true,
             nombre: nombre_valor2,
             ano: seleccionado2, 
             action: 'getData'},
    success: function(respuesta) {
        console.log(respuesta);

    
        if (respuesta === "1") {
            
            // console.log("Los datos son los registrados");
            // console.log("Valor de id_Año: " + selected);
            // console.log("Valor de añOriginal: " + añOrginal);
            // console.log("Valor de nombre1: " + nombre1.val().toUpperCase());
            // console.log("Valor de nombres_m: " + nombres_m);

            if (selected ===  añOrginal &&  nombre1.val().toUpperCase() === nombres_m) {
            $('#existe_msj2').text('');
                $('#existe_msj3').text('La Materia y el Año son los registrados');
                existe2 = 0;
            } else {
            $('#existe_msj3').text('');
                $('#existe_msj2').text('Ya Existe la Materia con ese Año');
                existe2 = 1;
            }
        } else {
            $('#existe_msj2').text('');
            $('#existe_msj3').text('');
            existe2 = 0;
        }
        

        }
});
}


// ----------------------------------



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
    const key = e.keyCode;
    const tecla = String.fromCharCode(key);
    const isValid = er.test(tecla);
  
    if (!isValid) {
      e.preventDefault();
    }
  }
  

$("#nombre").on("keypress", function(e) {
    // const patron = /^[^\s]?[a-zA-Záéíóúñ]+$/;
    const patron =/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]$/;
    
    validarkeypress(patron, e);
    // validarkeypress(/^\S(A-Za-z*\S)?$/i, e);
});

$("#nombre").on("keyup", function() {
    validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/,
        $(this), $("#nombre1_v"), "El formato puede ser A-Z a-z 5-30");
});

$("#nombre1").on("keypress", function(e) {
    // const patron = /^[^\s]?[a-zA-Záéíóúñ]+$/;
    const patron =/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]$/;
    
    validarkeypress(patron, e);
    // validarkeypress(/^\S(A-Za-z*\S)?$/i, e);
});

$("#nombre1").on("keyup", function() {
    validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/,
        $(this), $("#nombre1_v"), "El formato puede ser A-Z a-z 5-30");
});

 

//<!------------------------------------------------------------------------------------------------->


    function validarenvio() {
      
        if (validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/,
        $("#nombre"), $("#nombre_v"), "El formato puede ser A-Z a-z 5-30") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 5-30</p>");
            return false;
        }
   
            var selected = '';    
            $('#form_radio input:radio:checked').each(function(){
                    selected = $(this).val();
                
             }); 
            // console.log(selected);

            if (selected != '') { 
                // console.log('Has seleccionado: '+selected);
              }
            else{
                $('#año_msj').text("Selecciona un Año..");
                // Usar setTimeout para ocultar el mensaje después de 3 segundos
                setTimeout(function() {
                    $('#año_msj').text(""); // Ocultar el mensaje
                }, 2000); 

                return false;
            }

    var selectedValues = $("#docentes").val();

    if (!selectedValues || selectedValues.length < 1) {
      // Si no se ha seleccionado al menos un valor, muestra un mensaje de error
      $('#docentes_msj').text("Seleccione al menos 1 docente..");
      setTimeout(function() {
      $('#docentes_msj').text("");
    }, 2000);   

      return false;
    }

    if (existe==1) {
        return false;
    }

        return true;
    }


//<!---------------------------------------------------------------------------------------------------------------------------->
//Iniciando con valores registrador

// var año3= año2;

    //guarda cambios
    $('#año1').change(function(){
         año2 = $(this).val();
    });

    function validarEdit() {

        if (validarkeyup(/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,30}$/,
        $("#nombre1"), $("#nombre1_v"), "El formato puede ser A-Z a-z 5-30") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-30</p>");
            return false;    
        } 

        if (año2 != '') { 
            console.log(año2); 
         }
        else{
            //vacio
            return false;
        }

        var selectedValues = $("#docentes1").val();

    if (!selectedValues || selectedValues.length < 1) {
      // Si no se ha seleccionado al menos un valor, muestra un mensaje de error
      $('#docentes1_msj').text("Seleccione al menos 1 docente..");
      setTimeout(function() {
      $('#docentes1_msj').text("");
    }, 2000);  

      return false;
    }

    if (existe2==1) {
        return false;
    }

        return true;
    }
// <!---------------------------------------------------------------------------------------------------------------------------->
