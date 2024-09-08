//<!---------------------------------------------MODIFICAR------------------------------------------------------------------------------->

var dc1;
var dc2;
var dc3;
var dc4;
var dc5;
var dc6;

const id_Docentes= $("#docentes1");
const id_Año = $("#año1");

//Varibales Necesarias para Consultar si existe al modificar
var Materia_R;
var Año_R;
 

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

            
            Materia_R=$(this).find("th:eq(1)").text().trim();
            Año_R=$(this).find("th:eq(2)").attr("value");
            console.log(Materia_R);
            console.log(Año_R);
            AgregarSelect_Año(Año_R);
            AgrgarSelectDocentes(dc1, dc2, dc3, dc4, dc5, dc6);

        }
    });

}

function AgregarSelect_Año(value_año){    
      // Iterar a través de las opciones
      id_Año.find("option").each(function(index, option2) {
        var texto2 = $(option2).text();// Obtener el valor y el texto de la opción usando $(option)
        if (value_año==texto2){
             $(option2).attr("selected",true);      
        }

      });
      
}

// --------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------
    
 // Función para mostrar la selección de docentes
 function AgrgarSelectDocentes(value_dc1, value_dc2, value_dc3,  value_dc4,  value_dc5,  value_dc6) {
    const selectedValues = [value_dc1, value_dc2, value_dc3,  value_dc4,  value_dc5,  value_dc6];
    
    // Recorre los elementos <option> del campo de selección de docentes
    id_Docentes.find("option").each(function (index, option) {
        const optionText = $(option).val();

        if (selectedValues.includes(optionText)) {
            $(option).prop("selected", true);
        }
    });

    id_Docentes.trigger("change");
 }




// --------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------


 // Cuando el modal se cierra, elimina la selección y se vacía la variable
$("#editEmployeeModal").on("hidden.bs.modal", function () {

    // Itera a través de las opciones del <select> de docentes
    id_Docentes.find("option").each(function(index, option) {
        // Comprueba si la opción tiene el atributo "selected"
        if (option.hasAttribute("selected")) {
            $(option).removeAttr("selected");// Elimina el atributo "selected"
        }
    });

    // Itera a través de las opciones del <select> de docentes
    id_Año.find("option").each(function(index, option) {
        if (option.hasAttribute("selected")) {
            $(option).removeAttr("selected");
        }
    });

    // Elimina la selección en el <select> de años y de docentes
    id_Año.val("");
    id_Docentes.val("");

    //Vacia todo
    $('#f2').trigger('reset');
            $("#docentes1").val(null).trigger("change");
            
            nombre_materia_edit="";
            año_edit="";
            $('#existe_msj2').text('');
            $('#existe_msj3').text('');
});


//<!---------------------------------------------------------------------------------------------------------------------------->
//<!---------------------------------------ELIMINAR------------------------------------------------------------------------------------->
function eliminar(id) {
    $("#id2").val(id);
    //Corregido
    $("#borrar").off("click").on("click", () => {
        enviaAjax($("#f3"));   
    });
}



// ----------------------------------------------------------------------------------------------------------------------
// -----------------------------------------ENVIAR-----------------------------------------------------------------------------
    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
          
                },
                
                success: (respuesta) => {
            //    console.log(respuesta);
                    LlamadaAlert(respuesta.trim());
        // --------------------------------------------
                    materias = [];//vaciar
                    Consulta_materia();//llenar
        // --------------------------------------------
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
                beforeSend: function(){},
                
                success: function(respuesta) {

                 $('#tablas').DataTable().destroy();
                // -----------------------
                 $("#tabla").html(respuesta);
                // -----------------------
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


