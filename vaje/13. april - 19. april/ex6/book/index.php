<?php

require_once ("BookDB.php");

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Library</title>
</head>
<body>

<h1>A PHP bookstore</h1>

<p>[
<a href="search.php">Search </a> | 
<a href="add.php">Add new</a> 
]</p>

<ul>
    <?php foreach (BookDB::getAll() as $book): ?>
        <li><a href="detail.php?id=<?= $book["id"] ?>"><?= $book["author"] ?>: <?= $book["title"] ?></a></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
