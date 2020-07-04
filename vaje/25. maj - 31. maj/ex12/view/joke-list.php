<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Internet joke database</title>

<h1>All jokes</h1>

<?php include("view/menu-links.php"); ?>

<ul>

    <?php foreach ($jokes as $joke): ?>
        <li><b><?= $joke["joke_date"] ?></b>: <?= $joke["joke_text"] ?>

        <?php if ($loggedIn): ?>
        	<a href="<?= BASE_URL . "joke/edit?id=" . $joke["id"] ?>">edit</a>
        <?php endif; ?>

        </li>
    <?php endforeach; ?>

</ul>
