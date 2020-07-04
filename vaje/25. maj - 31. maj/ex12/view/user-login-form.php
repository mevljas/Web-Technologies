<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Login form</title>

<h1>Please log in</h1>

<?php include("view/menu-links.php"); ?>

<?php if (!empty($errorMessage)): ?>
    <p class="important"><?= $errorMessage ?></p>
<?php endif; ?>

<p>Try to log in with either <code class="highlight">user/password</code> or <code class="highlight">student/vaje</code>.</p>

<form action="<?= BASE_URL . $formAction ?>" method="post">
    <p>
        <label>Username: <input type="text" name="username" autocomplete="off" 
            required autofocus /></label><br/>
        <label>Password: <input type="password" name="password" required /></label>
    </p>
    <p><button>Log-in</button></p>
</form>