<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="../static/css/style.css">
<meta charset="UTF-8" />
<title>Add entry</title>

<h1>Using <code>$_SERVER["PHP_SELF"]</code></h1>

<p>[
<a href="../index.php/book">All books</a> |
<a href="../index.php/book/search">Search</a> |
<a href="../index.php/book/add">Add new</a> |
<a href="../index.php/user/login">Log-in</a> |
<a href="../other/index.php"><code>PHP_SELF</code></a>
]</p>

<p>What if someone sends you a <a href="index.php/%22%3E%3Cscript%3Ealert%28%27XSS%20attack%27%29%3C/script%3E/%22%3E">nice link like this?</a></p>

<?php if (isset($_POST["name"])): ?>

    <p>Hello <b><?= htmlspecialchars($_POST["name"]) ?></b>!</p>

<?php else: ?>
    
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label>Your name: <input type="text" name="name" required autofocus /></label>
        <button>Send</button>
    </form>

<?php endif; ?>

<p><small><b>Note.</b> This page is implemented outside of the MVC appication for the ease of demonstration. However, this does not mean that the variable <code>$_SERVER["PHP_SELF"]</code> cannot be misused inside MVC apps.</small></p>