"use strict";

let participants = [];
let lastId = -1;


//imamo nekaj rokovlanikov
function domRemoveParticipant(event) {
    // TODO
}

function domAddParticipant(participant) {

    //poiscemo refernco na tabelo
    const table = document.querySelector("#participant-table");

    //naredimo novo vrstico
    const tr = document.createElement("tr");

    //dolocim id
    tr.id = ++lastId;

    //dodamo v tabelo
    table.appendChild(tr);

    // //dodamo stolpce
    // const tdFirst = document.createElement("td");
    // tdFirst.innerText = participant.first;
    // tr.appendChild(tdFirst);
    //
    // const tdLast = document.createElement("td");
    // tdLast.innerText = participant.last;
    // tr.appendChild(tdLast);
    //
    // const tdRole = document.createElement("td");
    // tdRole.innerText = participant.role;
    // tr.appendChild(tdRole);

    //nridmo na lepsi nacin
    for (const key in participant) {
        const td = document.createElement("td");
        td.innerText = participant[key];
        tr.appendChild(td);
    }
}

function addParticipant(event) {
    //mouseEvent je objekt, ki vsebuej informacije o kliku. Atribut target nam pove, na kateri gumb smo kliknili
    //izpisemo refernco na ta gumb
    // console.log(event.target);

    const first = document.querySelector("#first").value;
    const last = document.querySelector("#last").value;
    const role = document.querySelector("#role").value;

    //pobrise vrednosti
    document.querySelector("#first").value = "";
    document.querySelector("#last").value = "";

    // Create participant object
    const participant = {
        first: first,
        last: last,
        role: role
    };

    // Add participant to the HTML
    //pdoatke se bodo prikazali v novi vrstici
    domAddParticipant(participant);

    // Move cursor to the first name input field
    document.getElementById("first").focus();

    participants.push({id: lastId, first: first, last: last, role: role});
    localStorage.setItem('participants', JSON.stringify(participants));
}

function removeParticipant(event) {
    let parent = event.target.parentElement;
    let name = parent.firstElementChild.innerHTML;
    if (parent.rowIndex !== 0 && window.confirm("Are you sure you want to delete " + name + "?")) {
        parent.remove();

        //remove from array
        // participants = participants.filter(e => e.id !== parent.id);
        participants.splice(parent.id, 1);
        localStorage.setItem('participants', JSON.stringify(participants));
    }

}

function loadParticipants() {
    if (localStorage.getItem("participants") !== null) {
        participants = JSON.parse(localStorage.getItem('participants'));
        for (let i = 0; i < participants.length; i++) {
            let participant = {
                first: participants[i].first,
                last: participants[i].last,
                role: participants[i].role
            };

            domAddParticipant(participant);
        }
    }


    // Move cursor to the first name input field
    document.getElementById("first").focus();
}


//se izvede kot je celoten html dokument s vsemi odivnsotmi nalozen
document.addEventListener("DOMContentLoaded", () => {
    // This function is run after the page contents have been loaded
    loadParticipants();
    //funkciji se doda rokovalnik dogodka
    document.getElementById("addButton").onclick = addParticipant;
    document.getElementsByTagName("table")[0].ondblclick = removeParticipant;
})

// // The jQuery way of doing it
// $(document).ready(() => {
//     // Alternatively, you can use jQuery to achieve the same result
// });
