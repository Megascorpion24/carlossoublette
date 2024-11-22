import { GoogleGenerativeAI } from "@google/generative-ai";
import { getApiKey } from "./request.js";

// Obtenemos la clave API
const apiKey = await getApiKey();
if (!apiKey) {
  throw new Error("No se pudo obtener la clave API.");
}

// Inicialización del cliente Google Generative AI
const genAI = new GoogleGenerativeAI(apiKey);

// Configuración del modelo principal
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

const generationConfig = {
  temperature: 1,
  topP: 0.95,
  topK: 40,
  maxOutputTokens: 8192,
};

// Base de datos de prompts predefinidos
const predefinedPrompts = [
  {
    prompt: "¿Cómo inscribo a un nuevo estudiante?",
    response:
      "Para inscribir a un nuevo estudiante, dirígete a la sección de 'Inscripción de estudiantes'. Completa el formulario con los datos personales, académicos y de contacto del alumno.",
  },
  {
    prompt: "¿Cómo administro los pagos?",
    response:
      "Para administrar los pagos, accede a la sección 'Administración de pagos'. Allí puedes registrar nuevos pagos, consultar el historial y gestionar los recibos emitidos.",
  },
  // Agrega más preguntas y respuestas predefinidas aquí.
];

/**
 * Encuentra un prompt predefinido similar al mensaje del usuario.
 * @param {string} userMessage - Mensaje del usuario.
 * @param {Array} prompts - Lista de prompts predefinidos.
 * @returns {Object|null} - Prompt encontrado o null.
 */
function findSimilarPrompt(userMessage, prompts) {
  const lowerCaseMessage = userMessage.toLowerCase();
  return (
    prompts.find((p) =>
      lowerCaseMessage.includes(p.prompt.toLowerCase())
    ) || null
  );
}

/**
 * Genera una respuesta utilizando prompts predefinidos o el modelo generativo.
 * @param {string} userMessage - Mensaje del usuario.
 * @returns {Promise<string>} - Respuesta generada.
 */
async function runModelo(userMessage) {
  try {
    const similarPrompt = findSimilarPrompt(userMessage, predefinedPrompts);

    if (similarPrompt) {
      return similarPrompt.response; // Respuesta predefinida
    }

    // Configuración de sesión y generación de respuesta
    const chatSession = model.startChat({
      generationConfig,
      history: [
        { role: "user", parts: [{ text: userMessage }] },
      ],
    });

    const result = await chatSession.sendMessage(userMessage);
    return result.response.text();

  } catch (error) {
    console.error("Error al ejecutar runModelo:", error);
    throw new Error(
      "No se pudo generar la respuesta. Por favor, intenta de nuevo."
    );
  }
}

// Exportamos la función para uso externo
export { runModelo };
