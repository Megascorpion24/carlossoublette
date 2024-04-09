
// ----------------------CONSULTA SI EXISTE AL REGISTRAR-----------------------

var año="";

function Verifica_Datos(){
    if (nombre_Materia != "" && año != "") {
        consulta_existe(nombre_Materia, año);
        }
}
    $("#nombre").on("input", function() {
           nombre_Materia = $(this).val();
        Verifica_Datos();   
    });

// --------------------------------------------

    $('#año').change(function() {
        año = $('#form_radio input:radio:checked').val();

        if (nombre_Materia != "" && año != "") {
          consulta_existe(nombre_Materia, año);
          }
          
    });

// --------------------------------------------

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
                    existe=true;
                }
                else{
                $('#existe_msj').text('');
                    existe=false;
                }

            }
    });
    }

   
// ----------------------------------------------------------------------------------------
// -------------------------CONSULTA SI EXISTE AL EDITAR------------------------------


var nombre_materia_edit="";
var año_edit="";
// ----------
$("#nombre1").on("input", function() {
       nombre_materia_edit = $(this).val();
       console.log(nombre_materia_edit.length);

       /*consulta solo si se cambio algo en el imput de materia
       y puede ser con el año modificado o no*/
       if (nombre_materia_edit != "" && año_edit != "") {
        consulta_existe2(nombre_materia_edit, año_edit);
        }
        else{
            consulta_existe2(nombre_materia_edit, Año_R);
            }
});
// -------------------

id_Año.on('change', function(){
    
    año_edit = id_Año.val();
    /*Consulta solo si se cambio algo en el select de año y 
    puede se con la materia modificada o no */
    if (nombre_materia_edit != "" && año_edit != "") {
      consulta_existe2(nombre_materia_edit, año_edit);
      }
      else{
        consulta_existe2(Materia_R, año_edit);
        }

});

// ------------------------------------

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
            // console.log("Valor de año: " + año_edit);
            // console.log("Valor de año: " + Año_R);
            // console.log("Valor de nombre1: " + $("#nombre1").val().toUpperCase());
            // console.log("Valor de nombres_m: " + nombres_m);

            if (año_edit ===  Año_R &&  $("#nombre1").val().toUpperCase() === Materia_R) {
            $('#existe_msj2').text('');
                $('#existe_msj3').text('La Materia y el Año son los registrados');
                     existe2 = false;
            } 
            else {
            $('#existe_msj3').text('');
                $('#existe_msj2').text('Ya Existe la Materia con ese Año');
                     existe2 = true;
            }



        } else {
            $('#existe_msj2').text('');
            $('#existe_msj3').text('');
            existe2 = false;
        }
        

        }
});
}
