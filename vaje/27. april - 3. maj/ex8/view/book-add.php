<!DOCTYPE html>

<meta charset="UTF-8" />
<title>Add entry</title>
<style type="text/css">
    .important {
        color: red;
    } 
</style>

<h1>A new book</h1>

<form action="<?= BASE_URL . "book/add" ?>" method="post">
    <p><label>Author: <input type="text" name="author" value="<?= $author ?>" autofocus /></label></p>
    <p><label>Title: <input type="text" name="title" value="<?= $title ?>" /></label></p>
    <p><label>Price: <input type="number" name="price" value="<?= $price ?>" /></label></p>
    <p><label>Year: <input type="number" name="year" value="<?= $year ?>" /></label></p>
    <p><button>Insert</button></p>
</form>
