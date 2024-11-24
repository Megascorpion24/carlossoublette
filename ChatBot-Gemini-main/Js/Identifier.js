/**
 * Identifica el tipo de mensaje basado en el usuario.
 * @param {string} userMessage - Mensaje del usuario.
 * @param {GoogleGenerativeAI} genAI - Instancia de Google Generative AI.
 * @returns {Promise<string>} - Identificación generada.
 */
async function Identificar(userMessage, genAI) {
  try {
    if (!genAI) {
      throw new Error("La instancia de genAI no fue proporcionada.");
    }

    // Configuración del modelo y sesión de chat
    const modelo_consult = genAI.getGenerativeModel({
      model: "gemini-1.5-pro",
      systemInstruction: `
      Eres un asistente virtual que identifica mensajes según temas predefinidos:
      - Login: L
      - Gestión de Usuarios: GU
      - Gestión de Docentes: GD
      - Gestión de Representantes: GR
      - Gestión de Inscripciones: GI
      - Gestión de Pagos: GP
      - Gestión de Materias: GM
      - Gestión de Secciones: GS
      - Gestión de Año Académico: GAA
      - Gestión de Eventos: GE
      - Gestión de Horarios: GH
      - Gestión de Seguridad: GSeg
      - Gestión de Mantenimiento: GMant

      Si el mensaje no tiene relación con ningún tema, retorna "false".
      `,
    });

    const chatSession_Bot = modelo_consult.startChat({
      generationConfig: {
        temperature: 0.7,
        maxOutputTokens: 256,
      },
      history: [{ role: "user", parts: [{ text: userMessage }] }],
    });

    const result = await chatSession_Bot.sendMessage(userMessage);

    // Retorna la respuesta generada
    // return result.response.text();
    const resultado =result.response.text();
    console.log(resultado);
    
  } catch (error) {
    console.error("Error al ejecutar Identificar:", error);
    throw new Error("No se pudo identificar el mensaje.");
  }
}

export { Identificar };
