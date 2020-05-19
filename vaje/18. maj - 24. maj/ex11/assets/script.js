"use strict"

// Zveže nekaj dogodkov na element uproabniškega vmesnika.
function init_gui(url) {
    let user = prompt("Please enter your name", "Anonymous").trim();
    if (user == "") {
        user = "Anonymous"
    }
    $("#nickname")[0].innerHTML = user

    $("#button").click(event => {
        const textarea = $("#message-input")
        const message = textarea.val().trim()

        if (message == "") {
            return
        }

        textarea.val("")
        textarea.focus()

        send_message(user, message, url)
    })
}

// Pošlje sporočilo an strežnik
function send_message(user, message, url) {
    $.ajax({
        url: url,
        method: "POST",
        data: {
            user: user,
            message: message
        }
    }).fail(data => console.log(data))
}