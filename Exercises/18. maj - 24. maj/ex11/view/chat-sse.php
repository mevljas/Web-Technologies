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

<form method="post" action="<?= BASE_URL . "chat/delete" ?>">
    <button>Empty database</button>    
</form>

<br>
<p>Chatting as: <b id="nickname"></b></p>

<textarea id="message-input" rows="5" name="message" placeholder="Message" class="full-width"></textarea><br>
<button id="button" class="full-width">Send</button>

<ul id="messages">
</ul>

<script src="<?= ASSETS_URL . "jquery-3.2.1.min.js" ?>"></script>
<script src="<?= ASSETS_URL . "script.js" ?>"></script>
<script>
"use strict"

$(document).ready(() => {
    init_gui("<?= BASE_URL . "chat" ?>")
    
    // subscribe to messages with SSE
    // Podamo naslov, iz kje bomo brali sporočila   
    const source = new EventSource("<?= BASE_URL . "chat/message-sse" ?>");
    source.onmessage = event => {
        const ul = $("#messages")
        const li = document.createElement("li")
        const data = JSON.parse(event.data)
        li.innerText = `${data.user}: ${data.message}`
        ul.append(li)
    };
});
</script>
