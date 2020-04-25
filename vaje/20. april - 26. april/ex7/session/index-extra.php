<?php
session_start();

$action = isset($_POST["do"]) ? $_POST["do"] : "";
$url = $_SERVER["PHP_SELF"];

if ($action == "delete") {
    session_destroy();
    $message = "Session destroyed, counter reset. <a href='$url'>Continue ...</a>";
} elseif (!isset($_SESSION["counter"])) {
    $_SESSION["counter"] = 1;
    $message = "This is your first visit.";
} else {
    $_SESSION["counter"]++;
    $message = "You have visited this page $_SESSION[counter] times.";
}
?><!DOCTYPE html>

<meta charset="UTF-8" />
<title>Primer števca obiskov z uporabo seje PHP</title>

<p><?= $message ?></p>
<form action="<?= $url ?>" method="post">
    <input type="hidden" name ="do" value="delete" />
    <button type="submit">Delete session</buton>
</form>