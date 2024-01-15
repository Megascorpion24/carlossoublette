$(document).ready(function() { 
    
    
    console.log(location.href);
    

  
  







    $("#respaldo").on("click", function() {
        
        if (validarenvio()) {
            enviaAjax($("#f"));
            
         
        }
        

    });

    $("#restaurar").on("click", function() {
        if (validarenvio2()) {
          
            enviaAjax($("#f2"));
       
            
        }
   

    });
    
    


//<!---------------------------------------------------------------------------------------------------------------------------->









//<!---------------------------------------------------------------------------------------------------------------------------->











});





//<!---------------------------------------------------------------------------------------------------------------------------->





    

//<!---------------------------------------------------------------------------------------------------------------------------->



    

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






    







//<!---------------------------------------------------------------------------------------------------------------------------->




   
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    