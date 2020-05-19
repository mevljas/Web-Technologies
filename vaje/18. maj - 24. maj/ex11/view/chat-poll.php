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

<!-- Z Javascriptom avtomatično osfežujemo spletno stran. -->
<script src="<?= ASSETS_URL . "jquery-3.2.1.min.js" ?>"></script>
<script src="<?= ASSETS_URL . "script.js" ?>"></script>
<script>
"use strict"

let last_id = 0

$(document).ready(() => {
    init_gui("<?= BASE_URL . "chat" ?>")
    
    // subscribe to messages with ajax polling
    setInterval(get_messages, 3000)
});

// Pošlje AJAX poizvedo po meto GET na anslo chat/message-poll z id, ki j trenutni id
// Nazaj doboimo seznam sporočil in se doajo v ul s sporočili messages.
function get_messages() {
    $.get(
        "<?= BASE_URL . "chat/message-poll" ?>",
        { id: last_id },
        (messages, status) => {
            const ul = $("#messages")
            messages.forEach(m => {
                const li = document.createElement("li")
                li.innerText = `${m.user}: ${m.message}`
                ul.append(li)
                last_id = Math.max(last_id, m.id)
            })
        }
    )
}
</script>
