usersArray = [];
playerName = "user";
lastId = -1;

function setLocalStorage() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    localStorage.setItem("users", JSON.stringify(usersArray));
    localStorage.setItem("playerName", playerName);
  }
}

function addUser() {
  loadUsers();
  const id = ++lastId;
  const fName = document.querySelector("#fname").value;
  const lName = document.querySelector("#lname").value;
  const score = 0;

  playerName = fName;

  usersArray.push({
    id: id,
    fName: fName,
    lName: lName,
    score: score
  });
  setLocalStorage();
}

function loadUsers() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    if (localStorage.getItem("users") !== null) {
      usersArray = JSON.parse(localStorage.getItem("users"));
      if (usersArray.length == 0) {
        lastId = -1;
      } else {
        lastId = usersArray[usersArray.length - 1].id;
      }
    }
    if (localStorage.getItem("playerName") !== null) {
      playerName = localStorage.getItem("playerName");
    }
  }
}

function saveUser(score) {
  for (let i = 0; i < usersArray.length; i++) {
    const element = usersArray[i];
    if (element.id === lastId) {
      element.score = score;
    }
  }
  setLocalStorage();
}
