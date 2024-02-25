// Variables Globales de Data Table

var table;//para toda funcionalidades

function CargarDataTable(){

    var pageLengthSetting = localStorage.getItem('pageLength') || 15;

     table = $("#tablas").DataTable({
    
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


    $('select[name="tablas_length"]').change(function() {
        var value = $(this).val();
        localStorage.setItem('pageLength', value); // Guarda en localStorage
        table.page.len(value).draw(); // Actualiza el pageLength y redibuja la tabla
    });

      //   ---------------------  
   Cargarfilter();
      //   ---------------------  


}
 
// -----------------------------------------------------------------
var filtros = {
    year: '',
    seccion: ''
};

function Cargarfilter(){
     
    var htmlOne = `
   
    <div  id='filter' class="btn-toolbar btn-filter" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="limpiar-filtro" class="btn btn-light border ">Todos</button>
            <button type="button" id="filtro-1" class="btn btn-light ${filtros.year == '1' ? 'border-secondary' : 'border'}" data-value="1">1</button>
            <button type="button" id="filtro-2" class="btn btn-light ${filtros.year == '2' ? 'border-secondary' : 'border'}" data-value="2">2</button>
            <button type="button" id="filtro-3" class="btn btn-light ${filtros.year == '3' ? 'border-secondary' : 'border'}" data-value="3">3</button>
            <button type="button" id="filtro-4" class="btn btn-light ${filtros.year == '4' ? 'border-secondary' : 'border'}" data-value="4">4</button>
            <button type="button" id="filtro-5" class="btn btn-light ${filtros.year == '5' ? 'border-secondary' : 'border'}" data-value="5">5</button>
        </div>
    </div>`;

const tablas_filter= document.getElementById('tablas_filter');
console.log(tablas_filter);

if (tablas_filter){
            tablas_filter.insertAdjacentHTML("afterbegin",htmlOne);
}


$('.btn-light').on('click', function () {
    // Limpiar la clase 'border-secondary' de todos los botones
    $('.btn-light').removeClass('border-secondary');
    // Agregar la clase 'border-secondary' al botón clicado
    $(this).addClass('border-secondary');
});
// --------------
$('[id^=filtro-]').on('click', function() {
    filtros.year = $(this).data('value');
    table.columns(2).search(filtros.year).draw();
    console.log(filtros.year);

});


// Evento de clic para el botón de limpiar filtro
$('#limpiar-filtro').on('click', function() {
    // Verificar si hay un filtro de año antes de aplicarlo
    table.columns(2).search('').draw();
    table.column(1).search(filtros.seccion).draw();
    filtros.year ='';
});



    // --------Secciones-----
   
var htmlToAdd = `

    <label for="secciones abc-filter" style="margin-left: 30px;">Filtrar:
    
        <select class="form-control" id="secciones-filter">
            
        </select>

    </label>
`;

// Obtener el elemento #tablas_length
var tablasLengthElement = document.getElementById('tablas_length');
// Verificar si el elemento existe antes de agregar el HTML
if (tablasLengthElement) {
// Agregar el HTML al final del contenido del elemento #tablas_length
tablasLengthElement.insertAdjacentHTML('beforeend', htmlToAdd);
}

// Evento de cambio para el select de secciones
$('#secciones-filter').on('change', function() {
    filtros.seccion = $(this).find("option:selected").text();
    console.log(filtros.seccion);
    filtros.seccion = (filtros.seccion == "todo") ? "" : filtros.seccion;
    table.column(1).search(filtros.seccion).draw();
    
});

//Carga valores de Filtro si no esta vacia la variables globales

// Si filtros.seccion no está vacío, aplicar el filtro
if (filtros.seccion !== '') {
    table.column(1).search(filtros.seccion).draw();
}

if (filtros.year !== '') {
    table.columns(2).search(filtros.year).draw();
} 


}


function CargarfilterSeccion(){
    // Seleccionar la opción correspondiente en el select
        $('#secciones-filter').find('option').each(function(index, option) {
            // console.log($(this).text + '->'+ filtros.seccion);
            var text = $(option).text();
    
            if (text === filtros.seccion) {
                $(this).prop('selected', true);
            }
        });
}



$(document).ready(function() {

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   CargarDataTable();
    
   PrimerValordeSeccion();

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $("#act_sec").on("click", function() { 
            if (validarenvio_Seccion()) { 
                console.log("se valido todo");
                  console.log($('#f6').serializeArray());
    
                  enviaAjax($("#f6")); 
                  $('#exampleModalCenter').modal('hide');
                  $('#f6').trigger('reset');
                }
        });  

    //   ----------------------
    $("#registrar").on("click", function() {
        // console.log($('#f')); 
 
        if (validarenvio()) { 
            console.log("se valido todo");
             console.log($('#f').serializeArray());

              enviaAjax($("#f"));  


              $('#addEmployeeModal').modal('hide');
              $('#f').trigger('reset');
            $("#Doc_Guia").val($("#Doc_Guia option:first").val()).trigger("change");
            Doc_Guia=0;
            nombre_valor="";
            seleccionado="";

            PrimerValordeSeccion();
            }
    });  
  
    //editar
    $("#editar").on("click", function() {

        if (validarEdit()) { 
            console.log("se valido edit");
        console.log($('#f2').serializeArray());
              enviaAjax($("#f2"));


              $('#editEmployeeModal').modal('hide');
              $('#f2').trigger('reset');
              }
    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->

$('#Doc_Guia').select2({
    dropdownParent: $('#addEmployeeModal')
  });


// $('#secciones').select2({
//   dropdownParent: $('#tablas_length')
// });



/*validaciones para registrar*/

$("#cantidad").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#cantidad").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#cantidad_msj"), "debe ser solamente numeros");
});
// ------

/*validaciones para editar*/

$("#cantidad_e").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);

});

$("#cantidad_e").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#cantidad_msj"), "debe ser solamente numeros");
});
// -----------------

$('#cantidad').on('input', function() {
    $(this).val(function(_, val) {
      return val.slice(0, 2);
    });
  });
  $('#cantidad_e').on('input', function() {
    $(this).val(function(_, val) {
      return val.slice(0, 2);
    });
  });



  $(".js-example-placeholder-multiple").select2({
    placeholder: "Select a state",
    minimumResultsForSearch: 2 // Cambiar este valor al mínimo requerido
  });

   

// end ready funtion()
});

//---------

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





//---------------Variables Globales-------------
var id_Seccion = $("#secciones1");
var id_Año = $("#año1");
var id_Guia = $("#E_Guia");

//Datos por Defecto para modulo editar
var seccionR;
var añoR;
var doc_G;
// ----------- 
var año_id;
var seccion_id;
var año_academico_M;
var Cantidad_estudintes=0;

function modificar(id){

    $("#tabla tr").each(function(){
     
        if(id == $(this).find("th:eq(0)").text()){
            $("#id1").val($(this).find("th:eq(0)").text());
            $("#id_ac").html($(this).find("th:eq(1)").text());
            $("#id_año").html($(this).find("th:eq(2)").text());
            $("#cantidad_e").val($(this).find("th:eq(5)").text());
            Cantidad_estudintes=$(this).find("th:eq(6)").text();
            $("#año_acd").html($(this).find("th:eq(7)").text());
            año_academico_M=$(this).find("th:eq(7)").attr("value");
            $('#value_acd').val(año_academico_M);
            // console.log(año_academico_M);
             console.log(Cantidad_estudintes);
            // ------------------------
            // console.log($(this).find("th:eq(1)").text());

            var seccion=$(this).find("th:eq(1)").text();
            seccion_id=$(this).find("th:eq(1)").attr("value");
            var año=$(this).find("th:eq(2)").text();
            año_id=$(this).find("th:eq(2)").attr("value");
            var E_Guia=$(this).find("th:eq(4)").text();
            
            // console.log(año_id);
            console.log(seccion_id);
            MostrarSelect(seccion,año,E_Guia);
            // console.log(seccion);
        //--->enviados datos
            seccionR=seccion;//optengo A,B,C..
            añoR=año;//optengo 1,2,3..
            doc_G=E_Guia;//optengo docente guia
        }

    });


}

function MostrarSelect(value_seccion,value_año,value_guia){
//-------Secciones Agregar "Select" al registrado-------------   

  // Iterar a través de las opciones
  id_Seccion.find("option").each(function(index, option) {
    // Obtener el valor y el texto de la opción usando $(option)
    var texto = $(option).text();

    //eliminar espacios dentro de la variable seccion
    var cadena=value_seccion;
    var letra = cadena.trim();
   
    if(letra==texto){
        // console.log("valido seccion");
        // if ($(option).attr('selected','selected') != undefined) {
        //     $(option).attr("selected",'');
        // }
        $(option).attr("selected",'');

    }
    
    
  });

//-------Año Agregar "Select" al registrado-------------          


  // Iterar a través de las opciones
  id_Año.find("option").each(function(index, option2) {
    // Obtener el valor y el texto de la opción usando $(option)
    var texto2 = $(option2).text();
      //pasar text a numero
        var numero2 = parseFloat(texto2); 
    // console.log(texto2);

    if (value_año==numero2){
        // console.log("valido año");

    $(option2).attr("selected",'');
        
    }
  });
// ---------------------------------------------------------------

         // Iterar a través de las opciones
  id_Guia.find("option").each(function(index, option3) {
    // Obtener el valor y el texto de la opción usando $(option)
    var texto3 = $(option3).text();
    // console.log("guia: "+value_guia);
    // console.log(texto3);

    if (value_guia==texto3){
    $(option3).attr("selected",'');
    $(option3).removeAttr("disabled");
        
    }
  });

}

//------- Eliminando "Select" al Modulo Edit al cerrar-------------   
$('#editEmployeeModal').on('hidden.bs.modal', function () {

  // Iterar a través de las opciones
  id_Seccion.find("option").each(function(index, option) {
    // Comprueva si el option tiene atributo select
    if (option.hasAttribute("selected")) {
     //remueve el atributo
        $(option).removeAttr("selected");
    }
    
  });

//   ----------------------

 // Iterar a través de las opciones
 id_Año.find("option").each(function(index, option) {
   // Comprueva si el option tiene atributo select
   if (option.hasAttribute("selected")) {
    //remueve el atributo
    $(option).removeAttr("selected");
    }
   
 });
 
 // Iterar a través de las opciones
 id_Guia.find("option").each(function(index, option) {
    // Comprueva si el option tiene atributo select
    if (option.hasAttribute("selected")) {
     //remueve el atributo
     $(option).removeAttr("selected");
    $(option).attr("disabled",'');

     }
    
  });


  $('#f2').trigger('reset');
  $('#existe_msj2').text('');
  $('#existe_msj3').text('');
    // ----
});



//<!---------------------------------------------------------------------------------------------------------------------------->
 
function eliminar(id, s, a){
    var se= s.toUpperCase();
   $('#seccion_b').text(se);
    $('#año_b').text(a);
    // console.log(se);
    // console.log(a);
//    ----------
    $("#id2").val(id);
    $("#borrar").on("click", () => {
            
         enviaAjax($("#f3"));
        });
}

function delete_info(s,a){
    var se= s.toUpperCase();
    var text='La Seccion: ' + se + ' ' + a + ' año ..tiene Estudiantes Registrados';
    Alerta_Error(text);
}
//<!---------------------------------------------------------------------------------------------------------------------------->

 

    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: (respuesta) => {
                    // alert(respuesta);
                    LlamadaAlert(respuesta)
                    abc();
                    abc2();
                 Doc_Guia2();
                 Doc_Guia3();

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
                    // console.log(respuesta);
                 $('#tablas').DataTable().destroy();
                     $("#tabla").empty();

                 $("#tabla").html(respuesta);//carga datos de la BD a la tabla
                   
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
 
    // -----------CARGA SE SECCIONES POR AJAX----------
    
    
function abc(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'abc'},
    
                success: function(respuesta) {
                
                    $('#secciones').html(respuesta);
                    $('#secciones1').html(respuesta);

                   
                    setTimeout(()=>{
                        $('#secciones-filter').html(`
                        <option value="">todo</option>
                        ${respuesta} `);    

                        CargarfilterSeccion();
                    }, 150);

                    
            


            }
        });

    }

abc();

// -------------Modales----------------

function abc2(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'abc2'},
    
                success: function(respuesta) {
            
                    $('#sec').html(respuesta);

                    $('#exampleModalCenter').on('hidden.bs.modal', function () {
                        $('#sec').html('');
                        $('#sec').html(respuesta);
                    });
            }
        });

    }

abc2();

// ----
function Doc_Guia2(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'doc_guia'},
    
                success: function(respuesta) {
                    
                    $('#Doc_Guia').html(`
                    <option value="0" selected disabled hidden>-Seleccionar-</option>
                    ${respuesta}
                `);

            }
        });
}
Doc_Guia2();


// ----
function Doc_Guia3(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'doc_guia_edit'},
    
                success: function(respuesta) {

                $('#E_Guia').html(respuesta);

            }
        });
}
Doc_Guia3();



// ------------CONSULTA SI EXISTE AL REGISTRAR--------------
// Obtener el valor del atributo "value" del primer option
var nombre_valor;

function PrimerValordeSeccion(){
    
setTimeout(()=>{
    nombre_valor = $("#secciones option:first").val();
},100)

}

$("#secciones").on("change", function() {
       nombre_valor = $(this).val();
       console.log(nombre_valor);

       if (nombre_valor != "" && seleccionado != "") {
      consulta_existe(nombre_valor, seleccionado);
      }
});

var seleccionado="";

$('#año').change(function() {
    seleccionado = $('#form_radio input:radio:checked').val();
    // console.log(seleccionado);

    if (nombre_valor != "" && seleccionado != "") {
      consulta_existe(nombre_valor, seleccionado);
      }
     
});
 

var existe;

function consulta_existe(nombre_valor, seleccionado){
var ano_academico= $('#ano_academico').val();
// console.log(ano_academico);

     $.ajax({
    url: 'controlador/ajax/seccion_consulta.php',
    type: 'POST',
    data: {ajaxPet: true, 
             nombre: nombre_valor,
             ano: seleccionado, 
             acad: ano_academico, 
             action: 'existe'},

            success: function(respuesta) {
              console.log(respuesta);

            if (respuesta == 1) {
            $('#existe_msj').text('Ya Existe la Seccion con ese Año');
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
var nombre1=$("#secccion1");
// ----------
id_Seccion.on("change", function() {
       nombre_valor2 = id_Seccion.val();
       console.log(nombre_valor2);

       if (nombre_valor2 != "" && seleccionado2 != "") {
        consulta_existe2(nombre_valor2, seleccionado2);
        }
        else{
            consulta_existe2(nombre_valor2, año_id);
            }
});
// ----------

id_Año.on('change', function(){
    
    seleccionado2 = id_Año.val();
    console.log(seleccionado2);
    console.log(nombre_valor2);

    
    if (nombre_valor2 != "" && seleccionado2 != "") {
      consulta_existe2(nombre_valor2, seleccionado2);
      }
      else{
        consulta_existe2(seccion_id, seleccionado2);
        console.log("opcion else");
        }

});


  
var existe2; 
function consulta_existe2(nombre_valor2, seleccionado2){
    console.log(año_academico_M);
     $.ajax({
    url: 'controlador/ajax/seccion_consulta.php',
    type: 'POST',
    data: {ajaxPet: true,
        nombre: nombre_valor2,
        ano: seleccionado2, 
        acad: año_academico_M,
        action: 'existe'},
    success: function(respuesta) {
        console.log(respuesta);

    
        if (respuesta === "1") {
             
            // console.log("Los datos son los registrados");
            // console.log("Valor de nombre_valor: " + nombre_valor2);
            // console.log("Valor de seccion_id: " + seccion_id);
            // console.log("Valor de seleccionado2: " + seleccionado2);
            // console.log("Valor de año_id: " + año_id);

            if (nombre_valor2 ===  seccion_id &&  seleccionado2 === año_id) {
            $('#existe_msj2').text('');
                $('#existe_msj3').text('La Seccion y el Año son los registrados');
                 setTimeout(function() {
      $('#existe_msj3').text("");
    }, 1500);   
                existe2 = 0;
            } else {
            $('#existe_msj3').text('');
                $('#existe_msj2').text('Ya Existe la Seccion con ese Año');
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
        },
        // Configuración para español
        language: {
            "url": "assets/datatables/Plugin/es-ES.json" // Asegúrate de ajustar la ruta al archivo Spanish.json en tu proyecto
        }
    });
}


var ObtenerID;

function handleRowClick(studentId,s,a, event) {
    if ($(event.target).closest('#option').length === 0) {
        ObtenerID = studentId;
        // console.log(ObtenerID);
        $('#s_M').text(s);
        $('#a_M').text(a);

        $.ajax({
            url: 'controlador/ajax/seccion_consulta.php',
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
                    var estudiante = studData[i];

                    // Crea un nuevo modal para cada estudiante
                    var modalContent = `
                    <tr>
                        <td class="cedula">${estudiante.cedula}</td>
                        <td class="nombre">${estudiante.nombre}</td>
                        <td class="apellido">${estudiante.apellido}</td>
                        <td class="edad">${estudiante.edad}</td>
                        <td class="observaciones" style="font-size:14px !important;">${estudiante.observaciones}</td>
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


// ----------------------------------------------------------

    function validarkeypress(er, e) {
    
        key = e.keyCode;
        tecla = String.fromCharCode(key);
        a = er.test(tecla);
    
        if (!a || isNaN(tecla)) {
    
            e.preventDefault();
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

//<!---------------------------------------------------------------------------------------------------------------------------->
//<!---------------------------------------------------------------------------------------------------------------------------->


//<!------------Validar REGISTRAR---------------->
        var seccion= nombre_valor;//en el form enviara el value solo es un permiso
        $('#secciones').change(function(){
             seccion = $(this).val();
        });

    var Doc_Guia=0;
        $('#Doc_Guia').change(function(){
            Doc_Guia = $(this).val();
       }); 
        

    function validarenvio() {
             // ----------SECCION---------
            if (seccion != '') { 
                console.log('Has seleccionado: '+seccion);  }
            else{
                alert('Debes seleccionar al menos una opción en Seccion');
                return false;
            }
            
             // -----------AÑO---------
            var año = '';    
            $('#form_radio input:radio:checked').each(function(){
                    año = $(this).val();       
             }); 

            if (año != '') { 
                console.log('Has seleccionado: '+año);  }
            else{
               $('#año_msj').text('Seleccione un año..');
               setTimeout(function() {
                $('#año_msj').text("");
              }, 2000); 
                return false;
            }
            // ----------DOCENTE GUIA----------
             // --------------------
        if (Doc_Guia != 0) { 
            console.log('Docente seleccionado: ' + Doc_Guia); 
         }
        else{
            $('#dg_msj').text('Seleccione un docente..');
            setTimeout(function() {
                $('#dg_msj').text("");
              }, 2000); 
            //vacio
            return false;
        }
            // ----------CANTIDAD----------
            if (validarkeyup(/^[0-9]{1,2}$/,
        $("#cantidad"), $("#cantidad_msj"), "el campo no puede estar vacio") == 0) {
            mensaje("<p>Solo numeros 0-9</p>");
            return false;
    
        }
        if ($("#cantidad").val() < 10 || $("#cantidad").val() > 40) {
            $('#cantidad_msj').text('La cantidad debe ser mayor o igual a 10 y menor a 40');
            console.log($("#cantidad").val());
            return false;
        }
        


        if (existe==1) {
            return false;
        }
           

        return true;
    }

//<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

//<!------------Validar Editar---------------->

//Iniciando con valores registrador
var seccion2=seccionR;

$('#secciones1').change(function(){
     seccion2 = $(this).val();
     
}); 

//Iniciando con valores registrador
var año1=añoR;

    $('#año1').change(function(){
         año1 = $(this).val();
    }); 

function validarEdit() {
        if (seccion2 != '') { 
            // console.log('Valor predeterminado'); 
         }
        else{
            //vacio
            return false;
         }
         // --------------------
        if (año1 != '') { 
            // console.log('Valor predeterminado'); 
         }
        else{
            //vacio
            return false;
        } 

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

        if (existe2==1) {
            return false;
        }

    return true;
}

function validarenvio_Seccion(){

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