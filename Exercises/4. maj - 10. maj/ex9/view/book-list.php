<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Library</title>

<h1>All books</h1>

<?php include("view/menu-links.php"); ?>

<ul>

    <?php foreach ($books as $book): ?>
        <li><a href="<?= BASE_URL . "book?id=" . $book["id"] ?>"><?= $book["author"] ?>: 
        	<?= $book["title"] ?>, <?= $book["year"] ?></a></li>
    <?php endforeach; ?>

</ul>
