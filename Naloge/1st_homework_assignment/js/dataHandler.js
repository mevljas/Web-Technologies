let usersArray = [];
let lastId = -1;

function setLocalStorage() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    scoreBoard.push(playerName + " " + score); //save
    // Store
    // converts to string and save
    localStorage.setItem("SpaceInvadersCode", JSON.stringify(scoreBoard));
  }
}

function addUser() {
  loadUsers();
  const id = lastId++;
  const fName = document.querySelector("#fname").value;
  const lName = document.querySelector("#lname").value;
  const country = $("#country option:selected").text();
  const score = 0;

  //   // Create participant object
  //   const participant = {
  //     id: usersArray[i].id,
  //     fName: usersArray[i].fName,
  //     lName: usersArray[i].lName,
  //     country: usersArray[i].country,
  //     score: usersArray[i].score
  //   };

  // Add participant to the HTML
  //pdoatke se bodo prikazali v novi vrstici
  //   domAddParticipant(participant);

  usersArray.push({
    id: id,
    fName: fName,
    lName: lName,
    country: country,
    score: score
  });
  localStorage.setItem("users", JSON.stringify(usersArray));

}

function loadUsers() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    if (localStorage.getItem("users") !== null) {
      usersArray = JSON.parse(localStorage.getItem("users"));
      //   for (let i = 0; i < usersArray.length; i++) {
      //     let participant = {
      //       id: usersArray[i].id,
      //       fName: usersArray[i].fName,
      //       lName: usersArray[i].lName,
      //       country: usersArray[i].country,
      //       score: usersArray[i].score
      //     };

      //     domAddParticipant(participant);
      //   }
    }
  }
}

// function domAddParticipant(participant) {

//     //poiscemo refernco na tabelo
//     const table = document.querySelector("#participant-table");

//     //naredimo novo vrstico
//     const tr = document.createElement("tr");

//     //dolocim id
//     tr.id = ++lastId;

//     //dodamo v tabelo
//     table.appendChild(tr);

//     // //dodamo stolpce
//     // const tdFirst = document.createElement("td");
//     // tdFirst.innerText = participant.first;
//     // tr.appendChild(tdFirst);
//     //
//     // const tdLast = document.createElement("td");
//     // tdLast.innerText = participant.last;
//     // tr.appendChild(tdLast);
//     //
//     // const tdRole = document.createElement("td");
//     // tdRole.innerText = participant.role;
//     // tr.appendChild(tdRole);

//     //nridmo na lepsi nacin
//     for (const key in participant) {
//         const td = document.createElement("td");
//         td.innerText = participant[key];
//         tr.appendChild(td);
//     }
// }
