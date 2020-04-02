$(document).ready(function(){
    $('form').on("submit",function(){
        addTempUser();
        window.location.href = "instructions.html";
    });
});