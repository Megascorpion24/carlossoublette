// --------------Escucha Eventos en el Modal de Registrar-----------

var seccion="";//PrimerValordeSeccion()
var año="";
var Doc_Guia=0;
 
$("#secciones").on("change", function() {
       seccion = $(this).val();

       if (seccion != "" && año != "") {
      consulta_existe(seccion, año);
      }
});

$('#año').change(function() {
    año = $('#form_radio input:radio:checked').val();

    if (seccion != "" && año != "") {
      consulta_existe(seccion, año);
      }
});

$('#Doc_Guia').change(function(){
    Doc_Guia = $(this).val();
});


// ------------Escucha Eventos en el Modal de Editar----------------------------------
//----------(Iniciando con valores registrador)-------
var seccion_edit="";
var año_edit="";


$('#secciones1').change(function(){
  seccion_edit = $(this).val();
  ConsultarSelect_Seccion();
}); 

$('#año1').change(function(){
  año_edit = $(this).val();
  ConsultarSelect_Año();
}); 


function actualizarValores() {
    seccion_edit = seccion_value;
    año_edit = año_value;
  }

