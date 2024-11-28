import { chatbotToggler, closeBtn, chatbox, chatInput, sendChatBtn } from "./domVariables.js";  // Primero importas las variables
import { runModelo } from "./connection.js";
import { createChatLi } from "./history.js"; 

// const chatbotToggler = document.querySelector(".chatbot-toggler");
// const closeBtn = document.querySelector(".close-btn");
// const chatbox = document.querySelector(".chatbox");
// const chatInput = document.querySelector(".chat-input textarea");
// const sendChatBtn = document.querySelector(".chat-input span");

let userMessage = null;
const inputInitHeight = chatInput.scrollHeight;

// const createChatLi = (message, className) => {
//     const chatLi = document.createElement("li");
//     chatLi.classList.add("chat", `${className}`);
//     let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
//     chatLi.innerHTML = chatContent;
//     chatLi.querySelector("p").textContent = message;
//     return chatLi;
// }


    // renderChatHistory(chatbox); // Pasar chatbox a renderChatHistory


const generateResponse = async (chatElement, userMessage) => {
    const messageElement = chatElement.querySelector("p");
    try{
        //  const answer = await Identificar(userMessage);
        const answer = await runModelo(userMessage); //connection.js
        messageElement.textContent = answer;
    }catch (error) {
        console.error("Error al generar una Respuesta:",error);
        messageElement.textContent = "Lo siento, algo ha salido mal."
    }
    chatbox.scrollTo(0, chatbox.scrollHeight);
}

const handleChat = () => {
    userMessage = chatInput.value.trim();
    if(!userMessage) return;

    // Clear the input textarea and set its height to default
    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    // Append the user's message to the chatbox
    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
        // Display "Thinking..." message while waiting for the response
        const incomingChatLi = createChatLi("Escribiendo...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi, userMessage);
    }, 600);
}

chatInput.addEventListener("input", () => {
    // Adjust the height of the input textarea based on its content
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    // If Enter key is pressed without Shift key and the window
    // width is greater than 800px, handle the chat
    if(e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

// Botón de envío del mensaje
sendChatBtn.addEventListener("click", handleChat);

// Cerrar el chatbot
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));

// Mostrar/ocultar el chatbot
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));

