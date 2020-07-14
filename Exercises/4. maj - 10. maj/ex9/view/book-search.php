<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Book search</title>

<h1>Book search</h1>

<?php include("view/menu-links.php"); ?>

<form action="<?= BASE_URL . "book/search" ?>" method="get">
    <label for="query">Search books:</label>
    <input type="text" name="query" id="query" value="<?= $query ?>" />
    <button>Search</button>
</form>

<ul>
    <?php foreach ($hits as $book): ?>
        <li><a href="<?= BASE_URL . "book?id=" . $book["id"] ?>"><?= $book["author"] ?>: 
        	<?= $book["title"] ?>, <?= $book["year"] ?></a></li>
    <?php endforeach; ?>

</ul>
