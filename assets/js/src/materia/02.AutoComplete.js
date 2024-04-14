//-----------------Rellenar el arreglo de Materia registradas------
var materias = [];

function Consulta_materia(){
    
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
            
        }
        CargaAutoComplete();
    }
});
}


// ----------------------Autocompletar Materia--------------
var nombre_Materia="";//varibale necesaria para validar si existe la materia

function CargaAutoComplete(){
    
$("#nombre" ).autocomplete({
    source: materias,
    select: function(event, ui) {
        nombre_Materia = ui.item.value; // ui.item.value contiene el valor seleccionado
        Verifica_Datos();//llama a la funcion que consulta si existe si se usa el autocompletado
    }
  });


}
