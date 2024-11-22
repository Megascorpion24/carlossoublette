<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Skolo Online</title>
    <!-- <link rel="stylesheet" href="../../../css/style.css"> -->
    <link rel="stylesheet" href="ChatBot-Gemini-main\css\style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <!-- <script src="script.js" defer></script> -->
  </head>
  <body>


    
    <button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hola 👋<br>¿En qué puedo ayudarte hoy?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>
    <script type="importmap">
      {
        "imports": {
          "@google/generative-ai": "https://esm.run/@google/generative-ai"
        }
      }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script type="module" src="ChatBot-Gemini-main\Js\main.js"></script> -->
    <script type="module" src="ChatBot-Gemini-main\Js\request.js"></script>
    <script type="module" src="ChatBot-Gemini-main\Js\connection.js"></script>
    <script type="module" src="ChatBot-Gemini-main\Js\main.js"></script>

  </body>
</html>

  


  