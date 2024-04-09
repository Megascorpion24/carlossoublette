
// -----------------------CONSULTA SI EXISTE AL REGISTRAR--------------------------
function PrimerValordeSeccion(){
    
    setTimeout(()=>{
        // Obtener el valor del atributo "value" del primer option
        seccion = $("#secciones option:first").val();
    },300)
    
} 
// ---------------
 

// *? NOTA: Depende aqui de las variables de EventListener.js
var existe;//necesario para Validate.js

function consulta_existe(seccion, año){
    
    var ano_academico= $('#ano_academico').val();
// console.log(ano_academico);

     $.ajax({
    url: 'controlador/ajax/seccion_consulta.php',
    type: 'POST',
    data: {ajaxPet: true, 
             nombre: seccion,
             ano: año, 
             acad: ano_academico, 
             action: 'existe'},

            success: function(respuesta) {
              console.log("¿Existe? : " + respuesta);

            if (respuesta == 1) {
            $('#existe_msj').text('Ya Existe la Seccion con ese Año');
                existe=1;
            } 
            else{
            $('#existe_msj').text('');
                existe=0;
            }

        }
    });
}

// -----------------------------------------------------------------------------------------------------------------------
// -----------------------CONSULTA SI EXISTE AL EDITAR------------------------------------------
  

function ConsultarSelect_Seccion(){
   //Consulta al camibar un valor en input seccion

       if (seccion_edit != seccion_value && año_edit != año_value) {
           //  console.log("1ra opccion");
            consulta_existe2(seccion_edit, año_edit);
         }
          else if(seccion_edit != seccion_value && año_edit == año_value){
             //  console.log("2da option");
             consulta_existe2(seccion_edit, año_value);
            }
              else{
                // console.log("3ra opccion");
                consulta_existe2(seccion_value, año_edit);//año_edit es la q varia de == ó !=
                 }
}
// ----------
 
function ConsultarSelect_Año() {
 //Consulta al camibar un valor en input seccion

 if ( año_edit != año_value && seccion_edit != seccion_value ) {
     console.log("1ra opccion");
     consulta_existe2(seccion_edit,año_edit);
  }
   else if( año_edit != año_value && seccion_edit == seccion_value){
       console.log("2da option");
      consulta_existe2(seccion_value,año_edit);
     }
       else{
         console.log("3ra opccion");
         consulta_existe2(seccion_edit, año_value);//seccion_edit es la q varia de == ó !=
          }
}


var existe2; 
function consulta_existe2(nombre_seccion, año_seleccionado){
     $.ajax({
    url: 'controlador/ajax/seccion_consulta.php',
    type: 'POST',
    data: {ajaxPet: true,
        nombre: nombre_seccion,
        ano: año_seleccionado, 
        acad: año_academico_M,
        action: 'existe'},
    success: function(respuesta) {
        console.log(respuesta);
        // console.log(nombre_seccion +" --- "+ año_seleccionado);        
        
        if (respuesta === "1") {
             
            // console.log("Los datos son los registrados");
            // console.log("Valor de nombre_seccion: " + nombre_seccion);
            // console.log("Valor de seccion_value: " + seccion_value);
            // console.log("Valor de año_seleccionado: " + año_seleccionado);
            // console.log("Valor de año_vañue: " + año_value);

            if (nombre_seccion ===  seccion_value &&  año_seleccionado === año_value) {
            $('#existe_msj2').text('');
                $('#existe_msj3').text('La Seccion y el Año son los registrados');
                 setTimeout(function() {
                $('#existe_msj3').text("");
                }, 2000);   
                existe2 = 0;
            } else {
            $('#existe_msj3').text('');
                $('#existe_msj2').text('Ya Existe la Seccion con ese Año');
                existe2 = 1;
            }
        } else { 
            $('#existe_msj2').text('');
            $('#existe_msj3').text('');
            existe2 = 0;
        }
        

        }
});
}

