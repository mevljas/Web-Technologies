usersArray = [];

function saveUsers() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    localStorage.setItem("users", JSON.stringify(usersArray));
  }
}

function saveTempUser() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    localStorage.setItem("tempUser", JSON.stringify(tempUser));
  }
}

function addTempUser() {
  loadUsers();
  const fName = document.querySelector("#fname").value;
  const lName = document.querySelector("#lname").value;
  const score = 0;

  tempUser = {
    fName: fName,
    lName: lName,
    score: score
  };

  saveTempUser();
}

function loadUsers() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    if (localStorage.getItem("users") !== null) {
      usersArray = JSON.parse(localStorage.getItem("users"));
    }

    if (localStorage.getItem("tempUser") !== null) {
      tempUser = JSON.parse(localStorage.getItem("tempUser"));
    }
  }
}

function saveUser(score) {
  tempUser.score = score;
  usersArray.push(tempUser);
  saveUsers();
}
