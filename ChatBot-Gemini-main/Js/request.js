// request.js

function getApiKey() {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: 'ChatBot-Gemini-main/backend/Key.php',  // El archivo PHP que devuelve la clave API
        type: 'GET',  // Usamos GET para obtener la clave
        dataType: 'json',  // Especificamos que esperamos una respuesta JSON
        success: function (data) {
          if (data.apiKey) {
            resolve(data.apiKey);
            // console.log(data.apiKey);
              // Si la respuesta contiene la clave API, la resolvemos
          } else {
            reject("No se encontró la clave API.");
          }
        },
        error: function () {
          reject("Error al obtener la clave API del servidor.");
        }
      });
    });
  }
  
  export { getApiKey };
  