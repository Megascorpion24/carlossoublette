// request.js

function Ajax_POST(Peticion) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: 'ChatBot-Gemini-main/backend/Query.php',  // El archivo PHP que devuelve la clave API
        type: 'POST', 
        dataType: 'json',  // Especificamos que esperamos una respuesta JSON
        data: { ajaxPet_ChatBot: true, Peticion: Peticion },
        success: function (data) {
      
          data && typeof data === 'object'
          ? resolve(data) // Resolvemos si los datos son válidos
          : reject("La respuesta no tiene el formato esperado.");
          
        },
        error: function (jqXHR, textStatus, errorThrown) {
          reject(`Error al obtener una respuesta del servidor: ${textStatus} - ${errorThrown}`);
      }
      });
    });
  }

  export { Ajax_POST };
  