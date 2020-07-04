<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Edit joke</title>

<h1>Edit joke</h1>

<?php include("view/menu-links.php"); ?>

<form action="<?= BASE_URL . "joke/edit" ?>" method="post">
	<input type="hidden" name="id" value="<?= $joke["id"] ?>" />
    <p>
        <label>Date: <input type="date" name="joke_date" value="<?= $joke["joke_date"] ?>" required />
        <span class="important"><?= $errors["joke_date"] ?></span></label>
    </p>
    <p>
        <label>Description: <span class="important"><?= $errors["joke_text"] ?></span><br />
		<textarea name="joke_text" rows="10" cols="40"><?= $joke["joke_text"] ?></textarea></label>
	</p>
    <p><button>Edit</button></p>
</form>

<form action="<?= BASE_URL . "joke/delete" ?>" method="get">
    <?php 
        $randomNumber = rand(10,100); 
        $_SESSION["randomNumber"] = $randomNumber;
    ?>
    <input type="hidden" name="randomNumber" value="<?=  $randomNumber ?>"  />
    <input type="hidden" name="id" value="<?= $joke["id"] ?>"  />
    <label>Delete? <input type="checkbox" name="delete_confirmation" title="Are you sure you want to delete this entry?" required /></label>
    <button class="important">Delete record</button>
   
    
</form>