<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Add new joke</title>

<h1>Add new joke</h1>

<?php include("view/menu-links.php"); ?>

<form action="<?= BASE_URL . "joke/add" ?>" method="post">
    <p>
        <label>Date: <input type="date" name="joke_date" value="<?= $joke["joke_date"] ?>" required />
        <span class="important"><?= $errors["joke_date"] ?></span></label>
    </p>
    <p>
        <label>Description: <span class="important"><?= $errors["joke_text"] ?></span><br />
		<textarea name="joke_text" rows="10" cols="40"><?= $joke["joke_text"] ?></textarea></label>
	</p>
    <p><button>Insert</button></p>
</form>
