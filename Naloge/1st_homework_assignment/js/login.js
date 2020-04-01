$(document).ready(function(){
    $('form').on("submit",function(){
        addUser();
        console.log("test")
        window.location.href = "instructions.html";
    });
});