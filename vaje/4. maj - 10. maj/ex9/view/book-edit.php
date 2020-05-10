<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Edit entry</title>

<h1>Edit book</h1>

<?php include("view/menu-links.php"); ?>

<form action="<?= BASE_URL . "book/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />
    <p><label>Author: <input type="text" name="author" value="<?= $book["author"] ?>" autofocus pattern="([a-zA-ZšđčćžŠĐČĆŽ\.\-])+" required/>
        <span class="important"><?= $errors["author"] ?></span>
    </label>
    </p>
    <p><label>Title: <input type="text" name="title" value="<?= $book["title"] ?>" required/>
        <span class="important"><?= $errors["title"] ?></span></label>
    </p>
    <p><label>Description: <br />
        <textarea name="description" rows="10" cols="40"><?= $book["description"] ?></textarea></label>
    </p>
    <p><label>Price: <input type="number" name="price" value="<?= $book["price"] ?>" min="0" required/>
        <span class="important"><?= $errors["price"] ?></span></label></p>
    <p><label>Year: <input type="number" name="year" value="<?= $book["year"] ?>" min="1500" max="2020" required/>
        <span class="important"><?= $errors["year"] ?></span></label></p>
    <p><label>Quantity: <input type="number" name="quantity" value="<?= $book["quantity"] ?>" min="0" required/>
        <span class="important"><?= $errors["quantity"] ?></span></label></p>
    <p><button>Update</button></p>
</form>

<form action="<?= BASE_URL . "book/delete" ?>" method="post">
    <input type="hidden" name="id" value="<?= $book["id"] ?>"  />
    <label>Delete? <input type="checkbox" name="delete_confirmation" title="Are you sure you want to delete this entry?" /></label>
    <button class="important">Delete record</button>
</form>
