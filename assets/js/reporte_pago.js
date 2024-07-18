const miArray=[];
const miArray1=[];
const miArray2=[];
const miArray3=[];

const miArray4=[];
const miArray5=[];
const miArray6=[];
const miArray7=[];
var i=0;
$(document).ready(function() { 
   

var i=0;
var suma=0;
    
        $("#morocidad tr").each(function () {
        
              
            if( "inscripcion"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray[i] =  $(this).find("th:eq(1)").text();
                suma=suma+parseFloat($(this).find("th:eq(1)").text());
                miArray1[i] = "inscripcion" ;
                
    
            }
            if( "mensualidad"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray[i] =   $(this).find("th:eq(1)").text();
                suma=suma+parseFloat($(this).find("th:eq(1)").text());
                miArray1[i] = "mensualidad" ;
                
    
            }
           
    i++;
         
    });




    var i1=0;
var suma1=0;
    
        $("#morocidad1 tr").each(function () {
        
              
            if( "inscripcion"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray2[i1] =  $(this).find("th:eq(1)").text();
                suma1=suma1+parseFloat($(this).find("th:eq(1)").text());
                miArray3[i1] = "inscripcion" ;
                
    
            }
            if( "mensualidad"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray2[i1] =   $(this).find("th:eq(1)").text();
                suma1=suma1+parseFloat($(this).find("th:eq(1)").text());
                miArray3[i1] = "mensualidad" ;
                
    
            }
           
    i1++;
         
    });







    
var i2=0;
var suma2=0;
    
        $("#morocidad2 tr").each(function () {
        
              
            if( "inscripcion"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray4[i2] =  $(this).find("th:eq(1)").text();
                suma2=suma2+parseFloat($(this).find("th:eq(1)").text());
                miArray5[i2] = "inscripcion" ;
                
    
            }
            if( "mensualidad"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray4[i2] =   $(this).find("th:eq(1)").text();
                suma2=suma2+parseFloat($(this).find("th:eq(1)").text());
                miArray5[i2] = "mensualidad" ;
                
    
            }
           
    i2++;
         
    });




    var i1=0;
var suma3=0;
    
        $("#morocidad3 tr").each(function () {
        
              
            if( "inscripcion"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray6[i1] =  $(this).find("th:eq(1)").text();
                suma3=suma3+parseFloat($(this).find("th:eq(1)").text());
                miArray7[i1] = "inscripcion" ;
                
    
            }
            if( "mensualidad"==$(this).find("th:eq(0)").text()  ){
               
        
                miArray6[i1] =   $(this).find("th:eq(1)").text();
                suma3=suma3+parseFloat($(this).find("th:eq(1)").text());
                miArray7[i1] = "mensualidad" ;
                
    
            }
           
    i1++;
         
    });






    
    var ctx= document.getElementById("myChart").getContext("2d");
    var myChart= new Chart(ctx,{
        type:"bar",
        
        data:{
            labels:miArray1,
            datasets:[{
                    label:'Num datos',
                    data:miArray,
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)'
                    ]
            }]
        },
        options:{
            
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            }

            
        },
        options: {
            title: {
              display: true,
              text: 'Ventas por mes'
            }
          }
    });


    
    var ctx= document.getElementById("myChart2").getContext("2d");
    var myChart2= new Chart(ctx,{
        type:"bar",
        
        data:{
            labels:miArray3,
            datasets:[{
                    label:'Num datos',
                    data:miArray2,
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)'
                    ]
            }]
        },
        options:{
            
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            }

            
        },
        options: {
            title: {
              display: true,
              text: 'Ventas por mes'
            }
          }
    });



    var ctx= document.getElementById("myChart3").getContext("2d");
    var myChart3= new Chart(ctx,{
        type:"bar",
        
        data:{
            labels:miArray5,
            datasets:[{
                    label:'Num datos',
                    data:miArray4,
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)'
                    ]
            }]
        },
        options:{
            
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            }

            
        },
        options: {
            title: {
              display: true,
              text: 'Ventas por mes'
            }
          }
    });


    
    var ctx= document.getElementById("myChart4").getContext("2d");
    var myChart4= new Chart(ctx,{
        type:"bar",
        
        data:{
            labels:miArray7,
            datasets:[{
                    label:'Num datos',
                    data:miArray6,
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)'
                    ]
            }]
        },
        options:{
            
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            }

            
        },
        options: {
            title: {
              display: true,
              text: 'Ventas por mes'
            }
          }
    });
 

    $("#cantidad").text(i);
    $("#total").text(suma);
    $("#cantidad1").text(i1);
    $("#total1").text(suma1);
    
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
                    alert(respuesta);   
                 $("#consulta").val("consulta");
                 enviaAjax2($("#f4"));
                 window.location.reload();
        
                   
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
    
        } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo"), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{11}$/,
        $("#contacto_emer"), $("#scontacto_emer"), "Solo numeros 0-9 en el formato 0000-0000000") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
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
    
        } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo1"), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{11}$/,
        $("#contacto_emer1"), $("#scontacto_emer1"), "Solo numeros 0-9 en el formato 0000-0000000</p>") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
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
/////////////////////////////////////////////////////////////////////
const input9 = document.getElementById("cedula1");
const input10 = document.getElementById("nombre11");
const input11 = document.getElementById("nombre21");
const input12 = document.getElementById("apellido11");
const input13 = document.getElementById("apellido21");
const input14 = document.getElementById("telefono1");
const input15 = document.getElementById("correo1");
const input16 = document.getElementById("contacto_emer1");

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