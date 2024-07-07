
    
    
    
$(document).ready(function() { 
   


    var publicKey = `-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl/s/lMg8oJcuiz4vRlYu
    Q96OFjlwhIy/cpEXgYxtr/NV47BNISKv+4L0IulDkcYsTj8YjuCX6dZV0dy60yOr
    MxTVWb162pfVvOQmHDzB4OUQGy+ksjvuUFnpmZ20vY7BzWIp2a2esBluiHAnAz8I
    rWmZvgok6iaOunkcdmfbb88ZYnPucPIy0g0f1ndQgs9oRQ4VdNC6fQYyH3gZMBHf
    fy8naxxpz8ew8CT2bM1QbLZUWVsB3ISn7zge3+GzIgUn8s2DolSlZ1/DCEVhf1sA
    Ok9k828PnOT4EW/L++7I+JlZ5ExuEXLm45zccpoKrwDllrbDjVTtVo3ASmeE5jJU
    gQIDAQAB
    -----END PUBLIC KEY-----`;
    

    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $("#tablas").DataTable({
    
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
    
  
 
 
      
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $("#tablas2").DataTable({
    
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

    info: false,
    searching: false,
    "paging": false,
  });




//<!---------------------------------------------------------------------------------------------------------------------------->


$('#mibuscador').select2({
    dropdownParent: $('#addpago'),
    placeholder: 'Seleccionar',
    language: {
        noResults: function() {
            return "No se encontraron datos";
        }
    },

})

$('#mibuscador2').select2({
    dropdownParent: $('#addpagorepre'),
    placeholder: 'Seleccionar',
    language: {
        noResults: function() {
            return "No se encontraron datos";
        }
    },

})


$('#mibuscador3').select2({
    dropdownParent: $('#confirmarpagos'),
    placeholder: 'Seleccionar',
    language: {
        noResults: function() {
            return "No se encontraron datos";
        }
    },

});






    $("#registrar").on("click", function() {
        if (validarenvio()) {
            var identificador = $('#identificador').val();
            var monto = $('#monto').val();
            var concepto = $('#concepto').val();
            var fecha = $('#fecha').val();
            var forma = $('#forma').val();

            var encrypt = new JSEncrypt();
            encrypt.setPublicKey(publicKey);
            
            var encrypted= encrypt.encrypt(identificador);
            var encryptedmonto= encrypt.encrypt(monto);
            var encryptedconcepto= encrypt.encrypt(concepto);
            var encryptedfecha= encrypt.encrypt(fecha);
            var encryptedforma= encrypt.encrypt(forma);

            $('#identificador').val(encrypted);
            $('#monto').val(encryptedmonto);
            $('#concepto').val(encryptedconcepto);
            $('#fecha0').val(encryptedfecha);
            $('#forma0').val(encryptedforma);

            enviaAjax($("#f"));
            $('#addpago').modal('hide');
            $('#f').trigger('reset');          
           
       }
        
       
    });

    $("#registrarp").on("click", function() {
        if (validarenviop()) {

            var identificador = $('#identificadorp').val();
            var monto = $('#montop').val();
            var concepto = $('#conceptop').val();
            var fecha = $('#fechadp').val();
            var forma = $('#formap').val();

            var encrypt = new JSEncrypt();
            encrypt.setPublicKey(publicKey);
            
            var encrypted= encrypt.encrypt(identificador);
            var encryptedmonto= encrypt.encrypt(monto);
            var encryptedconcepto= encrypt.encrypt(concepto);
            var encryptedfecha= encrypt.encrypt(fecha);
            var encryptedforma= encrypt.encrypt(forma);

            $('#identificadorp').val(encrypted);
            $('#montop').val(encryptedmonto);
            $('#conceptop').val(encryptedconcepto);
            $('#fechadp0').val(encryptedfecha);
            $('#formap0').val(encryptedforma);
          
            enviaAjax($("#fp"));
            $('#confirmarpagos').modal('hide');
            $('#fp').trigger('reset');          
           
       }
        

    });

    $("#registrarr").on("click", function() {
        if (validarenvio2()) {
            var identificador = $('#identificadorr').val();
            var monto = $('#montor').val();
            var concepto = $('#conceptor').val();
            var fecha = $('#fechar').val();
            var forma = $('#formar').val();

            var encrypt = new JSEncrypt();
            encrypt.setPublicKey(publicKey);
            
            var encrypted= encrypt.encrypt(identificador);
            var encryptedmonto= encrypt.encrypt(monto);
            var encryptedconcepto= encrypt.encrypt(concepto);
            var encryptedfecha= encrypt.encrypt(fecha);
            var encryptedforma= encrypt.encrypt(forma);

            $('#identificadorr').val(encrypted);
            $('#montor').val(encryptedmonto);
            $('#conceptor').val(encryptedconcepto);
            $('#fechar0').val(encryptedfecha);
            $('#formar0').val(encryptedforma);
          
            enviaAjax($("#fr"));
            $('#addpagorepre').modal('hide');
            $('#fr').trigger('reset');
            
       }
        

    });


    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
            var identificador = $('#identificadorM').val();
            var monto = $('#montoM').val();
            var concepto = $('#conceptoM').val();
            var fecha = $('#fechaM').val();
            var forma = $('#formaM').val();

            var encrypt = new JSEncrypt();
            encrypt.setPublicKey(publicKey);
            
            var encrypted= encrypt.encrypt(identificador);
            var encryptedmonto= encrypt.encrypt(monto);
            var encryptedconcepto= encrypt.encrypt(concepto);
            var encryptedfecha= encrypt.encrypt(fecha);
            var encryptedforma= encrypt.encrypt(forma);

            $('#identificadorM').val(encrypted);
            $('#montoM').val(encryptedmonto);
            $('#conceptoM').val(encryptedconcepto);
            $('#fechaM0').val(encryptedfecha);
            $('#formaM0').val(encryptedforma);

            enviaAjax($("#f2"));
            $('#editpago').modal('hide');
       }
   

    });

    $("#registrarMM").on("click", function() {
        if (validarenvioMM()) {


          
            enviaAjax($("#fMM"));
            $('#editmontos').modal('hide');
       }
   

    });
    

//<!---------------------------------------------------------------------------------------------------------------------------->
/*validaciones para registrar*/




$("#codigoMM").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);
});

$("#codigoMM").on("keyupMM", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#scodigos"), "La ID debe ser en el siguiente formato 0000");
});

$("#tipoMM").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);
});

$("#tipoMM").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#stipoMM"), "El formato puede ser 0000");
});

$("#m_montosMM").on("keypress", function(e) {
    validarkeypress(/^[0-9-]$/, e);
});

$("#m_montosMM").on("keyup", function() {
    validarkeyup(/^[0-9-]{1,11}$/,
        $(this), $("#sm_montosMM"), "El formato puede ser 0000");
});
$("#d_montosMM").on("keyup", function() {
    validarkeyup(/^[0-9-]{1,11}$/,
        $(this), $("#sd_montosMM"), "El formato puede ser 0000");
});

$("#d_montosMM").on("keypress", function(e) {
    validarkeypress(/^[0-9-]$/, e);
});







/*aqui termina registrar*/
//<!---------------------------------------------------------------------------------------------------------------------------->

//<!---------------------------------------------------------------------------------------------------------------------------->
/*validaciones para registrar*/




    $("#id_deudas").on("keypress", function(e) {
        validarkeypress(/^[0-9\b]*$/, e);
    });

    $("#id_deudas").on("keyup", function() {
        validarkeyup(/^[0-9]{1,5}$/,
            $(this), $("#sid_deudas"), "La ID debe ser en el siguiente formato 0000");
    });

    $("#identificador").on("keypress", function(e) {
        validarkeypress(/^[0-9-\u002E\b]*$/, e);
    });

    $("#identificador").on("keyup", function() {
        validarkeyup(/^[0-9-]{4,11}$/,
            $(this), $("#sidentificador"), "El formato puede ser 0000");
    });

    $("#concepto").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);
    });

    $("#concepto").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,20}$/,
            $(this), $("#sconcepto"), "El formato puede ser 0000");
    });

    $("#forma").on("keypress", function(e) {
        validarkeypress(/^[-A-Za-z\s]$/, e);
    });

    $("#forma").on("keyup", function() {
        validarkeyup(/^[-A-Za-z\s]{4,25}$/,
            $(this), $("#sforma"), "");
    });

    $("#estado").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z\s]$/, e);
    });

    $("#estado").on("keyup", function() {
        validarkeyup(/^[A-Za-z\s]{4,20}$/,
            $(this), $("#sestado"), "El formato debe ser valido");
    });
    $("#monto").on("keypress", function(e) {
        validarkeypress(/^[0-9-]$/, e);
    });

    $("#monto").on("keyup", function() {
        validarkeyup(/^[0-9-]{1,11}$/,
            $(this), $("#smonto"), "El formato puede ser valido");
    });
    $("#meses").on("keypress", function(e) {
        validarkeypress(/^[1-9]$/, e);
    });

    $("#meses").on("keyup", function() {
        validarkeyup(/^[1-9]{1,2}$/,
            $(this), $("#smeses"), "El formato puede ser valido");
    });




    
/*aqui termina registrar*/
//<!---------------------------------------------------------------------------------------------------------------------------->

$("#idp").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);
});

$("#idp").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#sidp"), "La ID debe ser en el siguiente formato 0000");
});


$("#id_deudasp").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);
});

$("#id_deudasp").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#sid_deudasp"), "La ID debe ser en el siguiente formato 0000");
});

$("#identificadorp").on("keypress", function(e) {
    validarkeypress(/^[0-9-\u002E\b]*$/, e);
});

$("#identificadorp").on("keyup", function() {
    validarkeyup(/^[0-9-]{4,11}$/,
        $(this), $("#sidentificadorp"), "El formato puede ser 0000");
});

$("#conceptop").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);
});

$("#conceptop").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#sconceptop"), "El formato puede ser 0000");
});

$("#formap").on("keypress", function(e) {
    validarkeypress(/^[-A-Za-z\s]$/, e);
});

$("#formap").on("keyup", function() {
    validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $(this), $("#sformap"), "");
});

$("#montop").on("keypress", function(e) {
    validarkeypress(/^[0-9-]$/, e);
});

$("#montop").on("keyup", function() {
    validarkeyup(/^[0-9-]{1,11}$/,
        $(this), $("#smontop"), "El formato puede ser valido");
});

$("#mesesp").on("keypress", function(e) {
    validarkeypress(/^[1-9]$/, e);
});

$("#mesesp").on("keyup", function() {
    validarkeyup(/^[1-9]{1,2}$/,
        $(this), $("#smesesp"), "El formato puede ser valido");
});

$("#estadop").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z\s]$/, e);
});

$("#estadop").on("keyup", function() {
    validarkeyup(/^[A-Za-z\s]{4,10}$/,
        $(this), $("#sestadop"), "El formato debe ser valido");
});

$("#estado_pagosp").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);
});

$("#estado_pagosp").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#sestado_pagosp"), "El formato puede ser valido");
});

$("#estadop").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);
});

$("#estatusp").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#sestatusp"), "El formato puede ser valido");
});



/*aqui termina registrar*/
//<!---------------------------------------------------------------------------------------------------------------------------->




//<!---------------------------------------------------------------------------------------------------------------------------->
/*validaciones para registrar*/


$("#id_deudasr").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);
});

$("#id_deudasr").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#sid_deudasr"), "La ID debe ser en el siguiente formato 0000");
});

$("#identificadorr").on("keypress", function(e) {
    validarkeypress(/^[0-9\u002E\b]*$/, e);
});

$("#identificadorr").on("keyup", function() {
    validarkeyup(/^[0-9]{4,11}$/,
        $(this), $("#sidentificadorr"), "El formato puede ser 0000");
});
$("#conceptor").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);
});

$("#conceptor").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#sconceptor"), "El formato puede ser 0000");
});

$("#formar").on("keypress", function(e) {
    validarkeypress(/^[-A-Za-z\s]$/, e);
});

$("#formar").on("keyup", function() {
    validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $(this), $("#sformar"), "");
});

$("#estador").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z\s]$/, e);
});

$("#estador").on("keyup", function() {
    validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $(this), $("#sestador"), "El formato debe ser valido");
});

$("#montor").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);
});

$("#montor").on("keyup", function() {
    validarkeyup(/^[0-9]{1,11}$/,
        $(this), $("#smontor"), "El formato puede ser valido");
});
$("#mesesr").on("keypress", function(e) {
    validarkeypress(/^[1-9]$/, e);
});

$("#mesesr").on("keyup", function() {
    validarkeyup(/^[1-9]{1,2}$/,
        $(this), $("#smesesr"), "El formato puede ser valido");
});



/*aqui termina registrar*/
//<!---------------------------------------------------------------------------------------------------------------------------->












//<!---------------------------------------------------------------------------------------------------------------------------->


$("#id_deudasM").on("keypress", function(e) {
    validarkeypress(/^[0-9\b]*$/, e);
});

$("#id_deudasM").on("keyup", function() {
    validarkeyup(/^[0-9]{1,5}$/,
        $(this), $("#sid_deudasM"), "La ID debe ser en el siguiente formato 0000");
});

$("#identificadorM").on("keypress", function(e) {
    validarkeypress(/^[0-9-]*$/, e);
});

$("#identificadorM").on("keyup", function() {
    validarkeyup(/^[0-9-]{4,11}$/,
        $(this), $("#sidentificadorM"), "El formato puede ser 0000.00");
});
$("#conceptoM").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);
});

$("#conceptoM").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,20}$/,
        $(this), $("#sconceptoM"), "El formato puede ser 0000");
});

$("#formaM").on("keypress", function(e) {
    validarkeypress(/^[-A-Za-z\s]$/, e);
});

$("#formaM").on("keyup", function() {
    validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $(this), $("#sformaM"), "");
});

$("#estadoM").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z\s]$/, e);
});

$("#estadoM").on("keyup", function() {
    validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $(this), $("#sestadoM"), "El formato puede ser valido");
});
$("#montosM").on("keypress", function(e) {
    validarkeypress(/^[0-9-]$/, e);
});

$("#montoM").on("keyup", function() {
    validarkeyup(/^[0-9-]{1,11}$/,
        $(this), $("#smontoM"), "El formato puede ser valido");
});




});
//<!---------------------------------------------------------------------------------------------------------------------------->
function montos(id){
    $("#tabla2 tr").each(function(){
    
        if(id == $(this).find("th:eq(0)").text()){
            $("#codigoMM").val($(this).find("th:eq(0)").text());
            $("#tipoMM").val($(this).find("th:eq(1)").text());
            $("#m_montosMM").val($(this).find("th:eq(2)").text());
            $("#d_montosMM").val($(this).find("th:eq(3)").text());
            

        }
    });

}




function ver(id){
    $("#tabla tr").each(function(){
    
        if(id == $(this).find("th:eq(0)").text()){
            $("#idC").val($(this).find("th:eq(0)").text());
            $("#id_deudasC").val($(this).find("th:eq(1)").text());
            $("#identificadorC").val($(this).find("th:eq(4)").text());
            $("#conceptoC").val($(this).find("th:eq(5)").text());               
            $("#formaC").val($(this).find("th:eq(6)").text());
            $("#fechaC").val($(this).find("th:eq(7)").text());      
            $("#fechadC").val($(this).find("th:eq(8)").text());          
            $("#mesesC").val($(this).find("th:eq(9)").text());
            $("#montoC").val($(this).find("th:eq(10)").text());
            $("#cedula2C").val($(this).find("th:eq(2)").text());
            $("#nombreC").val($(this).find("th:eq(12)").text());  
            $("#cedulaC").val($(this).find("th:eq(11)").text());
            $("#nombre1C").val($(this).find("th:eq(3)").text());        
            $("#estadoC").val($(this).find("th:eq(13)").text());
        

        }
    });

}




//<!---------------------------------------------------------------------------------------------------------------------------->
    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#idM").val($(this).find("th:eq(0)").text());
                $("#id_deudasM").val($(this).find("th:eq(1)").text());
                $("#identificadorM").val($(this).find("th:eq(4)").text());
                $("#conceptoM").val($(this).find("th:eq(5)").text());               
                $("#formaM").val($(this).find("th:eq(6)").text());
                $("#fechaM").val($(this).find("th:eq(7)").text());      
                $("#fechadM").val($(this).find("th:eq(8)").text());  
                    
                $("#montoM").val($(this).find("th:eq(10)").text());
                $("#cedula2M").val($(this).find("th:eq(2)").text());
                $("#nombreM").val($(this).find("th:eq(12)").text());  
                $("#cedulaM").val($(this).find("th:eq(11)").text());
                $("#nombre1M").val($(this).find("th:eq(3)").text());        
                $("#estadoM").val($(this).find("th:eq(13)").text());
            
                
            

                
            }
            

        });
        
    
    }





    


//<!---------------------------------------------------------------------------------------------------------------------------->
function eliminar(id){
    $("#idE").val(id);
    $("#borrar").on("click", function(){
       
    enviaAjax($("#f3"));
    $('#deletepago').modal('hide');
    });

}


//<!---------------------------------------------------------------------------------------------------------------------------->

























function añadir2() {
    id = $("#mibuscador").val();
   
    $("#select tr").each(function () {

        
        if (id == $(this).find("th:eq(0)").text()) {
            $("#id_deudas").val($(this).find("th:eq(0)").text());
            $("#concepto").val($(this).find("th:eq(2)").text());
            $("#fecha").val($(this).find("th:eq(3)").text());
            $("#monto").val($(this).find("th:eq(6)").text());
            $("#montov").val($(this).find("th:eq(6)").text());
            $("#montot").val($(this).find("th:eq(7)").text());
            $("#montooculto").val($(this).find("th:eq(8)").text());

            var monto = $("#monto").val();

            // Verificar si el monto es mayor al valor de th:eq(6)
            if (monto > parseFloat($("#select tr th:eq(6)").text())) {
           
            }

            var fechaActual = new Date();
            var fechaDeuda = new Date($(this).find("th:eq(3)").text());
            var diferencia = fechaActual.getTime() - fechaDeuda.getTime();
            var mes = Math.floor(diferencia / (30 * 24 * 60 * 60 * 1000)); // 30 días en milisegundos
            $("#mesesv").val(mes);

            var meses = $("#meses").val();

            var concepto = $("#concepto").val();
            if (concepto === "mensualidad") {
                var mesesv = $("#mesesv").val();
                if (!isNaN(mesesv)) {
                    $("#montot").val(parseFloat($("#montot").val()) * parseFloat(mesesv));
                }
            }
     
            if ($(this).find("th:eq(2)").text() == "mensualidad") {
                $("#ocult").removeClass("ocultar");
                $("#ocult2").removeClass("ocultar");
                $("#ocult5").removeClass("ocultar");
            } else {
                $("#ocult").addClass("ocultar");           
                $("#ocult2").addClass("ocultar");
                $("#ocult5").addClass("ocultar");
            }

            if ($("#ocult").hasClass("ocultar")) {
                // Eliminar la propiedad readonly del input monto
                $("#monto").prop("readonly", false);
                // Asignar un valor predeterminado de 1 al campo meses
                meses = 1;
            }
            
            if ($("#ocult").hasClass("ocultar")) {
                // Eliminar la propiedad readonly del input monto
                $("#monto").prop("readonly", false);
            }




        }
 
    });
    
}

$("#mibuscador").change(function() {
    $("#meses").val(1);
});
// Obtener los elementos HTML
const inpMeses = document.getElementById("meses");
const inputMontoV = document.getElementById("montov");
const inputMontoOculto = document.getElementById("montooculto");

// Agregar un event listener al input de "meses"
inpMeses.addEventListener("click", function() {
  // Comparar los valores de los inputs "montov" y "montooculto"
  if (inputMontoV.value !== inputMontoOculto.value) {
    // Establecer el atributo "readonly" del input "meses"
    inpMeses.setAttribute("readonly", true);
  } else {
    // Eliminar el atributo "readonly" del input "meses"
    inpMeses.removeAttribute("readonly");
  }
});


const inpuMeses = document.getElementById('meses');
const inputMonto = document.getElementById('monto');
const inputConcepto = document.getElementById('concepto');

// Agregar un evento de cambio al input de meses
inpuMeses.addEventListener('change', function() {
    // Verificar si el valor del input de meses es mayor que 1
    if (this.value > 1 && inputConcepto.value === 'mensualidad') {
        // Hacer que el input de monto sea readonly
        inputMonto.setAttribute('readonly', 'true');
        // Establecer el valor del input de monto a 1
        //inpuMeses.value = 1;
    } else if (inputConcepto.value === 'inscripcion' && this.value === 1) {
        // No establecer el atributo readonly en el input de monto
        inputMonto.removeAttribute('readonly');
    } else {
        // De lo contrario, hacer que el input de monto no sea readonly
        inputMonto.removeAttribute('readonly');
    }
    
});


const firstInput = document.getElementById("monto");
const secondInput = document.getElementById("montov");
const inputMeses = document.getElementById("meses");
const totalMeses = document.getElementById("mesesv");

firstInput.addEventListener("input", function() {
  const firstValue = parseFloat(firstInput.value);
  const secondValue = parseFloat(secondInput.value);
  

  if (firstValue > secondValue) {
    firstInput.value = secondValue;
  }

  if (parseInt(inputMeses.value) >= 2) {
    // Multiplicamos el valor del campo monto por el valor de los meses
    firstInput.value *= parseFloat(inputMeses.value);
  }
 
});

inputMeses.addEventListener("input", function() {
  const firstValue = parseInt(inputMeses.value);
  const secondValue = parseInt(totalMeses.value);
  const mesActual = parseInt(inputMeses.value);
  
  if (firstValue > secondValue) {
    inputMeses.value = secondValue;// limita los meses a la deuda
    firstInput.value = (secondValue) * parseFloat(secondInput.value);
  } else {
    firstInput.value = mesActual * parseFloat(secondInput.value); // borrar todo menos esto si quiero poder paar meses de adelanto 
  }

   
});





































function añadirr() {
    id = $("#mibuscador2").val();
    $("#selectr tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
            $("#id_deudasr").val($(this).find("th:eq(0)").text());
            $("#conceptor").val($(this).find("th:eq(2)").text());
            $("#fechar").val($(this).find("th:eq(3)").text());
            $("#montor").val($(this).find("th:eq(6)").text());
            $("#montovr").val($(this).find("th:eq(6)").text());
            $("#montotr").val($(this).find("th:eq(7)").text());
            $("#montoocultor").val($(this).find("th:eq(8)").text());

            var monto = $("#montor").val();

            // Verificar si el monto es mayor al valor de th:eq(6)
            if (monto > parseFloat($("#select tr th:eq(6)").text())) {
           
            }

            var fechaActual = new Date();
            var fechaDeuda = new Date($(this).find("th:eq(3)").text());
            var diferencia = fechaActual.getTime() - fechaDeuda.getTime();
            var mes = Math.floor(diferencia / (30 * 24 * 60 * 60 * 1000)); // 30 días en milisegundos
            $("#mesesvr").val(mes);

            var meses = $("#mesesr").val();

            var concepto = $("#conceptor").val();
            if (concepto === "mensualidad") {
                var mesesv = $("#mesesvr").val();
                if (!isNaN(mesesv)) {
                    $("#montotr").val(parseFloat($("#montotr").val()) * parseFloat(mesesv));
                }
            }
           
            if ($(this).find("th:eq(2)").text() == "mensualidad") {
                $("#ocult3").removeClass("ocultar");
                $("#ocult4").removeClass("ocultar");
                $("#ocult6").removeClass("ocultar");
            } else {
                $("#ocult3").addClass("ocultar");           
                $("#ocult4").addClass("ocultar");
                $("#ocult6").addClass("ocultar");
            }

            if ($("#ocult3").hasClass("ocultar")) {
                // Eliminar la propiedad readonly del input monto
                $("#montor").prop("readonly", false);
                // Asignar un valor predeterminado de 1 al campo meses
                meses = 1;
            }
            
            if ($("#ocult3").hasClass("ocultar")) {
                // Eliminar la propiedad readonly del input monto
                $("#montor").prop("readonly", false);
            }




        }
 
    });
    
}


$("#mibuscador2").change(function() {
    $("#mesesr").val(1);
});
// Obtener los elementos HTML
const inpMesesr = document.getElementById("mesesr");
const inputMontoVr = document.getElementById("montovr");
const inputMontoOcultor = document.getElementById("montoocultor");

// Agregar un event listener al input de "meses"
inpMesesr.addEventListener("click", function() {
  // Comparar los valores de los inputs "montov" y "montooculto"
  if (inputMontoVr.value !== inputMontoOcultor.value) {
    // Establecer el atributo "readonly" del input "meses"
    inpMesesr.setAttribute("readonly", true);
  } else {
    // Eliminar el atributo "readonly" del input "meses"
    inpMesesr.removeAttribute("readonly");
  }
});


const inpuMesesr = document.getElementById('mesesr');
const inputMontor = document.getElementById('montor');
const inputConceptor = document.getElementById('conceptor');

// Agregar un evento de cambio al input de meses
inpuMesesr.addEventListener('change', function() {
    // Verificar si el valor del input de meses es mayor que 1
    if (this.value > 1 && inputConceptor.value === 'mensualidad') {
        // Hacer que el input de monto sea readonly
        inputMontor.setAttribute('readonly', 'true');
        // Establecer el valor del input de monto a 1
        //inpuMeses.value = 1;
    } else if (inputConcepto.value === 'inscripcion' && this.value === 1) {
        // No establecer el atributo readonly en el input de monto
        inputMontor.removeAttribute('readonly');
    } else {
        // De lo contrario, hacer que el input de monto no sea readonly
        inputMontor.removeAttribute('readonly');
    }
    
});


const firstInputr = document.getElementById("montor");
const secondInputr = document.getElementById("montovr");
const inputMesesr = document.getElementById("mesesr");
const totalMesesr = document.getElementById("mesesvr");

firstInputr.addEventListener("input", function() {
  const firstValuer = parseFloat(firstInputr.value);
  const secondValuer = parseFloat(secondInputr.value);
  

  if (firstValuer > secondValuer) {
    firstInputr.value = secondValuer;
  }

  if (parseInt(inputMesesr.value) >= 2) {
    // Multiplicamos el valor del campo monto por el valor de los meses
    firstInputr.value *= parseFloat(inputMesesr.value);
  }
 
});

inputMesesr.addEventListener("input", function() {
  const firstValuer = parseInt(inputMesesr.value);
  const secondValuer = parseInt(totalMesesr.value);
  const mesActualr = parseInt(inputMesesr.value);
  
  if (firstValuer > secondValuer) {
    inputMesesr.value = secondValuer;
    firstInputr.value = (secondValuer) * parseFloat(secondInputr.value);
  } else {
    firstInputr.value = mesActualr * parseFloat(secondInputr.value);
  }

   
});























//<!---------------------------------------------------------------------------------------------------------------------------->





function añadir3() {
    id = $("#mibuscador3").val();
   
    $("#selectp tr").each(function () {

        
        if (id == $(this).find("th:eq(0)").text()) {
            $("#idp").val($(this).find("th:eq(0)").text());
            $("#id_deudasp").val($(this).find("th:eq(1)").text());
            $("#conceptop").val($(this).find("th:eq(2)").text());
            $("#identificadorp").val($(this).find("th:eq(3)").text());
            $("#fechap").val($(this).find("th:eq(4)").text());
            $("#fechadp").val($(this).find("th:eq(5)").text());
            $("#formap").val($(this).find("th:eq(6)").text());
            $("#montop").val($(this).find("th:eq(7)").text());
            $("#mesesp").val($(this).find("th:eq(8)").text());
            $("#estadop").val($(this).find("th:eq(9)").text());
            $("#estado_pagosp").val($(this).find("th:eq(10)").text());
            $("#estatusp").val($(this).find("th:eq(11)").text());

            $("#montovp").val($(this).find("th:eq(12)").text());
            $("#montotp").val($(this).find("th:eq(13)").text());
            $("#montoocultop").val($(this).find("th:eq(14)").text());

            var monto = $("#montop").val();

            // Verificar si el monto es mayor al valor de th:eq(6)
            if (monto > parseFloat($("#select tr th:eq(7)").text())) {
           
            }

            var fechaActual = new Date();
            var fechaDeuda = new Date($(this).find("th:eq(5)").text());
            var diferencia = fechaActual.getTime() - fechaDeuda.getTime();
            var mes = Math.floor(diferencia / (30 * 24 * 60 * 60 * 1000)); // 30 días en milisegundos
            $("#mesesvp").val(mes);

            var meses = $("#mesesp").val();

            var concepto = $("#conceptop").val();
            if (concepto === "mensualidad") {
                var mesesv = $("#mesesvp").val();
                if (!isNaN(mesesv)) {
                    $("#montotp").val(parseFloat($("#montotp").val()) * parseFloat(mesesv));
                }
            }


            if ($(this).find("th:eq(2)").text() == "mensualidad") {
                $("#ocultp1").removeClass("ocultar");
                $("#ocultp2").removeClass("ocultar");
                $("#ocultp3").removeClass("ocultar");
            } else {
                $("#ocultp1").addClass("ocultar");           
                $("#ocultp2").addClass("ocultar");
                $("#ocultp3").addClass("ocultar");
            }

            if ($("#ocultp1").hasClass("ocultar")) {
                // Eliminar la propiedad readonly del input monto
                $("#montop").prop("readonly", false);
                // Asignar un valor predeterminado de 1 al campo meses
                meses = 1;
            }
            
            if ($("#ocultp1").hasClass("ocultar")) {
                // Eliminar la propiedad readonly del input monto
                $("#montop").prop("readonly", false);
            }



        }
 
    });
    
}


// Obtener los elementos HTML
const inpMesesp = document.getElementById("mesesp");
const inputMontoVp = document.getElementById("montovp");
const inputMontoOcultop = document.getElementById("montoocultop");

// Agregar un event listener al input de "meses"
inpMesesp.addEventListener("click", function() {
  // Comparar los valores de los inputs "montov" y "montooculto"
  if (inputMontoVp.value !== inputMontoOcultop.value) {
    // Establecer el atributo "readonly" del input "meses"
    inpMesesp.setAttribute("readonly", true);
  } else {
    // Eliminar el atributo "readonly" del input "meses"
    inpMesesp.removeAttribute("readonly");
  }
});


const inpuMesesp = document.getElementById('mesesp');
const inputMontop = document.getElementById('montop');
const inputConceptop = document.getElementById('conceptop');

// Agregar un evento de cambio al input de meses
inpuMesesp.addEventListener('change', function() {
    // Verificar si el valor del input de meses es mayor que 1
    if (this.value > 1 && inputConceptop.value === 'mensualidad') {
        // Hacer que el input de monto sea readonly
        inputMontop.setAttribute('readonly', 'true');
        // Establecer el valor del input de monto a 1
        //inpuMeses.value = 1;
    } else if (inputConceptop.value === 'inscripcion' && this.value === 1) {
        // No establecer el atributo readonly en el input de monto
        inputMontop.removeAttribute('readonly');
    } else {
        // De lo contrario, hacer que el input de monto no sea readonly
        inputMontop.removeAttribute('readonly');
    }
    
});

const firstInputp = document.getElementById("montop");
const secondInputp = document.getElementById("montovp");
const inputMesesp = document.getElementById("mesesp");
const totalMesesp = document.getElementById("mesesvp");

firstInputp.addEventListener("input", function() {
  const firstValuep = parseFloat(firstInputp.value);
  const secondValuep = parseFloat(secondInputp.value);
  

  if (firstValuep > secondValuep) {
    firstInputp.value = secondValuep;
  }

  if (parseInt(inputMesesp.value) >= 2) {
    // Multiplicamos el valor del campo monto por el valor de los meses
    firstInputp.value *= parseFloat(inputMesesp.value);
  }
 
});
inputMesesp.addEventListener("input", function() {
  const firstValuep = parseInt(inputMesesp.value);
  const secondValuep = parseInt(totalMesesp.value);
  const mesActualp = parseInt(inputMesesp.value);
  
  if (firstValuep > secondValuep) {
    inputMesesp.value = secondValuep;
    firstInputp.value = (secondValuep) * parseFloat(secondInputp.value);
  } else {
    firstInputp.value = mesActualp * parseFloat(secondInputp.value);
  }

   
});

















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
                $("#tablas").load(location.href + " #tablas>*", function() {
                    // Reinitialize the DataTable after the content has been loaded
                    $('#tablas').DataTable().destroy();
                    $('#tablas').DataTable({
                        
                      language: {
                        "decimal": ",",
                        "thousands": ".",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "search": "Buscar:",
                        "paginate": {
                          "first": "Primero",
                          "last": "Último",
                          "next": "Siguiente",
                          "previous": "Anterior"
                        }
                      }
                    });
                  });
            
                  $("#tablas2").load(location.href + " #tablas2>*", function() {
                    // Reinitialize the DataTable after the content has been loaded
                    $('#tablas2').DataTable().destroy();
                    $('#tablas2').DataTable({
                        info: false,                       
                        "paging": false,
                        searching: false // Disable the search functionality
                    });
                  });
          
            
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
//<!---------------------------------------------------------------------------------------------------------------------------->
function validarkeypress(er, e) {
    key = e.keyCode;
    tecla = String.fromCharCode(key);
    a = er.test(tecla);
    if (!a) {
        e.preventDefault();
    }
}
//<!---------------------------------------------------------------------------------------------------------------------------->










//<!---------------------------------------------------------------------------------------------------------------------------->

function validarenvioMM() {
    if (validarkeyup(/^[0-9]{1,5}$/,
    $("#codigoMM"), $("#scodigoMM"), "La ID debe ser en el siguiente formato 0000") == 0) {
        mensaje("La ID debe ser en el siguiente formato 0000");
        return false;

    } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
    $("#tipoMM"), $("#stipoMM"), "El formato puede ser valido") == 0) {
        mensaje("El formato puede ser valido");
        return false;

    } else if (validarkeyup(/^[0-9-]{1,11}$/,
    $("#m_montosMM"), $("#sm_montosMM"), "El formato puede ser 0000") == 0) {
        mensaje("El formato puede ser 0000");
        return false;

    } else if (validarkeyup(/^[0-9-]{1,11}$/,
    $("#d_montosMM"), $("#sd_montosMM"), "El formato puede ser 0000") == 0) {
        mensaje("El formato puede ser 0000");
        return false;

    }
    return true;
}
//<!---------------------------------------------------------------------------------------------------------------------------->


//<!---------------------------------------------------------------------------------------------------------------------------->

    function validarenvio() {
        if (validarkeyup(/^[0-9]{1,5}$/,
        $("#id_deudas"), $("#sid_deudas"), "La ID debe ser en el siguiente formato 0000") == 0) {
            mensaje("La ID debe ser en el siguiente formato 0000");
            return false;
    
        } else if (validarkeyup(/^[0-9-]{1,11}$/,
        $("#monto"), $("#smonto"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        } else if (validarkeyup(/^[0-9-]{4,11}$/,
        $("#identificador"), $("#sidentificador"), "El formato puede ser 0000") == 0) {
            mensaje("El formato puede ser 0000");
            return false;

        }  else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#concepto"), $("#sconcepto"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $("#forma"), $("#sforma"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $("#estado"), $("#sestado"), "El formato debe ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        }  else if (validarkeyup(/^[1-9]{1,2}$/,
        $("#meses"), $("#smeses"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        } 
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->










//<!---------------------------------------------------------------------------------------------------------------------------->
    function validarenvio2() {
        if (validarkeyup(/^[0-9]{1,5}$/,
        $("#id_deudasr"), $("#sid_deudasr"), "La ID debe ser en el siguiente formato 0000") == 0) {
            mensaje("La ID debe ser en el siguiente formato 0000");
            return false;
    
        }  else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#conceptor"), $("#sconceptor"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $("#formar"), $("#sformar"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[0-9-]{1,11}$/,
        $("#montor"), $("#smontor"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;
            
        } else if (validarkeyup(/^[0-9-]{4,11}$/,
        $("#identificadorr"), $("#sidentificadorr"), "El formato puede ser 0000") == 0) {
            mensaje("El formato puede ser 0000");
            return false;

        } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $("#estador"), $("#sestador"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;

        }  else if (validarkeyup(/^[1-9]{1,2}$/,
        $("#mesesr"), $("#smesesr"), "El formato puede ser valido") == 0) {
            mensaje("El formato puede ser valido");
            return false;
            
        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->








//<!---------------------------------------------------------------------------------------------------------------------------->
    function validarenvio1() {
        if (validarkeyup(/^[0-9]{1,5}$/,
        $("#id_deudasM"), $("#sid_deudasM"), "La ID debe ser en el siguiente formato 0000") == 0) {
            mensaje("La ID debe ser en el siguiente formato 0000");
            return false;
    
        } else if (validarkeyup(/^[0-9-]{1,11}$/,
        $("#montoM"), $("#smontoM"), "El formato puede ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[0-9-]{4,11}$/,
        $("#identificadorM"), $("#sidentificadorM"), "El formato puede ser 0000.00") == 0) {
            mensaje("El formato puede ser 0000");
            return false;

        }  else if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#conceptoM"), $("#sconceptoM"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[-A-Za-z\s]{4,25}$/,
        $("#formaM"), $("#sformaM"), "El formato debe ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
        $("#estadoM"), $("#sestadoM"), "El formato puede ser valido") == 0) {
            mensaje("El formato debe ser valido");
            return false;

        } 
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


//<!---------------------------------------------------------------------------------------------------------------------------->
function validarenviop() {

    if (validarkeyup(/^[0-9]{1,5}$/,
    $("#idp"), $("#sidp"), "La ID debe ser en el siguiente formato 0000") == 0) {
        mensaje("La ID debe ser en el siguiente formato 0000");
        return false;

    } else if (validarkeyup(/^[0-9]{1,5}$/,
    $("#id_deudasp"), $("#sid_deudasp"), "La ID debe ser en el siguiente formato 0000") == 0) {
        mensaje("La ID debe ser en el siguiente formato 0000");
        return false;

    } else if (validarkeyup(/^[0-9-]{4,11}$/,
    $("#identificadorp"), $("#sidentificadorp"), "El formato puede ser 0000.00") == 0) {
        mensaje("El formato puede ser 0000");
        return false;

    } else if (validarkeyup(/^[A-Za-z]{4,20}$/,
    $("#conceptop"), $("#sconceptop"), "El formato debe ser valido") == 0) {
        mensaje("El formato debe ser valido");
        return false;

    } else if (validarkeyup(/^[-A-Za-z\s]{4,25}$/,
    $("#formap"), $("#sformap"), "El formato debe ser valido") == 0) {
        mensaje("El formato debe ser valido");
        return false;

    } else if (validarkeyup(/^[0-9-]{1,11}$/,
    $("#montop"), $("#smontop"), "El formato puede ser valido") == 0) {
        mensaje("El formato debe ser valido");
        return false;

    }  else if (validarkeyup(/^[1-9]{1,2}$/,
    $("#mesesp"), $("#smesesp"), "El formato puede ser valido") == 0) {
        mensaje("El formato puede ser valido");
        return false;

    } else if (validarkeyup(/^[A-Za-z\s]{4,20}$/,
    $("#estadop"), $("#sestadop"), "El formato puede ser valido") == 0) {
        mensaje("El formato puede ser valido");
        return false;

    }  else if (validarkeyup(/^[0-9]{1,2}$/,
    $("#estado_pagosp"), $("#sestado_pagosp"), "El formato puede ser valido") == 0) {
        mensaje("El formato puede ser valido");
        return false;

    } else if (validarkeyup(/^[0-9]{1,2}$/,
    $("#estatusp"), $("#sestatusp"), "El formato puede ser valido") == 0) {
        mensaje("El formato puede ser valido");
        return false;

    } 
    return true;
}
//<!---------------------------------------------------------------------------------------------------------------------------->
mibuscador
const input1 = document.getElementById("identificador");
const input2 = document.getElementById("monto");
const input3 = document.getElementById("meses");
const input4 = document.getElementById("identificadorr");
const input5 = document.getElementById("montor");
const input6 = document.getElementById("mesesr");
const input7 = document.getElementById("identificadorM");
const input8 = document.getElementById("montoM");
const input9 = document.getElementById("d_montosMM");
const input10 = document.getElementById("mesesp");
const input11 = document.getElementById("montop");
const input12 = document.getElementById("identificadorp");



// Función para limitar la longitud del valor
const limitarLongitud = (input, maxLength) => {
  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength); // Limita el valor al máximo permitido
  }
};

input1.addEventListener("input", () => {
  const maxLength = 11; // Cambia este valor al límite máximo deseado
  limitarLongitud(input1, maxLength);
});
  
input2.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input2, maxLength);
});
input3.addEventListener("input", () => {
    const maxLength = 2; // Cambia este valor al límite máximo deseado
    limitarLongitud(input3, maxLength);
  });
    
input4.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input4, maxLength);
});

input5.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input5, maxLength);
  });

  input6.addEventListener("input", () => {
    const maxLength = 2; // Cambia este valor al límite máximo deseado
    limitarLongitud(input6, maxLength);
  });

  input7.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input7, maxLength);
  });

  input8.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input8, maxLength);
  });
 
  input9.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input9, maxLength);
  });

  input10.addEventListener("input", () => {
    const maxLength = 2; // Cambia este valor al límite máximo deseado
    limitarLongitud(input10, maxLength);
  });

  input11.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input11, maxLength);
  });
  
  input12.addEventListener("input", () => {
    const maxLength = 11; // Cambia este valor al límite máximo deseado
    limitarLongitud(input12, maxLength);
  });





