
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
      AgregaSelect();
      //   ---------------------  


}
 
// -----------------------------------------------------------------
// ---Objeto para usar propiedades-------------------------
  var filtros = {
    year: '',
    seccion: ''
  };
// -----------------------------------------------------------------

function Cargarfilter(){
     
    var htmlBotones_Año = `
   
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
      tablas_filter.insertAdjacentHTML("afterbegin",htmlBotones_Año);


// ----Elimina y Agrega Clases----
$('.btn-light').on('click', function () {
    $('.btn-light').removeClass('border-secondary');
    $(this).addClass('border-secondary');
});
// -------Escucha evento click y filtra-------
$('[id^=filtro-]').on('click', function() {
    filtros.year = $(this).data('value');
    table.columns(2).search(filtros.year).draw();
    console.log(filtros.year);

});


// Evento de clic para el botón de limpiar filtro
$('#limpiar-filtro').on('click', function() {
    table.columns(2).search('').draw();
    filtros.year ='';
    //Mantiene el estado o valor de seccion
    table.column(1).search(filtros.seccion).draw();
});

// Si filtros.year no está vacío, aplicar el filtro
if (filtros.year !== '') {
    table.columns(2).search(filtros.year).draw();
} 


// --------------------------------------------------------------------------------------------


var htmlSelect_Seccion = `
<label for="secciones abc-filter" style="margin-left: 30px;">Filtrar:
    <select class="form-control" id="secciones-filter">
    </select>
</label>
`;

// Obtener el elemento #tablas_length
const tablasLengthElement = document.getElementById('tablas_length');
      tablasLengthElement.insertAdjacentHTML('beforeend', htmlSelect_Seccion);


// Evento de cambio para el select de secciones
$('#secciones-filter').on('change', function() {
filtros.seccion = $(this).find("option:selected").text();
console.log(filtros.seccion);
filtros.seccion = (filtros.seccion == "todo") ? "" : filtros.seccion;
table.column(1).search(filtros.seccion).draw();

});


// Si filtros.seccion no está vacío, aplicar el filtro
if (filtros.seccion !== '') {
table.column(1).search(filtros.seccion).draw();
}



}

 
function AgregaSelect(){
    // Seleccionar la opción correspondiente en el select
        $('#secciones-filter').find('option').each(function(index, option) {
            var text = $(option).text();
            if (text === filtros.seccion) {
                $(this).prop('selected', true);
            }
        });
}


