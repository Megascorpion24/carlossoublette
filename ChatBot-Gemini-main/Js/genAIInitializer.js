import { GoogleGenerativeAI } from "@google/generative-ai";
import { getApiKey } from "./request.js";

let genAI = null;

/**
 * Inicializa o devuelve la instancia de GoogleGenerativeAI.
 * @returns {Promise<GoogleGenerativeAI>} Instancia inicializada.
 */
export async function getGenAIInstance() {
  if (!genAI) {
    const apiKey = await getApiKey();
    if (!apiKey) {
      throw new Error("No se pudo obtener la clave API.");
    }
    genAI = new GoogleGenerativeAI(apiKey);
  }
  return genAI;
}
