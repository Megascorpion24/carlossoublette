$(document).ready(function() {

 
    CargarDataTable();
   

   $("#registrar").on("click", function() {
       

       if (validarenvio()) { 
           // console.log("se valido todo");
            console.log($('#f').serializeArray());
             enviaAjax($("#f")); 

             $('#addEmployeeModal').modal('hide');
             $('#f').trigger('reset');
           $("#docentes").val(null).trigger("change");
           año="";
           nombre_Materia="";
              //  nombre_valor="";
              //  seleccionado="";
               existe="";
           }
   }); 

   //editar
   $("#editar").on("click", function() {

       if (validarEdit()) { 
           // console.log("se valido edit");
       console.log($('#f2').serializeArray());

             enviaAjax($("#f2"));
             $('#editEmployeeModal').modal('hide');
           $('#f2').trigger('reset');
           $("#docentes1").val(null).trigger("change");
           
           nombre_materia_edit="";
           año_edit="";
           existe2="";
           $('#existe_msj2').text('');
           $('#existe_msj3').text(''); 

             }
   });
   


$(".js-example-placeholder-multiple").select2({
   placeholder: "Select a state",
   maximumSelectionLength: 6 // Limita a un máximo de 6 selecciones
 });


 Consulta_materia();//llenar
});