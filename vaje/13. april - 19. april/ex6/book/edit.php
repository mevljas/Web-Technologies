<?php

require_once "BookDB.php";

$edit = isset($_POST["author"]) && !empty($_POST["author"]) && 
            isset($_POST["title"]) && !empty($_POST["title"]) &&
            isset($_POST["price"]) && !empty($_POST["price"]) &&
            isset($_POST["id"]) && !empty($_POST["id"])&&
            isset($_POST["year"]) && !empty($_POST["year"]);

$delete = isset($_POST["delete_confirmation"]) && 
            isset($_POST["id"]) && !empty($_POST["id"]);

// If we send a valid POST request (contains all required data)
if ($edit) {
    try {
        BookDB::update($_POST["id"], $_POST["author"], $_POST["title"], $_POST["price"], $_POST["year"]);
        // Go to the detail page
        header(sprintf("Location: detail.php?id=%d", $_POST["id"]));
    } catch (Exception $e) {
        $errorMessage = "A database error occured: $e";
    }
// Do we delete the record?
} else if ($delete) {
    try {
        BookDB::delete($_POST["id"]);
        header("Location: index.php");
    } catch (Exception $e) {
        $errorMessage = "A database error occured: $e";
    }
// Read the contents from the DB and populate the form with it
} else {
    try {
        // GET id from either GET or POST request
        $book = BookDB::get($_REQUEST["id"]);
    } catch (Exception $e) {
        $errorMessage = "A database error occured: $e";
    }
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Edit entry</title>
    <style type="text/css">
        .important {
            color: red;
        } 
    </style>
</head>
<body>

<h1>Edit book</h1>

<?php if (isset($errorMessage)): ?>
    <p class="important"><?= $errorMessage ?></p>
<?php endif; ?>

<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />

    <p><label for="author">Author:</label>
    <input type="text" name="author" id="author" value="<?= $book["author"] ?>" autofocus /></p>

    <p><label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?= $book["title"] ?>" /></p>

    <p><label for="price">Price:</label>
    <input type="number" name="price" id="price" value="<?= $book["price"] ?>" /></p>

    <p><label for="price">Year:</label>
    <input type="number" name="year" id="year" value="<?= $book["year"] ?>" /></p>

    <p><button type="submit">Update record</button></p>
</form>

<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />
    
    <p><label for="delete_confirmation">Delete?</label>
    <input type="checkbox" name="delete_confirmation" id="delete_confirmation" />
    <button type="submit" class="important">Delete record</button></p>
</form>

</body>
</html>
