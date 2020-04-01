usersArray = [];
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
  const id = ++lastId;
  const fName = document.querySelector("#fname").value;
  const lName = document.querySelector("#lname").value;
  const score = 0;


  usersArray.push({
    id: id,
    fName: fName,
    lName: lName,
    score: score
  });
  localStorage.setItem("users", JSON.stringify(usersArray));

}

function loadUsers() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    if (localStorage.getItem("users") !== null) {
      usersArray = JSON.parse(localStorage.getItem("users"));
      lastId = usersArray[usersArray.length - 1].id;

    }
  }
}


