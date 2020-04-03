$(document).ready(function() {
    $("form").on("submit", function() {
      addTempUser();
      alert("User information successfully changed.")
    });
  });
  loadUsers();
  document.getElementById("fname").value = tempUser.fName;
  document.getElementById("lname").value = tempUser.lName;