<?php

require_once "BookDB.php";

$add = isset($_POST["author"]) && !empty($_POST["author"]) && 
        isset($_POST["title"]) && !empty($_POST["title"]) &&
        isset($_POST["price"]) && !empty($_POST["price"]) &&
        isset($_POST["year"]) && !empty($_POST["year"]);

// If we send a valid POST request (contains all required data)
if ($add) {
    try {
        BookDB::insert($_POST["author"], $_POST["title"], $_POST["price"], $_POST["year"]);
        header("Location: index.php");
    } catch (Exception $e) {
        $errorMessage = "Database error occured: $e";
    }
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Add new</title>
    <style type="text/css">
        .important {
            color: red;
        } 
    </style>
</head>
<body>

<h1>A new book</h1>

<?php if (isset($errorMessage)): ?>
    <p class="important"><?= $errorMessage ?></p>
<?php endif; ?>

<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <p><label for="author">Author:</label>
    <input type="text" name="author" id="author" autofocus /></p>

    <p><label for="title">Title:</label>
    <input type="text" name="title" id="title" /></p>

    <p><label for="price">Price:</label>
    <input type="number" name="price" id="price" /></p>

    <p><label for="year">Price:</label>
    <input type="number" name="year" id="year" /></p>

    <button type="submit">Insert</button>
</form>

</body>
</html>
