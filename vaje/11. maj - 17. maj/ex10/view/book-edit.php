<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Edit entry</title>

<h1>Edit book</h1>

<?php include("view/menu.php"); ?>

<form action="<?= BASE_URL . "book/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />
    <p><label>Author: <input type="text" name="author" value="<?= $book["author"] ?>" autofocus /></label></p>
    <p><label>Title: <input type="text" name="title" value="<?= $book["title"] ?>" /></label></p>
    <p><label>Price: <input type="number" name="price" value="<?= $book["price"] ?>" /></label></p>
    <p><label>Year: <input type="number" name="year" value="<?= $book["year"] ?>" /></label></p>
    <p><button>Update record</button></p>
</form>

<form action="<?= BASE_URL . "book/delete" ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />
    <label>Delete? <input type="checkbox" name="delete_confirmation" /></label>
    <button type="submit" class="important">Delete record</button>
</form>
