<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>AJAX Book search</title>

<h1>AJAX Book search</h1>

<?php include("view/menu.php"); ?>

<label>Search: <input id="search-field" type="text" name="query" autocomplete="off" autofocus /></label>

<ul id="book-hits"></ul>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    
    $( "#search-field" ).keyup(function() {
        $.get( "http://localhost/ex10/index.php/api/book/search?query="+$(this).val(), function( data ) {
            // let obj = JSON.parse(JSON.stringify(data));
            let obj = data;
            let ul = $("#book-hits");
            ul.empty()
            
            for (let key in obj) {
                ul.append(
                    '<li><a href="<?= BASE_URL ?>book?id="'+obj[key].id+'>'+obj[key].author+': '+obj[key].title+' ('+obj[key].year+')</a></li>'
                );
            }
        });
    });

    /*  Assignment 2, step 2) Implement the jQuery AJAX call that sends a GET request with a 
            search query and displays the result inside the 
                <ul class="book-hits"></ul>
            block.
        
        Hint: If you want the listener to get invoked for every keystroke,
            even for backspace and delete, use the keyup event listener:
                https://api.jquery.com/keyup/

        Note that the server will return a JSON response (not an HTML snippet),
        so you will have to:
        1) Convert received string into JSON:
             https://www.w3schools.com/js/js_json_parse.asp
        2) And then traverse the search results and add each hit as a <li> child
           of the <ul> block.
    */
});
</script>