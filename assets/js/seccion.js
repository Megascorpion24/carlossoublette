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


    $("#registrar").on("click", function() {
        // console.log($('#f')); 
        console.log($('#f').serializeArray());
 
        if (validarenvio()) { 
            console.log("se valido todo");
              enviaAjax($("#f")); 
              $('#addEmployeeModal').modal('hide');
              $('#f').trigger('reset');
            }
    });  
  
    //editar
    $("#editar").on("click", function() {
        console.log($('#f2').serializeArray());

        if (validarEdit()) { 
            console.log("se valido edit");
              enviaAjax($("#f2"));
              $('#editEmployeeModal').modal('hide');
              $('#f2').trigger('reset');
              }
    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->
// var value_Ano=  $('#año');
// $('#addEmployeeModal').select2({
//     dropdownParent:  $('.ano')
// });
$('#Doc_Guia').select2({
    dropdownParent: $('#addEmployeeModal')
  });

// end ready funtion()
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


function modificar(id){
    // console.log($(this).find("th:eq(2)").text());
    $("#tabla tr").each(function(){
    
        if(id == $(this).find("th:eq(0)").text()){
            $("#id1").val($(this).find("th:eq(0)").text());
            $("#id_ac").html($(this).find("th:eq(1)").text());
            $("#id_año").html($(this).find("th:eq(2)").text());
            $("#cantidad_e").val($(this).find("th:eq(5)").text());
            // ------------------------
            // console.log($(this).find("th:eq(1)").text());

            var seccion=$(this).find("th:eq(1)").text();
            var año=$(this).find("th:eq(2)").text();
            var E_Guia=$(this).find("th:eq(4)").text();
            
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
    else{
        console.log("valido seccion invalida");

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
        console.log("valido año");

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
     }
    
  });

    // ----
});

//<!---------------------------------------------------------------------------------------------------------------------------->

function eliminar(id){
    $("#id2").val(id);
    $("#borrar").on("click", () => {
            
         enviaAjax($("#f3"));
        });
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
                    alert(respuesta);
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

    
    //    ------Modal----------
    var ObtenerID;

$('.studentDataRow').on('click', function(event) {
    if ($(event.target).closest('#option').length === 0) {
         ObtenerID = $(this).data('id');
        console.log(ObtenerID);

        $.ajax({
            url: 'controlador/ajax/seccion_consulta.php',
            type: 'POST',
            data: {ajaxPet: true, id: ObtenerID, action: 'getData'},
            success: function(respuesta) {

                var studData = JSON.parse(respuesta);
                console.log(studData);

                 // Vacía el contenido anterior del modal antes de agregar los nuevos datos
                $('#info #tabla_estudiantes').empty();

                // Itera sobre cada estudiante en studData
                for (var i = 0; i < studData.length; i++) {
                    var estudiante = studData[i];
                    
                    // Crea un nuevo modal para cada estudiante
                var modalContent = `
                <tr>
                <td>${estudiante.cedula}</td>
                <td>${estudiante.nombre}</td>
                <td>${estudiante.apellido}</td>
                <td>${estudiante.edad}</td>
                <td style="font-size:14px !important;">${estudiante.observaciones}</td>
                 </tr>    
                `;

                    
                    // Agrega el contenido del modal al elemento .modal-content
                    $('#info #tabla_estudiantes').append(modalContent);
                }
        
                // Muestra el modal después de agregar todos los estudiantes
                $('#info').modal('show');
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
});            

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
        

    $("#cantidad").on("keypress", function(e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#cantidad_e").on("keypress", function(e) {
        validarkeypress(/^[0-9]$/, e);

    });

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


//<!------------Validar REGISTRAR---------------->
        var seccion='A';
        $('#secciones').change(function(){
             seccion = $(this).val();
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
                alert('Debes seleccionar al menos una opción en Año');
                return false;
            }
            
            // ----------CANTIDAD----------
            var cantidad= $("#cantidad").val();
            if (cantidad != "") {
                console.log("cantidad no vacia");
            }
            else{
                alert('Cantidad Vacia');
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

    return true;
}
