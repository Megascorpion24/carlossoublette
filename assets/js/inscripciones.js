var seleccione='<?php if(!empty($consuta1)){echo $consuta1;}?>';
$(document).ready(function () {




    $('#sanggre2').select2({
        dropdownParent: $('#addEmployeeModalPre')
    });
    $('#mibuscador01').select2({
        dropdownParent: $('#addEmployeeModalPre')
    });
    $('#mibuscador').select2({
        dropdownParent: $('#addEmployeeModal')
    });
    $('#mibuscador222').select2({
        dropdownParent: $('#addEmployeeModal')
    });

    $('#cedularp').select2({
        dropdownParent: $('#addEmployeeModalPre')
    });

    $('#mibuscador2').select2({
        dropdownParent: $('#addEmployeeModal')
    });

    $('#mibuscador3').select2({
        dropdownParent: $('#addEmployeeModal')
    });

    $('#mibuscador4').select2({
        dropdownParent: $('#editEmployeeModal')
    });
    $('#mibuscadorp').select2({
        dropdownParent: $('#addEmployeeModalPre')
    });
 
    $("#registrar").on("click", function () {
        if ($("#cedula").text() != "") {

            if ($("#atras").text() == "") {
                $("#contenido").prepend(`<button type="button" class="btn btn-secondary ocultar"  onclick="atras()" id="atras">atras</button>`);

            }

            $("#cancelar").addClass("ocultar");
            $("#atras").removeClass("ocultar");
            $("#siguiente2").removeClass("ocultar");
            $("#registrar").addClass("ocultar");
            if ($("#siguiente2").text() == "") {
                $("#contenido").append(`<button type="button" class="btn btn-light " onclick="siguiente()" id="siguiente2">siguiente</button>`);

            }

            mostrar("#2", "#II");
        }



    });

    $("#ano").on('change', function() {
        $("#inpF8").val($("#ano").val());
        enviaAjax3($("#8"));
      })



    $("#registrar2").on("click", function () {
        

        $("#cedula1").removeAttr("disabled");
        var publicKey = `-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl/s/lMg8oJcuiz4vRlYu
    Q96OFjlwhIy/cpEXgYxtr/NV47BNISKv+4L0IulDkcYsTj8YjuCX6dZV0dy60yOr
    MxTVWb162pfVvOQmHDzB4OUQGy+ksjvuUFnpmZ20vY7BzWIp2a2esBluiHAnAz8I
    rWmZvgok6iaOunkcdmfbb88ZYnPucPIy0g0f1ndQgs9oRQ4VdNC6fQYyH3gZMBHf
    fy8naxxpz8ew8CT2bM1QbLZUWVsB3ISn7zge3+GzIgUn8s2DolSlZ1/DCEVhf1sA
    Ok9k828PnOT4EW/L++7I+JlZ5ExuEXLm45zccpoKrwDllrbDjVTtVo3ASmeE5jJU
    gQIDAQAB
    -----END PUBLIC KEY-----`;
    var cedula1 = $('#cedula1').val();
    var nombre1 = $('#nombre1').val();
    var apellido3 = $('#apellido3').val();
    var edad1 = $('#edad1').val();

                var encrypt = new JSEncrypt();
                encrypt.setPublicKey(publicKey);
        
                var encryptedcedula1 = encrypt.encrypt(cedula1);
                var encryptednombre1 = encrypt.encrypt(nombre1);
                var encryptedapellido3 = encrypt.encrypt(apellido3);
                var encryptededad1 = encrypt.encrypt(edad1);

                

                $('#cedula1').val(encryptedcedula1);
                $('#nombre1').val(encryptednombre1);
                $('#apellido3').val(encryptedapellido3);
                $('#edad1').val(encryptededad1);

        enviaAjax($("#f2"));
        $("#f2S").trigger("reset");
        $("#editEmployeeModal").modal("hide");




    });

    $("#registrarp").on("click", function () {
        

        $("#cedulap").removeAttr("disabled");
        var publicKey = `-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl/s/lMg8oJcuiz4vRlYu
    Q96OFjlwhIy/cpEXgYxtr/NV47BNISKv+4L0IulDkcYsTj8YjuCX6dZV0dy60yOr
    MxTVWb162pfVvOQmHDzB4OUQGy+ksjvuUFnpmZ20vY7BzWIp2a2esBluiHAnAz8I
    rWmZvgok6iaOunkcdmfbb88ZYnPucPIy0g0f1ndQgs9oRQ4VdNC6fQYyH3gZMBHf
    fy8naxxpz8ew8CT2bM1QbLZUWVsB3ISn7zge3+GzIgUn8s2DolSlZ1/DCEVhf1sA
    Ok9k828PnOT4EW/L++7I+JlZ5ExuEXLm45zccpoKrwDllrbDjVTtVo3ASmeE5jJU
    gQIDAQAB
    -----END PUBLIC KEY-----`;
    var cedula1 = $('#cedulap').val();
    var nombre1 = $('#nombrep').val();
    var apellido3 = $('#apellidop').val();
    var edad1 = $('#edadp').val();

                var encrypt = new JSEncrypt();
                encrypt.setPublicKey(publicKey);
        
                var encryptedcedula1 = encrypt.encrypt(cedula1);
                var encryptednombre1 = encrypt.encrypt(nombre1);
                var encryptedapellido3 = encrypt.encrypt(apellido3);
                var encryptededad1 = encrypt.encrypt(edad1);

                

                $('#cedulap').val(encryptedcedula1);
                $('#nombrep').val(encryptednombre1);
                $('#apellidop').val(encryptedapellido3);
                $('#edadp').val(encryptededad1);

        enviaAjax($("#fp"));
        $("#fp").trigger("reset");
        $("#addEmployeeModalPre").modal("hide");




    });


    $("#cancelar").on("click", function () {

        $("#contenido2 div div").text("");
        $("#registrar").removeClass("btn-success");
        $("#registrar").addClass("btn-light");
        $("#mibuscador").val("seleccionar");


    });




    /*validaciones para registrar*/


    $("#cedulae").on("keypress", function (e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedulae").on("keyup", function () {
        validarkeyup(/^[0-9]{6,8}$/,
            $(this), $("#scedulae"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombree").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombree").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,15}$/,
            $(this), $("#snombree"), "El formato puede ser A-Z a-z 4-15");
    });

    $("#apellidoe").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellidoe").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,15}$/,
            $(this), $("#sapellidoe"), "El formato puede ser A-Z a-z 4-15");
    });

    $("#edade").on("keypress", function (e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#edade").on("keyup", function () {
        validarkeyup(/^[0-9]{1,2}$/,
            $(this), $("#sedade"), "El formato debe ser solo numeros");
    });

    $("#observacionese").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#observacionese").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#sobservacionese"), "El formato puede ser A-Z a-z 8-26");
    });



    $("#sangre").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#sangre").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#ssangre"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#vacunas").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#vacunas").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#svacunas"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#operaciones").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#operaciones").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#soperaciones"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#enfermedades").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#enfermedades").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#senfermedades"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#medicamentos").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#medicamentos").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#smedicamentos"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#alerias").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#alerias").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#salerias"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#tratamiento").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#tratamiento").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#stratamiento"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#condicion").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#condicion").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#scondicion"), "El formato puede ser A-Z a-z 8-26");
    });


  
    /*aqui termina registrar*/
    $("#cedula1").on("keypress", function (e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedula1").on("keyup", function () {
        validarkeyup(/^[0-9]{6,10}$/,
            $(this), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombre1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombre1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,15}$/,
            $(this), $("#snombre1"), "El formato puede ser A-Z a-z 4-15");
    });

    $("#apellido3").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellido3").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,15}$/,
            $(this), $("#sapellido3"), "El formato puede ser A-Z a-z 4-15");
    });

    $("#edad1").on("keypress", function (e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#edad1").on("keyup", function () {
        validarkeyup(/^[0-9]{1,2}$/,
            $(this), $("#sedad1"), "El formato debe ser solo numeros");
    });

    $("#observaciones3").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#observaciones3").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#sobservaciones3"), "El formato puede ser A-Z a-z 4-26");
    });



    $("#sangre1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#sangre1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,10}$/,
            $(this), $("#ssangre1"), "El formato puede ser A-Z a-z 4-10");
    });

    $("#vacunas1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#vacunas1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#svacunas1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#operaciones1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#operaciones1").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#soperaciones1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#enfermedades1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#enfermedades1").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#senfermedades1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#medicamentos1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#medicamentos1").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#smedicamentos1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#alerias1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#alerias1").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#salerias1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#tratamiento1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#tratamiento1").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#stratamiento1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#condicion1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#condicion1").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#scondicion1"), "El formato puede ser A-Z a-z 8-26");
    });

    /**/

    $("#cedularp").on("keypress", function (e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedularp").on("keyup", function () {
        validarkeyup(/^[0-9]{6,10}$/,
            $(this), $("#scedularp"), "La Cedula debe ser en el siguiente formato 00000000");
    });
    $("#cedulap").on("keypress", function (e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedulap").on("keyup", function () {
        validarkeyup(/^[0-9]{6,10}$/,
            $(this), $("#scedulap"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombrep").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombrep").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,15}$/,
            $(this), $("#snombrep"), "El formato puede ser A-Z a-z 4-15");
    });

    $("#apellidop").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellidop").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,15}$/,
            $(this), $("#sapellidop"), "El formato puede ser A-Z a-z 4-15");
    });

    $("#edadp").on("keypress", function (e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#edadp").on("keyup", function () {
        validarkeyup(/^[0-9]{1,2}$/,
            $(this), $("#sedadp"), "El formato debe ser solo numeros");
    });

    $("#observacionesp").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#observacionesp").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#sobservacionesp"), "El formato puede ser A-Z a-z 4-26");
    });



    $("#sangrep").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#sangrep").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,10}$/,
            $(this), $("#ssangrep"), "El formato puede ser A-Z a-z 4-10");
    });

    $("#vacunasp").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#vacunasp").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#svacunasp"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#operacionesp").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#operacionesp").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#soperacionesp"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#enfermedadesp").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#enfermedadesp").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#senfermedadesp"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#medicamentosp").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#medicamentosp").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#smedicamentosp"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#aleriasp").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#aleriasp").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#saleriasp"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#tratamientop").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#tratamientop").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#stratamientop"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#condicionp").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z\s]$/, e);

    });

    $("#condicionp").on("keyup", function () {
        validarkeyup(/^[A-Za-z\s]{4,26}$/,
            $(this), $("#scondicionp"), "El formato puede ser A-Z a-z 8-26");
    });



    $("#cedulae").on("keyup",function(){
        var codigo = $(this).val();

        if(codigo != $(this).find("th:eq(0)").text()){
            $("#laveC").text("cedula");
            $("#nombree").removeAttr("readonly");
            $("#apellidoe").removeAttr("readonly");
            $("#edade").removeAttr("readonly");
            $("#materiae").removeAttr("readonly");
            $("#observacionese").removeAttr("readonly");
            morocidad("#cedulae");
        }

        
        $("#tabla tr").each(function(){



            if(codigo === $(this).find("th:eq(0)").text()){
                $("#laveC").text("cedula registrada");
                $("#nombree").attr("readonly","readonly");
                $("#apellidoe").attr("readonly","readonly");
                $("#edade").attr("readonly","readonly");
                $("#materiae").attr("readonly","readonly");
                $("#observacionese").attr("readonly","readonly");


                

                
            }

           
        });

        
    }); 

    
   
    const input1 = document.getElementById("cedulae");
    const input2 = document.getElementById("nombree");
    const input3 = document.getElementById("apellidoe");
    const input4 = document.getElementById("edade");
    const input5 = document.getElementById("observacionese");

    const input6 = document.getElementById("sangre");
    const input7 = document.getElementById("vacunas");
    const input8 = document.getElementById("operaciones");

    const input9 = document.getElementById("enfermedades");
    const input10 = document.getElementById("medicamentos");
    const input11 = document.getElementById("alerias");
    
    const input12 = document.getElementById("tratamiento");
    const input13 = document.getElementById("condicion");


    const input111 = document.getElementById("cedula1");
    const input22 = document.getElementById("nombre1");
    const input33 = document.getElementById("apellido3");
    const input44 = document.getElementById("edad1");
    const input55 = document.getElementById("observaciones3");

    const input66 = document.getElementById("sangre1");
    const input77 = document.getElementById("vacunas1");
    const input88 = document.getElementById("operaciones1");

    const input99 = document.getElementById("enfermedades1");
    const input101 = document.getElementById("medicamentos1");
    const input112 = document.getElementById("alerias1");
    
    const input123 = document.getElementById("tratamiento1");
    const input134 = document.getElementById("condicion1");


    const input110 = document.getElementById("cedulap");
    const input220 = document.getElementById("nombrep");
    const input330 = document.getElementById("apellidop");
    const input440 = document.getElementById("edadp");
    const input550 = document.getElementById("observacionesp");

    const input660 = document.getElementById("sangrep");
    const input770 = document.getElementById("vacunasp");
    const input880 = document.getElementById("operacionesp");

    const input990 = document.getElementById("enfermedadesp");
    const input1010 = document.getElementById("medicamentosp");
    const input1120 = document.getElementById("aleriasp");
    
    const input1230 = document.getElementById("tratamientop");
    const input1340 = document.getElementById("condicionp");
    
    
    
    
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
        const maxLength = 15; // Cambia este valor al límite máximo deseado
        limitarLongitud(input2, maxLength);
    });
    input3.addEventListener("input", () => {
        const maxLength = 15; // Cambia este valor al límite máximo deseado
        limitarLongitud(input3, maxLength);
      });
        
    input4.addEventListener("input", () => {
        const maxLength = 2; // Cambia este valor al límite máximo deseado
        limitarLongitud(input4, maxLength);
    });
    
    input5.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input5, maxLength);
      });



      input6.addEventListener("input", () => {
        const maxLength = 10; // Cambia este valor al límite máximo deseado
        limitarLongitud(input6, maxLength);
      });
        
    input7.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input7, maxLength);
    });
    
    input8.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input8, maxLength);
      });

      input9.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input9, maxLength);
      });

      input10.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input10, maxLength);
      });

      input11.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input11, maxLength);
      });

      input12.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input12, maxLength);
      });

      input13.addEventListener("input", () => {
        const maxLength = 26; // Cambia este valor al límite máximo deseado
        limitarLongitud(input13, maxLength);
      });




         // Función para limitar la longitud del valor

      
      input111.addEventListener("input", () => {
        const maxLength = 8; // Cambia este valor al límite máximo deseado
        limitarLongitud(input111, maxLength);
      });
        
      input22.addEventListener("input", () => {
          const maxLength = 15; // Cambia este valor al límite máximo deseado
          limitarLongitud(input22, maxLength);
      });
      input33.addEventListener("input", () => {
          const maxLength = 15; // Cambia este valor al límite máximo deseado
          limitarLongitud(input33, maxLength);
        });
          
      input44.addEventListener("input", () => {
          const maxLength = 2; // Cambia este valor al límite máximo deseado
          limitarLongitud(input44, maxLength);
      });
      
      input55.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input55, maxLength);
        });
  
  
  
        input66.addEventListener("input", () => {
          const maxLength = 10; // Cambia este valor al límite máximo deseado
          limitarLongitud(input66, maxLength);
        });
          
      input77.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input77, maxLength);
      });
      
      input88.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input88, maxLength);
        });
  
        input99.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input99, maxLength);
        });
  
        input101.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input101, maxLength);
        });
  
        input112.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input112, maxLength);
        });
  
        input123.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input123, maxLength);
        });
  
        input134.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input134, maxLength);
        });


        
         // Función para limitar la longitud del valor



      
         input110.addEventListener("input", () => {
        const maxLength = 8; // Cambia este valor al límite máximo deseado
        limitarLongitud(input110, maxLength);
      });
        
      input220.addEventListener("input", () => {
          const maxLength = 15; // Cambia este valor al límite máximo deseado
          limitarLongitud(input220, maxLength);
      });
      input330.addEventListener("input", () => {
          const maxLength = 15; // Cambia este valor al límite máximo deseado
          limitarLongitud(input330, maxLength);
        });
          
      input440.addEventListener("input", () => {
          const maxLength = 2; // Cambia este valor al límite máximo deseado
          limitarLongitud(input440, maxLength);
      });
      
      input550.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input550, maxLength);
        });
  
  
  
        input660.addEventListener("input", () => {
          const maxLength = 10; // Cambia este valor al límite máximo deseado
          limitarLongitud(input660, maxLength);
        });
          
      input770.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input770, maxLength);
      });
      
      input880.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input880, maxLength);
        });
  
        input990.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input990, maxLength);
        });
  
        input1010.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input1010, maxLength);
        });
  
        input1120.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input1120, maxLength);
        });
  
        input1230.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input1230, maxLength);
        });
  
        input1340.addEventListener("input", () => {
          const maxLength = 26; // Cambia este valor al límite máximo deseado
          limitarLongitud(input1340, maxLength);
        });


});
function modificar(id, id2) {
    var condicional=1;
    $("#tablas tr").each(function () {
        if (id == $(this).find("th:eq(0)").text() && $(this).find("th:eq(0)").text()=="vacia") {
            condicional=0;
        }
    });
    if (condicional==1) {
        
    
    $("#consulta_estudiantes2 tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
           
            $("#cedula1").val($(this).find("th:eq(0)").text());
            $("#nombre1").val($(this).find("th:eq(1)").text());
            $("#apellido3").val($(this).find("th:eq(2)").text());
            $("#edad1").val($(this).find("th:eq(3)").text());
            $("#materia1").val(id2);
            $("#observaciones3").val($(this).find("th:eq(4)").text());

            $("#tratamiento1").val($(this).find("th:eq(6)").text());
            $("#alerias1").val($(this).find("th:eq(7)").text());
            $("#medicamentos1").val($(this).find("th:eq(8)").text());
            $("#enfermedades1").val($(this).find("th:eq(9)").text());
            $("#operaciones1").val($(this).find("th:eq(10)").text());
            $("#vacunas1").val($(this).find("th:eq(11)").text());

            $("#sangre1").val($(this).find("th:eq(12)").text());
            $("#condicion1").val($(this).find("th:eq(13)").text());





        }
    });
}else{
    $("#cedulap").val($(this).find("th:eq(0)").text());
            $("#nombrep").val($(this).find("th:eq(1)").text());
            $("#apellidop").val($(this).find("th:eq(2)").text());
            $("#edadp").val($(this).find("th:eq(3)").text());
            $("#materiap").val(id2);
            $("#observacionesp").val($(this).find("th:eq(4)").text());

            $("#tratamientop").val($(this).find("th:eq(6)").text());
            $("#aleriasp").val($(this).find("th:eq(7)").text());
            $("#medicamentosp").val($(this).find("th:eq(8)").text());
            $("#enfermedadesp").val($(this).find("th:eq(9)").text());
            $("#operacionesp").val($(this).find("th:eq(10)").text());
            $("#vacunasp").val($(this).find("th:eq(11)").text());

            $("#sangrep").val($(this).find("th:eq(12)").text());
            $("#condicionp").val($(this).find("th:eq(13)").text());
}


}
function morocidad(valu) {
    id = $(valu).val();
    $("#morocidad tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
           alert("no se puede inscribir a este alumno con cedula "+id+" debido a una deuda pendiente");





        }
    });


}


function eliminar(id) {
    $("#cedula3").val(id);
    $("#borrar").on("click", function () {
        var publicKey = `-----BEGIN PUBLIC KEY-----
        MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl/s/lMg8oJcuiz4vRlYu
        Q96OFjlwhIy/cpEXgYxtr/NV47BNISKv+4L0IulDkcYsTj8YjuCX6dZV0dy60yOr
        MxTVWb162pfVvOQmHDzB4OUQGy+ksjvuUFnpmZ20vY7BzWIp2a2esBluiHAnAz8I
        rWmZvgok6iaOunkcdmfbb88ZYnPucPIy0g0f1ndQgs9oRQ4VdNC6fQYyH3gZMBHf
        fy8naxxpz8ew8CT2bM1QbLZUWVsB3ISn7zge3+GzIgUn8s2DolSlZ1/DCEVhf1sA
        Ok9k828PnOT4EW/L++7I+JlZ5ExuEXLm45zccpoKrwDllrbDjVTtVo3ASmeE5jJU
        gQIDAQAB
        -----END PUBLIC KEY-----`;
        var cedula3 = $('#cedula3').val();
    
    
                    var encrypt = new JSEncrypt();
                    encrypt.setPublicKey(publicKey);
            
                    var encryptedcedula3 = encrypt.encrypt(cedula3);
                 
    
                    
    
                    $('#cedula3').val(encryptedcedula3);
                  
        enviaAjax($("#f3"));
    });

}

function añadir() {
    id = $("#mibuscador").val();
    $("#consulta_representantes tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
            $("#cedula").html($(this).find("th:eq(0)").text());
            $("#nombre").html($(this).find("th:eq(1)").text());
            $("#apellido1").html($(this).find("th:eq(3)").text());
            $("#apellido2").html($(this).find("th:eq(8)").text());
            $("#cupos").val($(this).find("th:eq(8)").text());
            $("#pago_inscrip").val($(this).find("th:eq(7)").text());
            $("#telefono").html($(this).find("th:eq(5)").text());
            $("#correo").html($(this).find("th:eq(6)").text());
            morocidad("#mibuscador");


        }
    });

    $("#registrar").removeClass("btn-light");
    $("#registrar").addClass("btn-success");
    
}


function añadir3(valor) {
    if ($("#mibuscador3").val()!="seleccionar") {


        $("#inscri").removeClass("ocultar");
    $("#inscri1").addClass("ocultar");
    $("#inscri").removeClass("btn-light");
    $("#inscri").addClass("btn-success");
    }




}


function añadir2() {
    id = $("#mibuscador2").val();
    var numero=0;
    
    $("#consulta_estudiantes tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
            $("#materiae").val($(this).find("th:eq(5)").text());
            if( $("#materiae").val()=="aprobado"){
            $("#cedulae").val($(this).find("th:eq(0)").text());
            $("#nombree").val($(this).find("th:eq(1)").text());
            $("#apellidoe").val($(this).find("th:eq(2)").text());
            $("#edade").val($(this).find("th:eq(3)").text());
            
            $("#observacionese").val($(this).find("th:eq(4)").text());

     $("#tratamiento").val($(this).find("th:eq(6)").text());
            $("#alerias").val($(this).find("th:eq(7)").text());
            $("#medicamentos").val($(this).find("th:eq(8)").text());
            $("#enfermedades").val($(this).find("th:eq(9)").text());
            $("#operaciones").val($(this).find("th:eq(10)").text());
            $("#vacunas").val($(this).find("th:eq(11)").text());

            $("#sangre").val($(this).find("th:eq(12)").text());
            $("#condicion").val($(this).find("th:eq(13)").text());
            numero = parseInt($(this).find("th:eq(14)").text());
           
                suma=numero+1;
        }
            else{
                $("#cedulae").val($(this).find("th:eq(0)").text());
            $("#nombree").val($(this).find("th:eq(1)").text());
            $("#apellidoe").val($(this).find("th:eq(2)").text());
            $("#edade").val($(this).find("th:eq(3)").text());
            $("#materiae").val($(this).find("th:eq(5)").text());
            $("#observacionese").val($(this).find("th:eq(4)").text());
 $("#tratamiento").val($(this).find("th:eq(6)").text());
            $("#alerias").val($(this).find("th:eq(7)").text());
            $("#medicamentos").val($(this).find("th:eq(8)").text());
            $("#enfermedades").val($(this).find("th:eq(9)").text());
            $("#operaciones").val($(this).find("th:eq(10)").text());
            $("#vacunas").val($(this).find("th:eq(11)").text());

            $("#sangre").val($(this).find("th:eq(12)").text());
            $("#condicion").val($(this).find("th:eq(13)").text());
 
            numero = parseInt($(this).find("th:eq(14)").text());
                suma=numero;
            }







        }

       

    });

    var opciones = $("#mibuscador3 option");
var opcionesFiltradas = opciones.filter(function() {
  return this.text.startsWith(suma+" -");
});
$("#mibuscador3").empty().append(opcionesFiltradas);
$("#mibuscador3").prepend('<option value="seleccionar" selected hidden>-Seleccionar-</option>');



    $("#registrar").removeClass("btn-light");
    $("#registrar").addClass("btn-success");

    $("#siguiente2").removeClass("btn-light");
    $("#siguiente2").addClass("btn-success");
    $("#siguiente2").attr("validado","true");
}





function siguiente() {
    if ($("#siguiente2").attr("validado")!= undefined) {
        

    if ($("#atras2").text() == "") {

        $("#contenido").prepend(`<button type="button" class="btn btn-secondary "  onclick="atras2()" id="atras2">atras</button>`);


    }
    $("#atras2").removeClass("ocultar");
    $("#atras").addClass("ocultar");
    mostrar("#3", "#III");

    $("#siguiente2").addClass("ocultar");

    $("#inscri1").removeClass("ocultar");
    if ( $("#vacunas").val()=="") {
        $("#vacunas").val($("#mibuscador222").val());
    }
    
    if ( $("#sangre").val()=="") {
        $("#sangre").val($("#sanggre").val());
    }
    
}
}

function atras2() {

    $("#inscri1").addClass("ocultar");
    $("#inscri").addClass("ocultar");
    $("#siguiente2").removeClass("ocultar");
    mostrar("#2", "#II")
    $("#atras2").addClass("ocultar");
    $("#atras").removeClass("ocultar");


}

function atras() {
    $("#siguiente2").addClass("ocultar");
    $("#registrar").removeClass("ocultar");
    mostrar("#1", "#I")



}

function enviar() {
    $("cedu").val($("#mibuscador").val());
    chect(1);
    var publicKey = `-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl/s/lMg8oJcuiz4vRlYu
    Q96OFjlwhIy/cpEXgYxtr/NV47BNISKv+4L0IulDkcYsTj8YjuCX6dZV0dy60yOr
    MxTVWb162pfVvOQmHDzB4OUQGy+ksjvuUFnpmZ20vY7BzWIp2a2esBluiHAnAz8I
    rWmZvgok6iaOunkcdmfbb88ZYnPucPIy0g0f1ndQgs9oRQ4VdNC6fQYyH3gZMBHf
    fy8naxxpz8ew8CT2bM1QbLZUWVsB3ISn7zge3+GzIgUn8s2DolSlZ1/DCEVhf1sA
    Ok9k828PnOT4EW/L++7I+JlZ5ExuEXLm45zccpoKrwDllrbDjVTtVo3ASmeE5jJU
    gQIDAQAB
    -----END PUBLIC KEY-----`;
    var cedulae = $('#cedulae').val();
    var nombree = $('#nombree').val();
    var apellidoe = $('#apellidoe').val();
    var edade = $('#edade').val();

                var encrypt = new JSEncrypt();
                encrypt.setPublicKey(publicKey);
        
                var encryptedcedulae = encrypt.encrypt(cedulae);
                var encryptednombree = encrypt.encrypt(nombree);
                var encryptedapellidoe = encrypt.encrypt(apellidoe);
                var encryptededade = encrypt.encrypt(edade);

                

                $('#cedulae').val(encryptedcedulae);
                $('#nombree').val(encryptednombree);
                $('#apellidoe').val(encryptedapellidoe);
                $('#edade').val(encryptededade);

              

    enviaAjax($("#f"));

    chect2(1);

    $("#f").trigger("reset");
    $("#addEmployeeModal").modal("hide");
    mostrar("#1", "#I");
    $("#inscri").addClass("ocultar");
    $("#atras2").addClass("ocultar");
    $("#registrar").removeClass("ocultar");

    $("#contenido2 div div").text("");
        $("#registrar").removeClass("btn-success");
        $("#registrar").addClass("btn-light");
        $("#mibuscador").val("seleccionar");

        $("#siguiente2").addClass("btn-light");
        $("#siguiente2").removeClass("btn-success val");
        $("#siguiente2").removeAttr("validado");

        chect(0);



    


}

function enviaAjax(datos) {

    $.ajax({
        url: '',
        type: 'POST',
        data: datos.serialize(),
        beforeSend: function () {

        },

        success: function (respuesta) {
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
        },
        error: function (request, status, err) {
            if (status == "timeout") {
                mensaje("Servidor ocupado, intente de nuevo");
            } else {
                mensaje("ERROR: <br/>" + request + status + err);
            }
        },
        complete: function () {

        }

    });

}
function enviaAjax3(datos) {

    $.ajax({
        url: '',
        type: 'POST',
        data: datos.serialize(),
        beforeSend: function () {

        },

        success: function (respuesta) {
          $("#tabla").html(respuesta);
            
        },
        error: function (request, status, err) {
            if (status == "timeout") {
                mensaje("Servidor ocupado, intente de nuevo");
            } else {
                mensaje("ERROR: <br/>" + request + status + err);
            }
        },
        complete: function () {

        }

    });

}

function mostrar(variable, tap) {
    $(variable).removeClass('ocultar');
    $(tap).addClass('active');


    if (variable == "#1") {
        if ($("#cedula").text() != "") {
            $("#registrar").removeClass("btn-light");
            $("#registrar").addClass("btn-success");
        }
        $("#atras").addClass("ocultar");
        $("#cancelar").removeClass("ocultar");
        $("#II").removeClass('active');
        $("#III").removeClass('active');
        $("#2").addClass('ocultar');
        $("#3").addClass('ocultar');
    }
    if (variable == "#2") {
        if ($("#cedula").html != "") {
            /*$("#registrar").removeClass("btn-light");
            $("#registrar").addClass("btn-success");*/
        }
        $("#I").removeClass('active');
        $("#III").removeClass('active');
        $("#1").addClass('ocultar');
        $("#3").addClass('ocultar');
    }
    if (variable == "#3") {
        /*
        if($("#cedula").html!=""){
            $("#registrar").removeClass("btn-light");
            $("#registrar").addClass("btn-success");
        }*/
        $("#II").removeClass('active');
        $("#I").removeClass('active');
        $("#2").addClass('ocultar');
        $("#1").addClass('ocultar');
    }
}

function enviaAjax2(datos) {

    $.ajax({
        url: '',
        type: 'POST',
        data: datos.serialize(),
        beforeSend: function () {

        },

        success: function (respuesta) {
            $("#tabla").html(respuesta);

        },
        error: function (request, status, err) {
            if (status == "timeout") {
                mensaje("Servidor ocupado, intente de nuevo");
            } else {
                mensaje("ERROR: <br/>" + request + status + err);
            }
        },
        complete: function () {

        }

    });

}



function validarkeyup(er, etiqueta, etiquetamensaje,
    mensaje) {
    a = er.test(etiqueta.val());
    if (a) {
        etiquetamensaje.text("");
        return 1;
    } else {
        etiquetamensaje.text(mensaje);
        setTimeout(function () {
            etiquetamensaje.text("");
        }, 2000);
        if (!vacio()) {
            $("#siguiente2").addClass("btn-light");
        $("#siguiente2").removeClass("btn-success val");
        $("#siguiente2").removeAttr("validado");
        }

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

    if (vacio()) {
        $("#siguiente2").removeClass("btn-light");
        $("#siguiente2").addClass("btn-success");
        $("#siguiente2").attr("validado","true");
    }

        



}

function vacio(){
    if ($("#cedulae").val()=="") {
        return false;
    }else if ($("#nombree").val()=="") {
        return false;
    }else if ($("#apellidoe").val()=="") {
        return false;
    }else if ($("#edade").val()=="") {
        return false;
    }else if ($("#observacionese").val()=="") {
        return false;
    }else if ($("#sanggre").val()=="seleccionar") {
        return false;
    }else if ($("#mibuscador222").val()=="") {
        return false;
    }else if ($("#operaciones").val()=="") {
        return false;
    }else if ($("#enfermedades").val()=="") {
        return false;
    }else if ($("#medicamentos").val()=="") {
        return false;
    }else if ($("#alerias").val()=="") {
        return false;
    }else if ($("#tratamiento").val()=="") {
        return false;
    }else if ($("#condicion").val()=="") {
        return false;
    }
    return true;
    
}


function chect(valo) {

    if (valo == 0) {

        $("#estudiante").val("1");
    }

    $("#mibuscador2").attr("disabled", "disabled");
    $("#materiae").removeAttr("disabled");
    $("#cedulae").removeAttr("disabled");
    $("#nombree").removeAttr("disabled");
    $("#apellidoe").removeAttr("disabled");
    $("#edade").removeAttr("disabled");
    $("#observacionese").removeAttr("disabled");
    if (valo == 0) {
        $("#cedulae").val("");
                $("#nombree").val("");
                $("#apellidoe").val("");
                $("#edade").val("");
                $("#materiae").val("");
                $("#observacionese").val("");

                $("#sangre").val("");
                $("#vacunas").val("");
                $("#operaciones").val("");
                $("#enfermedades").val("");
                $("#medicamentos").val("");
                $("#alerias").val("");
                $("#tratamiento").val("");
                $("#condicion").val("");

                $("#mibuscador3").load(location.href + " #mibuscador3>*", "");
                

                $("#siguiente2").addClass("btn-light");
                $("#siguiente2").removeAttr("btn-success");
                $("#siguiente2").removeAttr("validado");
                $("#medico").removeClass("ocultar");
    }
                




}

function chect2(valo) {
    if (valo == 0) {

        $("#estudiante").val("0")
    }

    $("#mibuscador2").removeAttr("disabled");

    $("#cedulae").attr("disabled", "disabled");
    $("#medico").addClass("ocultar");

    $("#nombree").attr("disabled", "disabled");
    $("#apellidoe").attr("disabled", "disabled");
    $("#edade").attr("disabled", "disabled");
    $("#observacionese").attr("disabled", "disabled");


}


function validarenvio() {
    if (validarkeyup(/^[0-9]{6,10}$/,
        $("#cedula"), $("#scedula"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
        mensaje("<p>La Cedula debe ser en el siguiente formato 00000000");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre"), $("#snombre"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
        return false;

    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#apellido"), $("#sapellido"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
        return false;
    }
    else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#categoria"), $("#scategoria"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
        return false;

    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#especializacion"), $("#sespecializacion"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#profecion"), $("#sprofecion"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
        return false;

    } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#edad"), $("#sedad"), "La edad debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#años"), $("#saños"), "Los años debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo"), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#direccion"), $("#sdireccion"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (valfecha($("#fecha"), $("#sfecha")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    return true;
}

function validarenvio1() {
    if (validarkeyup(/^[0-9]{6,10}$/,
        $("#cedula1"), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
        mensaje("<p>La Cedula debe ser en el siguiente formato 00000000");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre1"), $("#snombre1"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
        return false;

    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#apellido1"), $("#sapellido1"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
        return false;
    }
    else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#categoria1"), $("#scategoria1"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
        return false;

    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#especializacion1"), $("#sespecializacion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#profecion1"), $("#sprofecion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
        return false;

    } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#edad1"), $("#sedad1"), "La edad debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#años1"), $("#saños1"), "Los años debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo1"), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#direccion1"), $("#sdireccion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (valfecha($("#fecha1"), $("#sfecha1")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    return true;
}




function valfecha(fecha, sfecha) {
    fechaq = fecha.val();
    if (fechaq == '') {
        sfecha.text("seleccione una fecha");
        setTimeout(function () {
            sfecha.text("");
        }, 3000);
        return false;
    } else {
        return true;
    }



}