import { GoogleGenerativeAI } from "@google/generative-ai";
import { identificacion } from "./Identifier_Manual.js";
import { promptJSON } from "./Prompt.js";
import { Ajax_POST } from "./request.js";
import { getChatHistory, addMessageToHistory, renderChatHistory, createChatLi } from "./history.js";

// Obtener la clave API
const data = await Ajax_POST('Key');
const genAI = new GoogleGenerativeAI(data.apiKey);

// Configuración del modelo de IA
const model = genAI.getGenerativeModel({
  model: "gemini-1.5-pro",
  systemInstruction: promptJSON.systemInstruction,
});

const generationConfig = {
  temperature: 1,
  topP: 0.95,
  topK: 40,
  maxOutputTokens: 8192,
  responseMimeType: "application/json",
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
  // Agrega más preguntas y respuestas predefinidas aquí
];

// Función para encontrar un prompt similar en los predefinidos
function findSimilarPrompt(userMessage, prompts) {
  const lowerCaseMessage = userMessage.toLowerCase();
  return (
    prompts.find((p) => lowerCaseMessage.includes(p.prompt.toLowerCase())) || null
  );
}

// Función principal para interactuar con el modelo generativo
// async function runModelo(userMessage) {
//   try {
//     // Agregar el mensaje del usuario al historial
//     addMessageToHistory("user", userMessage);

//     // Buscar respuestas predefinidas
//     const similarPrompt = findSimilarPrompt(userMessage, predefinedPrompts);
//     if (similarPrompt) {
//       const response = similarPrompt.response;
//       addMessageToHistory("model", response); // Agregar respuesta predefinida al historial
//       renderChatHistory(); // Renderizar el historial
//       return response; // Devolver respuesta predefinida
//     }

//     // Si no hay respuesta predefinida, continuamos con el modelo generativo
//     const chatSession = model.startChat({
//       generationConfig,
//       history: getChatHistory().map(entry => ({
//         role: entry.role,
//         parts: [{ text: entry.parts[0].text }],
//       })),
//     });

//     // Enviar el mensaje y obtener la respuesta del modelo
//     const result = await chatSession.sendMessage(userMessage);
//     const jsonString = result.response.text();
//     const jsonResult = JSON.parse(jsonString);

//     const message = jsonResult.data;
//     const idt = identificacion(jsonResult.identificacion);

//     const combinedMessage =
//       idt !== "Abreviatura no válida"
//         ? `${message}\n---------Manual de Usuario---------\n${idt}`
//         : message;

//     // Agregar la respuesta generada al historial
//     addMessageToHistory("bot", combinedMessage);

//     // Renderizar el historial actualizado
//     renderChatHistory();

//     return combinedMessage;
//   } catch (error) {
//     console.error("Error al ejecutar runModelo:", error);
//     throw new Error("No se pudo generar la respuesta. Por favor, intenta de nuevo.");
//   }
// }
async function runModelo(userMessage) {
  try {
    // Agregar mensaje del usuario al historial con el "role" adecuado
    addMessageToHistory("user", userMessage);

    // Busca respuestas predefinidas
    const similarPrompt = findSimilarPrompt(userMessage, predefinedPrompts);
    if (similarPrompt) {
      const response = similarPrompt.response;
      addMessageToHistory("model", response); // Agregar respuesta predefinida al historial
      return response;
    }

    // Si no hay respuesta predefinida, se continúa con el modelo
    const chatHistory = getChatHistory();

    let chatSession;
    // Si el historial está vacío, se inicializa con el mensaje de usuario
    if (chatHistory.length === 0) {
      console.log("entro nuevo chat");
      chatSession = model.startChat({
        generationConfig,
        history: [
          { role: "user", parts: [{ text: userMessage }] },
        ],
      });

      chatHistory.push({
        role: "user",
        parts: [{ text: userMessage }],
      });
    } else {
      // Filtrar el historial para asegurarse de que solo tenga roles válidos
      const validHistory = chatHistory.filter(entry =>
        ["user", "model", "function", "system"].includes(entry.role)
      );

      // Iniciar la sesión del modelo con el historial (con mensajes con roles válidos)
      chatSession = model.startChat({
        generationConfig,
        history: validHistory.map(entry => ({
          role: entry.role,  // Asegúrate de que el "role" esté correctamente asignado
          parts: [{ text: entry.parts[0].text }],
        })),
      });
    }

   

    // Enviar el mensaje del usuario al modelo
    const result = await chatSession.sendMessage(userMessage);
    const jsonString = result.response.text();
    const jsonResult = JSON.parse(jsonString);

    const message = jsonResult.data;
    const idt = identificacion(jsonResult.identificacion);

    const combinedMessage =
      idt !== "Abreviatura no válida"
        ? `${message}\n---------Manual de Usuario---------\n${idt}`
        : message;

    // Agregar la respuesta del modelo al historial
    addMessageToHistory("model", combinedMessage);

    // Renderizar todo el historial
    renderChatHistory();

    return combinedMessage;
  } catch (error) {
    console.error("Error al ejecutar runModelo:", error);
    throw new Error(
      "No se pudo generar la respuesta. Por favor, intenta de nuevo."
    );
  }
}


export { runModelo };
