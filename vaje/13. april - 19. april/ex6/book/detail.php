<?php

require_once ("BookDB.php");

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Book detail</title>
</head>
<body>
<?php $book = BookDB::get($_GET["id"]); ?>
<h1>Details about: <?= $book["title"] ?></h1>
<ul>
    <li>Author: <b><?= $book["author"] ?></b></li>
    <li>Title: <b><?= $book["title"] ?></b></li>
    <li>Price: <b><?= $book["price"] ?> EUR</b></li>
    <li>Year: <b><?= $book["year"] ?> </b></li>
</ul>

<p><a href="edit.php?id=<?= $_GET["id"] ?>">Edit</a></p>

</body>
</html>
