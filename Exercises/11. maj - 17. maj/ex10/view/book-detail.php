<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Book detail</title>

<h1>Details of: <?= $book["title"] ?></h1>

<?php include("view/menu.php"); ?>

<ul>
    <li>Author: <b><?= $book["author"] ?></b></li>
    <li>Title: <b><?= $book["title"] ?></b></li>
    <li>Price: <b><?= $book["price"] ?> EUR</b></li>
    <li>Year: <b><?= $book["year"] ?></b></li>
</ul>

<p>[ <a href="<?= BASE_URL . "book/edit?id=" . $_GET["id"] ?>">Edit</a> |
<a href="<?= BASE_URL . "book" ?>">Book index</a> ]</p>
