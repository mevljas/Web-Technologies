function loadTable() {
  loadUsers();
  for (let i = 0; i < usersArray.length; i++) {
    let user = {
      id: usersArray[i].id,
      fName: usersArray[i].fName,
      lName: usersArray[i].lName,
      score: usersArray[i].score
    };
    domAddParticipant(user);
  }
}

function domAddParticipant(user) {
  const table = document.querySelector("#users-table");

  const tr = document.createElement("tr");

  table.appendChild(tr);

  for (const key in user) {
    if (key === "id") {
      continue;
    }
    const td = document.createElement("td");
    td.innerText = user[key];
    tr.appendChild(td);
  }
}

loadTable();
