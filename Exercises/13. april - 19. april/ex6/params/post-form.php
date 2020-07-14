<!DOCTYPE html>
<meta charset="utf-8">
<title>A page that sends and processes POST requests</title>

<?php
/*
1. Determine whether the client requested this page with required
    parameters (check $_POST variable). Use functions isset and empty.
2. If so, display a simple greeting in which you use the values of
    these parameters. If not, display the form.
 */


if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"])) {
    echo "Hello ",$_POST["first_name"]," ",$_POST["last_name"],", the time is ", date("H:i"), ".";
} else {
?>
    <p>This form will send out a HTTP POST request with two parameters:</p>
    <ul>
        <li>
            <pre>first_name</pre> representing the value in the first input field, and</li>
        <li>
            <pre>last_name</pre> representing the value in the second input field.</li>
    </ul>
    <!-- server je gloabla spremernljivka in nam pove speltni naslov datoteke  oz. skripte katera se trenutno izvja. TLe se bo nadoemsito z postformphp  -->
    <!-- Lahko bi tudi  kar napisali notr post-form.php -->
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <p><label for="first_name">First name:</label>
            <input type="text" name="first_name" id="first_name" /></p>
        <p><label for="last_name">Last name:</label>
            <input type="text" name="last_name" id="last_name" /></p>
        <p><button type="submit">Send request</button></p>
    </form>
<?php
}
?>