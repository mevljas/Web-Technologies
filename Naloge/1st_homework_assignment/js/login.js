$(document).ready(function(){
    $('form').on("submit",function(){
        addParticipant();
        window.location.href = "instructions.html";
    });
});