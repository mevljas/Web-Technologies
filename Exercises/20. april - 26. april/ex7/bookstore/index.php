<?php
session_start();
require_once ("BookDB.php");
?><!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<title>Library</title>

<h1>A PHP bookstore</h1>

<div id="main">    
    <?php foreach (BookDB::getAll() as $book): ?>
        <div class="book">
            <form action="manage-cart.php" method="post">
                <input type="hidden" name="cart_action" value="add">
                <input type="hidden" name="id" value="<?= $book["id"] ?>">
                <p><?= $book["title"] ?></p>
                <p><?= $book["author"] ?>, <?= $book["year"] ?></p>
                <p><?= number_format($book["price"], 2) ?> EUR<br>
                <button>Add to cart</button>
            </form> 
        </div>
    <?php endforeach; ?>
</div>

<?php

$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];

if (!empty($cart)): ?>
    <div class="cart">
        <h3>Shopping cart</h3>
        <?php 
        // TODO 1: Implement the display of items that are in the cart
        // TODO 2: Change the display to work as a form for changing the cart items
        $total = 0;
        foreach ($cart as $id => $quantity): 
            // Get additional information
            $book = BookDB::get($id);
            $total += $quantity * $book["price"];
        ?>
            <form action="manage-cart.php" method="post">
                <input type="hidden" name="cart_action" value="edit">
                <input type="hidden" name="id" value=<?= $book["id"] ?>>
                <input type="number" style="width:30px" name="quantity" value=<?= $quantity ?>><span> × <?= $book["title"] ?></span><button name="update">Update</button>
            </form>
            
        <?php endforeach; ?>

        <p>Total: <b><?= number_format($total, 2) ?> EUR</b></p>

        <form action="manage-cart.php" method="post">
            <input type="hidden" name="cart_action" value="purge_cart">
            <p><button>Purge cart</button></p>
        </form>
    </div>
<?php
endif;
