<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>AJAX Book search</title>

<h1>Vue Book search</h1>

<?php include("view/menu.php"); ?>

<div id="app">
    <label>Search:
        <!-- Binds keyup event to search function (see below) -->
        <input id="search-field" type="text" name="query" autocomplete="off" v-on:keyup="search" autofocus />
    </label>
    <ol>
        <!-- Vue template for displaying a list of books -->
        <!-- Ta komponenta gleda spreremljivko books. Ko se spremeni, se na novo izriše. -->
        <li v-for="book in books">
            <a :href="'<?= BASE_URL . "book?id=" ?>' + book.id">{{ book.author }}: {{ book.title }}</a>
        </li>
    </ol>
</div>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
const app = new Vue({
    el: '#app',     // Vue app will live in the context of the #app element
    data: {         // contains vue App data
        books: []   // intitially the list of books is empty. Ko spremenimo to spreremljivko, se vse komponente, ki gledajo to spreremljivko posodobijo.
    },
    methods: {
        search(event) { // method to be invoked on ever keyup event
            const query = event.target.value
            if (query == "") { // abort if parameter is empty
                app.books = []
                return
            }
            // Axios is library for making HTTP requests from browsers (and node.js).
            // It is an alternative to jQuery's $.ajax
            axios.get(
                "<?= BASE_URL . "api/book/search/" ?>",
                { params: { query } }
            // handle successful response
            // all we have to do is to set received data into our books variable, vue will
            // render elements as specified in the template above
            // Zapiše v spremreljivko podatke.
            ).then(response => app.books = response.data 
            // handle error
            ).catch(error => console.log(error))
        }
    }
});
</script>