const { config } = require("dotenv");
const express = require("express");
const morgan = require("morgan");
const cookieParser = require("cookie-parser");
const cors = require("cors");
const http = require("http");
const path = require("path");
const MainRouter = require("./app/routers");
const errorHandlerMiddleware = require("./app/middlewares/error_middleware");
const whatsapp = require("wa-multi-session");
const mysql = require('mysql2');

config();

var app = express();
app.use(morgan("dev"));
app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.set("view engine", "ejs");
// Public Path
app.use("/p", express.static(path.resolve("public")));
app.use("/p/*", (req, res) => res.status(404).send("Media Not Found"));

app.use(MainRouter);

app.use(errorHandlerMiddleware);

const PORT = process.env.PORT || "5000";
app.set("port", PORT);
var server = http.createServer(app);
server.on("listening", () => console.log("APP IS RUNNING ON PORT " + PORT));

server.listen(PORT);

const connection = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
});

whatsapp.onConnected((session) => {
  console.log("connected => ", session);


});

whatsapp.onDisconnected((session) => {
  console.log("disconnected => ", session);
});

whatsapp.onConnecting((session) => {
  console.log("connecting => ", session);
});

whatsapp.onMessageReceived(async (msg) => {
    console.log(msg);
    if (msg.key.fromMe || msg.key.remoteJid.includes("status")) return;

    let pilihan = msg.message.conversation || msg.message.extendedTextMessage.text;

    await whatsapp.readMessage({
        sessionId: msg.sessionId,
        key: msg.key,
    });
    await whatsapp.sendTyping({
        sessionId: msg.sessionId,
        to: msg.key.remoteJid,
        duration: 3000,
    });

    connection.query('SELECT * FROM autoreplys WHERE keyword = ' + pilihan, function (err, rows) {
        console.log(rows)
        if (rows == null) {
            whatsapp.sendTextMessage({
                sessionId: msg.sessionId,
                to: msg.key.remoteJid,
                text: "Menu tidak ditemukan, ketik 000 untuk menampilkan semua menu",
                answering: msg, // for quoting message
            });
        } else {
            var pesan =  rows[0].response
            whatsapp.sendTextMessage({
                sessionId: msg.sessionId,
                to: msg.key.remoteJid,
                text: pesan,
                answering: msg, // for quoting message
            });
        }
    });

})

whatsapp.loadSessionsFromStorage();
