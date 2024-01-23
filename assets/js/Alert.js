          
function Alerta_Registrar(titulo) {
    Swal.fire({
       // position: 'top-end',
        icon: "success",
        title: titulo,
        showConfirmButton: false,
        timer: 1300,
        customClass: {
            popup: 'small-swal2-popup'
        } 
    });
}
//<!---------------------------------------------------------------------------------------------------------------------------->

function Alerta_Modificar(titulo) {
    Swal.fire({
       // position: 'top-end',
        imageUrl: "assets/icon/icons8-pencil.gif",
        title: titulo,
        showConfirmButton: false,
        timer: 1300,
        customClass: {
            popup: 'small-swal2-popup',

        },
    });
}

function Alerta_er(titulo) {
    Swal.fire({
       // position: 'top-end',
        icon:"error",
        title: titulo,
        timer: 3000,
        customClass: {
            popup: 'small-swal2-popup',

        },
    });
}

//<!---------------------------------------------------------------------------------------------------------------------------->

function Alerta_Error(text){
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: text
      });
}

//<!---------------------------------------------------------------------------------------------------------------------------->

function AlertConfirmDelet() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    }); 

    return swalWithBootstrapButtons.fire({
        title: "Estas seguro de querer eliminar este registro?",
        text: "esta accion NO es reversible!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar eso",
        cancelButtonText: "No, cancela",
        reverseButtons: true
    });
}


function LlamadaConfirmacion(){
    
    AlertConfirmDelet().then((result) => {
        if (result.isConfirmed) {
            // console.log("Usuario confirmó la eliminación");
    
            enviaAjax($("#f3"));
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // console.log("Eliminación cancelada");
        }
    });
    
    }
    
//<!---------------------------------------------------------------------------------------------------------------------------->

function Alerta_Eliminar(){
    Swal.fire({
        title: "Eliminado!",
        imageUrl: "assets/icon/Papelera.png",
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: "Custom image",
        showConfirmButton: false,
        timer: 1300,
        //position: 'top-end',
        customClass: {
            popup: 'small-swal2-popup'
        }
      });
}



// -------LOGICA PARA LLAMADA DE ALERTAS-----

function LlamadaAlert(result){

    
        // Obtener el número y el texto por separado
        var resultado = obtenerNumeroYTexto(result);

        // Realizar acciones basadas en el número de respuesta
        switch (resultado.numero) {
            case 1:
                // Mesanje de Registrado
                Alerta_Registrar(resultado.texto);
                break;
            case 2:
                // Mensaje de Modificado
                Alerta_Modificar(resultado.texto);
                break;
            case 3:
                // Mensaje de Eliminado
                Alerta_Eliminar();
                break;
                case 4:
                    // Mensaje de Eliminado
                    Alerta_er(resultado.texto);
                    break;
            default: 
                // Acciones por defecto o manejo de otros números
                console.log("Número no reconocido");
        }

        
        // console.log("Texto sin número:"+ resultado.texto);


}


// Función para obtener el número y el texto por separado
function obtenerNumeroYTexto(mensaje) {
    var match = mensaje.match(/^(\d+)\s*(.*)$/);
    if (match) {
        var numero = parseInt(match[1], 10);
        var texto = match[2].trim();
        return { numero: isNaN(numero) ? 0 : numero, texto: texto };
    } else {
        // Manejar casos donde no se pueda extraer un número
        return { numero: 0, texto: mensaje.trim() };
    }
}
