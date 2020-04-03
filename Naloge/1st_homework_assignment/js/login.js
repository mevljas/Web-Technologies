$(document).ready(function() {
  $("form").on("submit", function() {
    addTempUser();
    window.location.href = "html/instructions.html";
  });
});
