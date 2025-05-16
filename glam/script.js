// === Elements ===
const tab = document.getElementById("glambot-tab");
const windowBox = document.getElementById("glambot-window");
const closeBtn = document.querySelector(".close-button");
const sendButton = document.getElementById("send-button");
const userInput = document.getElementById("user-input");
const chatContainer = document.getElementById("chat-container");
const glambotHeader = document.querySelector(".glambot-header");

// === Toggle Chat Window ===
tab.addEventListener("click", () => {
  windowBox.classList.toggle("hidden");
});

closeBtn.addEventListener("click", () => {
  windowBox.classList.add("hidden");
});


// === Backend Integration with Gemini Proxy ===
async function fetchGeminiResponse(prompt) {
  try {
    const response = await fetch('http://localhost:3000/api/chat', {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ question: prompt })
    });

    const data = await response.json();
    return data.response || "GlamBot is currently overwhelmed. Please try again in a minute";
  } catch (error) {
    console.error("Client fetch error:", error);
    return "Upgrade your plan in order to talk to Glambot.";
  }
}

