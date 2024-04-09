 
// --------------CARGA SE SECCIONES POR AJAX------------------
function abc(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'abc'},
    
                success: function(respuesta) {
                
                    $('#secciones').html(respuesta);//MODAL DE REGISTRAR
                    $('#secciones1').html(respuesta);//MODAL EDITAR

                   //------Filtro de Seccion----
                    setTimeout(()=>{
                        $('#secciones-filter').html(`
                        <option value="">todo</option>
                        ${respuesta} `);    

                        AgregaSelect();//filtro seccion
                    }, 150);
  

            }
        });

    }

abc();

// -------------ABECEDARIO----------------

function abc2(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'abc2'},
    
                success: function(respuesta) {
            
                    $('#sec').html(respuesta);//Select multiple

                    $('#exampleModalCenter').on('hidden.bs.modal', function () {
                        $('#sec').html('');
                        $('#sec').html(respuesta);
                    });
            }
        });

    }

abc2();

// --------------------------CARGA SE DOCENTE POR AJAX-----------------------
function Doc_Guia2(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'doc_guia'},
    
                success: function(respuesta) {
                    // MODAL DE REGISTRO
                    $('#Doc_Guia').html(`
                    <option value="0" selected disabled hidden>-Seleccionar-</option>
                    ${respuesta}
                `);

            }
        });
}
Doc_Guia2();

// ----

function Doc_Guia3(){
    $.ajax({
        url: 'controlador/ajax/seccion_consulta.php',
        type: 'POST',
        data: {ajaxPet: true,
                 action: 'doc_guia_edit'},
    
                success: function(respuesta) {
                    //MODAL DE EDITAR
                $('#E_Guia').html(respuesta);

            }
        });
}
Doc_Guia3();
