import { chatbox } from "./domVariables.js";  // Primero importas las variables
const chatHistoryKey = "chatHistory";
let chatHistory = [];

function getChatHistory() {
  return JSON.parse(localStorage.getItem(chatHistoryKey)) || [];
}

function saveChatHistory(history) {
  localStorage.setItem(chatHistoryKey, JSON.stringify(history));
}

const addMessageToHistory = (role, message) => {
  chatHistory.push({
    role: role,
    parts: [{ text: message }],
  });
  saveChatHistory(chatHistory); // Guardamos el historial actualizado en localStorage
};

// Función para crear un elemento de chat
const createChatLi = (message, className) => {
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", `${className}`);
  let chatContent = className === "outgoing" 
    ? `<p></p>` 
    : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};

// // Función para renderizar el historial de mensajes
// function renderChatHistory() {
//   const history = getChatHistory();
//   history.forEach((entry) => {
//     const li = createChatLi(entry.parts[0].text, entry.role === "user" ? "outgoing" : "incoming");
//     chatbox.appendChild(li);
//   });
//   chatbox.scrollTo(0, chatbox.scrollHeight);
// }
// Función para renderizar el historial de mensajes
function renderChatHistory() {
    const history = getChatHistory();  // Obtener el historial del localStorage
    history.forEach((entry) => {
      // Crear un nuevo elemento de chat según el rol (usuario o modelo)
      const li = createChatLi(entry.parts[0].text, entry.role === "user" ? "outgoing" : "incoming");
      chatbox.appendChild(li);  // Añadir el mensaje al contenedor
    });
    chatbox.scrollTo(0, chatbox.scrollHeight);  // Desplazarse al final
  }

  document.addEventListener("DOMContentLoaded", () => {
    renderChatHistory(); // Esto se debe ejecutar cuando el DOM esté listo.
  });
  
export { getChatHistory, addMessageToHistory, renderChatHistory, createChatLi };
