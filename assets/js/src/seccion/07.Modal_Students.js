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
