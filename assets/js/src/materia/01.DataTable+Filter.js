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

 //-----------Guardar en LocalStorage el valor de filasa mostrar---------
 
 $('select[name="tablas_length"]').change(function() {
   var value = $(this).val();
   localStorage.setItem('pageLength2', value); // Guarda en localStorage
   table.page.len(value).draw(); // Actualiza el pageLength y redibuja la tabla
});

 //------------------------------------------------------------------------------------------------------
 //------------FILTER------------------------------------------------------------------------------------------
 //------------------------------------------------------------------------------------------------------
 
 // Limpia y Agregar la clase 'border-secondary' al botón clicado
$('.btn-light').on('click', function () {
   $('.btn-light').removeClass('border-secondary');
   $(this).addClass('border-secondary');
});

// Filtra al clickear
$('[id^=filtro-]').on('click', function() {
   FilterYear = $(this).data('value');
   table.columns(2).search(FilterYear).draw();
});

// Evento de clic para el botón de limpiar filtro
$('#limpiar-filtro').on('click', function() {
table.columns(2).search('').draw();
FilterYear="";
}); 

//Filtra de nuevo al recargar
if (FilterYear !== '') {
   table.columns(2).search(FilterYear).draw();
} 



}
