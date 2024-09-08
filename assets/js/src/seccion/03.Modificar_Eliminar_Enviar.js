//<!---------------------------------------------MODIFICAR------------------------------------------------------------------------------->


//---------------Variables Globales de Editar-------------
var id_Seccion = $("#secciones1");
var id_Año = $("#año1");
var id_Guia = $("#E_Guia");


//Variables que tendran el "Value"
var seccion_value="";
var año_value="";
var año_academico_M; 

var Cantidad_estudintes=0;

function modificar(id){

    $("#tabla tr").each(function(){
     
        if(id == $(this).find("th:eq(0)").text()){

            $("#id1").val($(this).find("th:eq(0)").text());
            $("#id_ac").html($(this).find("th:eq(1)").text());
            $("#id_año").html($(this).find("th:eq(2)").text());
            $("#cantidad_e").val($(this).find("th:eq(5)").text());

            Cantidad_estudintes=$(this).find("th:eq(6)").text();//para validacion
            $("#año_acd").html($(this).find("th:eq(7)").text());
            año_academico_M=$(this).find("th:eq(7)").attr("value");//para la funcion consulta_existe2() 
            $('#value_acd').val(año_academico_M);
            // ------------------------

            //Text-Number
            let seccion_R=$(this).find("th:eq(1)").text();
            let año_R=$(this).find("th:eq(2)").text();
            let Doc_Guia_R=$(this).find("th:eq(4)").text();
            
            //Value
            seccion_value=$(this).find("th:eq(1)").attr("value");
            año_value=$(this).find("th:eq(2)").attr("value");
            actualizarValores();//04.EventListener

            //envia parametros para agregar select
            AgregarSelect(seccion_R,año_R,Doc_Guia_R);
           
        
        }

    });


}

function AgregarSelect(value_seccion,value_año,value_guia){
    
    //--------------------Seccion---------------------   
  // Iterar a través de las opciones
  id_Seccion.find("option").each(function(index, option) {
    // Obtener el valor y el texto de la opción usando $(option)
    let texto = $(option).text();

    let cadena=value_seccion;
    let letra = cadena.trim(); //eliminar espacios dentro de la variable seccion
   
    if(letra==texto){
        $(option).attr("selected",'');
    }
    
  });

//-------------------Año----------------------   

  // Iterar a través de las opciones
  id_Año.find("option").each(function(index, option2) {
    // Obtener el valor y el texto de la opción usando $(option)
    let texto2 = $(option2).text();
      //pasar text a numero
        let numero2 = parseFloat(texto2); 

    if (value_año==numero2){
         $(option2).attr("selected",'');  
    }

  });
// ----------Docente-Guia----------------------------------------------------

         // Iterar a través de las opciones
  id_Guia.find("option").each(function(index, option3) {
    // Obtener el valor y el texto de la opción usando $(option)
    let texto3 = $(option3).text();
    // console.log("guia: "+value_guia);
    // console.log(texto3);

    if (value_guia==texto3){
    $(option3).attr("selected",'');
    $(option3).removeAttr("disabled");
        
    }
  });

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//------------ Eliminando "Select" al Modulo Edit al cerrar---------------------   
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



//<!---------------------------------------------ELIMINAR------------------------------------------------------------------------------->
 
function eliminar(id, s, a){
    let se = s.toUpperCase();
    $('#seccion_b').text(se);
    $('#año_b').text(a);
    $("#id2").val(id);

    //Corregido
    $("#borrar").off("click").on("click", () => {
        enviaAjax($("#f3"));   
    });
}


function delete_info(s,a){
    let se= s.toUpperCase();
    let text='La Seccion: ' + se + ' ' + a + ' año ..tiene Estudiantes Registrados';
    Alerta_Error(text);
}
//<!--------------------------------------ENVIO-------------------------------------------------------------------------------------->

 

    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){},
                
                success: (respuesta) => {
                    // alert(respuesta);
                    LlamadaAlert(respuesta.trim());
                //Carga de informacion actualizada
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

function destruirDataTable() {
    return new Promise((resolve, reject) => {
        try {
            $('#tablas').DataTable().destroy();
            resolve();
        } catch (error) {
            reject(error);
        }
    });
}

function actualizarTabla(respuesta) {
    return new Promise((resolve, reject) => {
        try {
            $("#tabla").empty();
            $("#tabla").html(respuesta); // Carga datos de la BD a la tabla
            resolve();
        } catch (error) {
            reject(error);
        }
    });
}

function enviaAjax2(datos) {
    $.ajax({
        url: '',
        type: 'POST',
        data: datos.serialize(),
        beforeSend: function(){},
        success: function(respuesta) {
            destruirDataTable()
                .then(() => actualizarTabla(respuesta))
                .then(() => CargarDataTable())
                .catch(error => console.error("Error: ", error));
        },
        error: function(request, status, err) {
            if (status == "timeout") {
                mensaje("Servidor ocupado, intente de nuevo");
            } else {
                mensaje("ERROR: <br/>" + request + status + err);
            }
        },
        complete: function(){}
    });
}



//<!---------------------------------------------------------------------------------------------------------------------------->


