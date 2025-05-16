// server.js
const express = require('express');
const cors = require('cors');
require('dotenv').config();
const { GoogleGenerativeAI } = require("@google/generative-ai");
const app = express();
const port = 3000;

// Middleware
app.use(cors());
app.use(express.json()); //Handles JSON request bodies



// Initialize Gemini API
let genAI;
try {
    genAI = new GoogleGenerativeAI(process.env.GEMINI_API_KEY);
    console.log("Gemini API initialized successfully.");
} catch (error) {
    console.error("Error initializing Gemini API:", error);
    process.exit(1);
}

// Function to generate response from Gemini API
async function generateResponse(prompt) {
    try {
        const model = genAI.getGenerativeModel({ model: "gemini-1.5-pro-latest" });
        const result = await model.generateContent(prompt);
        return result.response.text();
    } catch (error) {
        console.error("Error while generating response from Gemini with prompt:", prompt);
        console.error("Detailed error:", error);
        throw new Error("Error with Gemini API: " + error.message);
    }
}


// Chat Endpoint
app.post('/api/chat', async (req, res) => {
    console.log("Incoming chat request");
    const userMessage = req.body.question;

    if (!userMessage) {
        return res.status(400).json({ error: 'Question is required' });
    }

    try {
        const reply = await generateResponse(userMessage);
        res.json({ response: reply });
    } catch (error) {
        res.status(500).json({ error: 'Failed to get response from Gemini', detail: error.message });
    }
});


// Start the server
app.listen(port, () => {
    console.log(`GlamBot server running on port ${port}`);
});
