<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Server-Sent Events</title>

<h1>Chat</h1>

<p>[
<a href="<?= BASE_URL . "chat?type=poll" ?>">Ajax Polling</a> |
<a href="<?= BASE_URL . "chat?type=sse" ?>">Server-Sent Events</a> |
<a href="<?= BASE_URL . "chat?type=ws" ?>">Web sockets</a>
]</p>

<br>
<p>Chatting as: <b id="nickname"></b></p>

<textarea id="message-input" rows="5" name="message" placeholder="Message" class="full-width"></textarea><br>
<button id="button" class="full-width">Send</button>

<ul id="messages">
</ul>

<script src="<?= ASSETS_URL . "jquery-3.2.1.min.js" ?>"></script>
<script>
"use strict"

$(document).ready(() => {
    let user = prompt("Please enter your name", "Anonymous").trim();
    if (user == "") {
        user = "Anonymous"
    }
    $("#nickname")[0].innerHTML = user
   
    // Web socket
    // Nareidmo pveoazvo nas spletni strežnik, an anslov lcalhost na vrata 9999.
    const conn = new WebSocket('ws://localhost:9999');
    conn.onopen = function(e) {
        // Če se povezava uspešno vzpostavi.
        console.log("Connection established!");
    };
    conn.onmessage = function(event) {
        // Vsako novo spročilo, ki ga dobimo appendamo v seznam sporočil
        const ul = $("#messages")
        const li = document.createElement("li")
        const data = JSON.parse(event.data)
        li.innerText = `${data.user}: ${data.message}`
        ul.append(li)
    };

    $("#button").click(event => {
        // Kliknemo gum, da bomo poslai sporočilo. Pošljemo sporočilo na strežnik. 
        // Sporočil ne pošiljamo preko ajaxa.
        const textarea = $("#message-input")
        const message = textarea.val().trim()

        if (message == "") {
            return
        }

        textarea.val("")
        textarea.focus()

        // send data
        conn.send(JSON.stringify({ user, message }))
    })
});
</script>
