<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Logged-in</title>

<h1>Successfull log-in</h1>

<?php include("view/menu-links.php"); ?>

<p>Welcome <b><?= $username ?></b>. Your provided a valid username and password.</p>
<ul>
    <li><b>Username:</b> <code class="highlight"><?= $username ?></code></li>
    <li><b>Password:</b> <code class="highlight"><?= $password ?></code></li>
</ul>