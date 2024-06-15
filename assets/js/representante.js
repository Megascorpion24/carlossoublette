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




}





$(document).ready(function() { 
   
  
    CargarDataTable();





    

    $("#registrar").on("click", function() {
        if (validarenvio()) {
          
            enviaAjax($("#f"));
            $('#addEmployeeModal').modal('hide');
            $('#f').trigger('reset');

               
   
       }
        

    });

    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
          
            enviaAjax($("#f2"));
            $('#editEmployeeModal').modal('hide');
         

       }
   

    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->



/*validaciones para registrar*/


    $("#cedula").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);
       

    });

    $("#cedula").on("keyup", function() {
        validarkeyup(/^[0-9]{6,8}$/,
        $(this), $("#scedula"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombre1").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombre1").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,20}$/,
            $(this), $("#snombre1"), "El formato puede ser A-Z a-z 8-20");
    });

    $("#apellido1").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellido1").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,20}$/,
            $(this), $("#sapellido1"), "El formato puede ser A-Z a-z 8-20");
    });
    
    $("#nombre2").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombre2").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,20}$/,
            $(this), $("#snombre2"), "El formato puede ser A-Z a-z 8-20");
    });


    $("#apellido2").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellido2").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,20}$/,
            $(this), $("#sapellido2"), "El formato puede ser A-Z a-z 8-20");
    });

    $("#telefono").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#telefono").on("keyup", function() {
        validarkeyup(/^[0-9]{11}$/,
        $(this), $("#stelefono"), "El Telefono debe ser en el siguiente formato 00000000000");
    });

    $("#correo").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

    });

    $("#correo").on("keyup", function() {
        validarkeyup(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[A-Za-z]{5,7}[\u002E]{1}[A-Za-z]{3}$/,
            $(this), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari@servidor.dominio");
    });

    $("#contacto_emer").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#contacto_emer").on("keyup", function() {
        validarkeyup(/^[0-9\s]{11}$/,
        $(this), $("#scontacto_emer"), "El Telefono debe ser en el siguiente formato 00000000000");
    });
    $("#direccion").on("keyup", function() {
        validarkeyup(/^[a-zA-Z0-9\s]{4,30}$/,
            $(this), $("#sdireccion"), "El formato puede ser A-Z a-z 0-9 ejemplo: calle 5");
    });

/*aqui termina registrar*/










//<!---------------------------------------------------------------------------------------------------------------------------->








/*validaciones para editar*/
//$("#cedula1").on("keypress", function(e) {
   // validarkeypress(/^[0-9-\b]*$/, e);
   // valor=$("#cedula1").val();
  //  $("#tablas tr").each(function(){
    
        //if(valor == $(this).find("th:eq(0)").text()){
           
           // $("#scedula1").text("la cedula ya esta registrada");
          //  $("input").attr("readonly","readonly");
       
            

        //}else{
          //  $("#editEmployeeModal input").removeAttr("readonly");
      //  }
   // });

//});

$("#cedula1").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);

});

$("#cedula1").on("keyup", function() {
    validarkeyup(/^[0-9]{6,8}$/,
    $(this), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000");
});

$("#nombre11").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#nombre11").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#snombre11"), "El formato puede ser A-Z a-z 8-20");
});

$("#nombre21").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#nombre21").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#snombre21"), "El formato puede ser A-Z a-z 8-20");
});

$("#apellido11").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#apellido11").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#sapellido11"), "El formato puede ser A-Z a-z 8-20");
});

$("#apellido21").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#apellido21").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#sapellido21"), "El formato puede ser A-Z a-z 8-20");
});

$("#telefono1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#telefono1").on("keyup", function() {
    validarkeyup(/^[0-9]{11}$/,
    $(this), $("#stelefono1"), "El Telefono debe ser en el siguiente formato 00000000000");
});

$("#correo1").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

});

$("#correo1").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[A-Za-z]{5,7}[\u002E]{1}[A-Za-z]{3}$/,
        $(this), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari@servidor.dominio");
});

$("#contacto_emer1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#contacto_emer1").on("keyup", function() {
    validarkeyup(/^[0-9\s]{11}$/,
    $(this), $("#scontacto_emer1"), "El Telefono debe ser en el siguiente formato 00000000000");
});
$("#direccion1").on("keyup", function() {
    validarkeyup(/^[a-zA-Z0-9\s]{4,30}$/,
        $(this), $("#sdireccion1"), "El formato puede ser A-Z a-z 0-9 ejemplo: calle 5");
});
/*aqui termina editar*/    
});



//<!---------------------------------------------------------------------------------------------------------------------------->





function modificar(id){
    $("#tabla tr").each(function(){
    
        if(id == $(this).find("th:eq(0)").text()){
            $("#cedula1").val($(this).find("th:eq(0)").text());
            $("#nombre11").val($(this).find("th:eq(1)").text());
            $("#nombre21").val($(this).find("th:eq(2)").text());
            $("#apellido11").val($(this).find("th:eq(3)").text());
            $("#apellido21").val($(this).find("th:eq(4)").text());
            $("#telefono1").val($(this).find("th:eq(5)").text());
            $("#correo1").val($(this).find("th:eq(6)").text());
            $("#contacto_emer1").val($(this).find("th:eq(7)").text());
            $("#direccion1").val($(this).find("th:eq(8)").text());
           
            

        };
    });

}

//<!---------------------------------------------------------------------------------------------------------------------------->



    function eliminar(id){
        $("#cedula2").val(id);
        $("#borrar").on("click", function(){
           
        enviaAjax($("#f3"));   
        $('#deleteEmployeeModal').modal('hide');
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
            success: function(respuesta) {
                LlamadaAlert(respuesta);     
             $("#consulta").val("consulta");            
             enviaAjax2($("#f4"));  

       

                 setTimeout(function(){
                    window.location.reload();
                }, 1000);

           
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



//<!---------------------------------------------------------------------------------------------------------------------------->






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
    
    function validarkeypress(er, e) {
    
        key = e.keyCode;
    
    
        tecla = String.fromCharCode(key);
    
    
        a = er.test(tecla);
    
        if (!a) {
    
            e.preventDefault();
        }
    
    
    }






//<!---------------------------------------------------------------------------------------------------------------------------->





    function validarenvio() {
        if (validarkeyup(/^[0-9]{6,8}$/,
        $("#cedula"), $("#scedula"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
            mensaje("<p>La Cedula debe ser en el siguiente formato 00000000");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#nombre1"), $("#snombre1"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-20</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#apellido1"), $("#sapellido1"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-20</p>");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#nombre2"), $("#snombre2"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-20</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#apellido2"), $("#sapellido2"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-20</p>");
            return false;
        } else if (validarkeyup(/^[0-9]{11}$/,
         $("#telefono"), $("#stelefono"), "Solo numeros 0-9 en el formato 0000-0000000s ") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[A-Za-z]{5,7}[\u002E]{1}[A-Za-z]{3}$/,
        $("#correo"), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{11}$/,
        $("#contacto_emer"), $("#scontacto_emer"), "Solo numeros 0-9 en el formato 0000-0000000") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[a-zA-Z0-9\s]{4,30}$/,
        $("#direccion"), $("#sdireccion"), "Solo numeros 0-9 en el formato calle 8") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato calle 8</p>");
            return false;
        }
        return true;
    }






//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {
        if (validarkeyup(/^[0-9]{6,8}$/,
        $("#cedula1"), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
            mensaje("<p>La Cedula debe ser en el siguiente formato 00000000");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#nombre11"), $("#snombre11"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#apellido11"), $("#sapellido11"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-20</p>");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#nombre21"), $("#snombre21"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-20</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#apellido21"), $("#sapellido21"), "El formato puede ser A-Z a-z 8-20") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-20</p>");
            return false;
        } else if (validarkeyup(/^[0-9]{11}$/,
         $("#telefono1"), $("#stelefono1"), "Solo numeros 0-9 en el formato 0000-0000000</p>") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[A-Za-z]{5,7}[\u002E]{1}[A-Za-z]{3}$/,
        $("#correo1"), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{11}$/,
        $("#contacto_emer1"), $("#scontacto_emer1"), "Solo numeros 0-9 en el formato 0000-0000000</p>") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[a-zA-Z0-9\s]{4,30}$/,
        $("#direccion1"), $("#sdireccion1"), "Solo numeros 0-9 en el formato calle 8") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato calle 8</p>");
            return false;
        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
const input1 = document.getElementById("cedula");
const input2 = document.getElementById("nombre1");
const input3 = document.getElementById("nombre2");
const input4 = document.getElementById("apellido1");
const input5 = document.getElementById("apellido2");
const input6 = document.getElementById("telefono");
const input7 = document.getElementById("correo");
const input8 = document.getElementById("contacto_emer");
const input17 = document.getElementById("direccion");
/////////////////////////////////////////////////////////////////////
const input9 = document.getElementById("cedula1");
const input10 = document.getElementById("nombre11");
const input11 = document.getElementById("nombre21");
const input12 = document.getElementById("apellido11");
const input13 = document.getElementById("apellido21");
const input14 = document.getElementById("telefono1");
const input15 = document.getElementById("correo1");
const input16 = document.getElementById("contacto_emer1");
const input18 = document.getElementById("direccion1");

// Función para limitar la longitud del valor
const limitarLongitud = (input, maxLength) => {
  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
  }
};

input1.addEventListener("input", () => {
  const maxLength = 8; // Cambia este valor al límite máximo deseado
  limitarLongitud(input1, maxLength);
});
  
input2.addEventListener("input", () => {
    const maxLength = 20; // Cambia este valor al límite máximo deseado
    limitarLongitud(input2, maxLength);
});
input3.addEventListener("input", () => {
    const maxLength = 20; // Cambia este valor al límite máximo deseado
    limitarLongitud(input3, maxLength);
  });
    
input4.addEventListener("input", () => {
    const maxLength = 20; // Cambia este valor al límite máximo deseado
    limitarLongitud(input4, maxLength);
});

input5.addEventListener("input", () => {
    const maxLength = 20; // Cambia este valor al límite máximo deseado
    limitarLongitud(input5, maxLength);
  });
  input6.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input6, maxLength);
  });
    
input7.addEventListener("input", () => {
    const maxLength = 32; // Cambia este valor al límite máximo deseado
    limitarLongitud(input7, maxLength);
});

input8.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input8, maxLength);
  });
////////////////////////////////////////////////////////////////////////////////////////////
input9.addEventListener("input", () => {
    const maxLength = 8; // Cambia este valor al límite máximo deseado
    limitarLongitud(input9, maxLength);
  });
    
  input10.addEventListener("input", () => {
      const maxLength = 20; // Cambia este valor al límite máximo deseado
      limitarLongitud(input10, maxLength);
  });
  input11.addEventListener("input", () => {
      const maxLength = 20; // Cambia este valor al límite máximo deseado
      limitarLongitud(input11, maxLength);
    });
      
  input12.addEventListener("input", () => {
      const maxLength = 20; // Cambia este valor al límite máximo deseado
      limitarLongitud(input12, maxLength);
  });
  
  input13.addEventListener("input", () => {
      const maxLength = 20; // Cambia este valor al límite máximo deseado
      limitarLongitud(input13, maxLength);
    });
    input14.addEventListener("input", () => {
      const maxLength = 11; // Cambia este valor al límite máximo deseado
      limitarLongitud(input14, maxLength);
    });
      
  input15.addEventListener("input", () => {
      const maxLength = 32; // Cambia este valor al límite máximo deseado
      limitarLongitud(input15, maxLength);
  });
  
  input16.addEventListener("input", () => {
      const maxLength = 11; // Cambia este valor al límite máximo deseado
      limitarLongitud(input16, maxLength);
    });
    input17.addEventListener("input", () => {
        const maxLength = 30; // Cambia este valor al límite máximo deseado
        limitarLongitud(input17, maxLength);
    });
    
    input18.addEventListener("input", () => {
        const maxLength = 30; // Cambia este valor al límite máximo deseado
        limitarLongitud(input18, maxLength);
      });