<!DOCTYPE html>

<meta charset="UTF-8" />
<title>Book detail</title>

<h1>Details about: <?= $book["title"] ?></h1>
<ul>
    <li>Author: <b><?= $book["author"] ?></b></li>
    <li>Title: <b><?= $book["title"] ?></b></li>
    <li>Price: <b><?= $book["price"] ?> EUR</b></li>
    <li>Year: <b><?= $book["year"] ?></b></li>
</ul>

<p>[ <a href="<?= BASE_URL . "book/edit?id=" . $_GET["id"] ?>">Edit</a> |
<a href="<?= BASE_URL . "book" ?>">Book index</a> ]</p>
