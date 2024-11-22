import { GoogleGenerativeAI } from "@google/generative-ai";
import { getApiKey } from "./request.js"; 


const apiKey = await getApiKey();  // Usamos getApiKey de request.js para obtener la clave
const genAI = new GoogleGenerativeAI(apiKey);

  // Login ,Gestión de Usuarios, Gestión de Docente,Gestión de Representantes,Gestión de Inscripciones,Gestión de Pagos,Gestión de Materias,Gestión de Secciones,Gestión de Año Académico,Gestión de Eventos,Gestión de Horarios,Gestión de Seguridad,Gestión de Mantenimiento.

  const promptJSON = {
    "systemInstruction": `
      Eres un asistente virtual que interactúa con usuarios de una aplicación administrativa de un sistema de gestión escolar.
      El sistema presenta distintas Secciones o funciones donde los usuarios pueden acceder. Tu tarea es ayudar a los usuarios a entender
      las cosas que pueden hacer dentro del sistema, guiándolos según las opciones disponibles.

      Puedes asistirte con información sobre las siguientes funciones:\n\n* 
       
      Inicio Sesión o Login: El sistema permitirá manejar el acceso al sistema.Esta interfaz permitirá a los usuarios poder ingresar sus
      datos (correo electrónico o usuario y clave), para poder acceder al sistema, la misma validará la información suministrada, de
      ser correcto el sistema permitirá entrar a la interfaz y menú
      principal, donde podrá seleccionar las diferentes opciones
      a las cuales podrá tener acceso\n.

      Gestionar usuarios: El sistema permitirá Registrar, Consultar, Modificar y Eliminar a los usuarios del mismo.En este módulo el sistema permitirá registrar un nuevo usuario, modificar los datos de un usuario ya registrado, eliminar los
      datos del usuario y consultar los datos de estos\n.

      Gestionar docentes: Este módulo permitirá consultar, registrar los docentes de institución\n.

      Gestionar representes: Este módulo permitirá llevar la gestión de representantes en el  sistema\n.
      
      **Inscripción de estudiantes:** Aquí puedes registrar nuevos estudiantes en el sistema, incluyendo sus datos personales, académicos y de contacto.\n* 
      
      
      **Administración de pagos:** Esta sección te permite gestionar los pagos de matrículas, pensiones y otros conceptos, llevando un control de las finanzas de los estudiantes.\n* 
      
      Gestionar Materias: Este módulo permitirá llevar la gestión de Materias en el sistema y asiganara el Docente a impartir.\n
       
      Gestionar secciones: Este módulo permitirá consultar, registrar los secciones de institución.\n

      **Gestión de horarios:** Aquí puedes crear y modificar los horarios de clases, asignando profesores, aulas y materias a cada sección.\n* 

      **Gestión de años académicos y eventos:** Este módulo permitirá consultar el registro de años académicos y eventos de la institución.\n
    
    tambien rechaza responder cualquier pregunta no relacionada con lo descrito.
      `,
  };
  
  // Y siempre di que no puedes responder a preguntas o dudas que no tenga nada que ver con lo descrito.

const model = genAI.getGenerativeModel({
  model: "gemini-1.5-pro",
  systemInstruction: promptJSON.systemInstruction
});

const generationConfig = {
  temperature: 1,
  topP: 0.95,
  topK: 40,
  maxOutputTokens: 8192,
};



async function runModelo(userMessage) {
  try {
    
    if (!apiKey) {
      throw new Error("No se pudo obtener la clave API.");
    }

   // Preguntas y respuestas predefinidas como contexto inicial
const contexto = [
  { text: "input: ¿Qué es La Batalla?" },
  { text: "output: Recuperación de una materia." },
  { text: "input: ¿Qué es Papita?" },
  { text: "output: EL compa mio." },
  { text: "input: " },
  { text: "output: " },
];

// Enviar el contexto más la pregunta del usuario al modelo
const parts = [
  ...contexto,
  { text: `input: ${userMessage}` },
  { text: "output:" },
];
    
    // Configuración del modelo y sesión de chat
    const chatSession = model.startChat({
      contents: [{ role: "user", parts }],
      generationConfig,
      // history: [
      //   { role: "user", parts: [{ text: userMessage }] },
      //   {
      //     role: "model",
      //     parts: [
      //       {
      //         text:
      //           "Hola! Bienvenido al sistema de gestión administrativa del colegio. ¿En qué puedo ayudarte hoy? ",
      //       },
      //     ],
      //   },
      // ],
    });

    const result = await chatSession.sendMessage(userMessage);
    console.log(result.response);
    
    
    return result.response.text();

  } catch (error) {
    console.error("Error al ejecutar runModelo:", error);
    throw new Error("No se pudo generar la respuesta. Por favor, intenta de nuevo.");
  }
}

// -----------------------------------------------------
// const promptJSON2 = {
//   "Text": `Eres un asistente vistual donde Seras un identificador,depensiendo de la pregunta o duda ,identificaras si tiene algo que ver con algunos de estos temas:
//   Login ,Gestión de Usuarios, Gestión de Docente,Gestión de Representantes,Gestión de Inscripciones,Gestión de Pagos,Gestión de Materias,Gestión de Secciones,Gestión de Año Académico,Gestión de Eventos,Gestión de Horarios,Gestión de Seguridad,Gestión de Mantenimiento.
//   entonces retornaras las iniciales por ejemplo: Login es L ,Gestion de Usuario es GU,Gestion de Eventos es GE..y haci con todos,si no tiene nada de relacion entonces retonras un false..no retorne el codigo ni formula,solo la respuesta`
// }
// const modelo_consult = genAI.getGenerativeModel({
//   model: "gemini-1.5-pro",
//   systemInstruction: promptJSON2.Text
// });

// async function Identificar(userMessage){


//   try {
//     if (!apiKey) {
//       throw new Error("No se pudo obtener la clave API.");
//     }
//     if (!modelo_consult) {
//       throw new Error("No se pudo obtener modelo consult.");
//     }
//     // Configuración del modelo y sesión de chat
//     const chatSession_Bot = modelo_consult.startChat({
//       // contents: [{ role: "user", parts }],
//       generationConfig,
//       history: [ { role: "user", parts: [{ text: userMessage }] }]
//     });

//     const result = await chatSession_Bot.sendMessage(userMessage);
//     console.log(result.response.text);
//     return result.response.text();

//   } catch (error) {
//     console.error("Error al ejecutar indentificar():", error);
//     throw new Error("No se pudo generar la respuesta. Por favor, intenta de nuevo.");
//   }

//   //   switch (result) {
//   //     case "01":
//   //         respuesta = ConsultaAjax();
//   //         break;
//   //     case "02":
//   //         respuesta = await administrarPagos(userMessage);
//   //         break;
//   //     case "03":
//   //         respuesta = await gestionarHorarios(userMessage);
//   //         break;
//   //     case "04":
//   //         respuesta = await gestionarSecciones(userMessage);
//   //         break;
//   //     case "05":
//   //         respuesta = await gestionarAniosAcademicos(userMessage);
//   //         break;
//   //     default:
//   //         respuesta = "No es";
//   // }
// }

export { runModelo };

