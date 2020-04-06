function loadTable() {
  clearTable();
  let filter = $("#filter").val();
  for (let i = 0; i < usersArray.length; i++) {
    let user = {
      id: usersArray[i].id,
      fName: usersArray[i].fName,
      lName: usersArray[i].lName,
      score: usersArray[i].score,
    };
    if (
      filter === "" ||
      user.id.toString().includes(filter) ||
      user.fName.includes(filter) ||
      user.lName.includes(filter) ||
      user.score.toString().includes(filter)
    ) {
      domAddParticipant(user);
    }
  }
}

function domAddParticipant(user) {
  const table = document.querySelector("#users-table");

  const tr = document.createElement("tr");

  table.appendChild(tr);

  for (const key in user) {
    const td = document.createElement("td");
    td.innerText = user[key];
    td.id = "deletable";
    tr.appendChild(td);
  }
}

function removeParticipant(event) {
  let parent = event.target.parentElement;

  if (typeof parent.cells !== "undefined") {
    let name = parent.cells[1].textContent;
    if (
      parent.rowIndex !== 0 &&
      window.confirm("Are you sure you want to delete user " + name + "?")
    ) {
      parent.remove();
      let id = parent.cells[0].textContent;
      usersArray = usersArray.filter((e) => e.id != id);
      saveUsers();
      loadTable();
    }
  }
}

function fillSelect() {
  let select = document.getElementById("orderColumn");
  let columns = {
    id: "Id",
    fName: "First name",
    lName: "Last name",
    score: "Score",
  };
  for (key in columns) {
    option = document.createElement("option");
    option.setAttribute("value", key);
    option.appendChild(document.createTextNode(columns[key]));
    select.appendChild(option);
  }
}

function sortArray() {
  let e = document.getElementById("orderColumn");
  let orderColumn = e.options[e.selectedIndex].value;

  usersArray.sort(function (a, b) {
    var nameA = a[orderColumn];
    var nameB = b[orderColumn];
    if (nameA < nameB) {
      return -1;
    }
    if (nameA > nameB) {
      return 1;
    }

    return 0;
  });
  loadTable();
}

function clearTable() {
  $("#users-table tr #deletable").remove();
}
loadUsers();
fillSelect();
sortArray();
document.getElementsByTagName("table")[0].onclick = removeParticipant;
document.getElementById("orderColumn").onchange = sortArray;
document.getElementById("filter").oninput = loadTable;
