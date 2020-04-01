$(document).ready(function(){
    $('form').on("submit",function(){
        addUser();
        window.location.href = "instructions.html";
    });
});