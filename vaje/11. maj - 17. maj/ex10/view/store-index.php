<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Bookstore</title>

<h1>Bookstore</h1>

<?php include("view/menu.php"); ?>

<div id="main">
    <?php foreach ($books as $book): ?>

        <div class="book">
            <form action="<?= BASE_URL . "store/add-to-cart" ?>" method="post" />
                <input type="hidden" name="id" value="<?= $book["id"] ?>" />
                <p><?= $book["title"] ?></p>
                <p><?= $book["author"] ?>, <?= $book["year"] ?> </p>
                <p><?= number_format($book["price"], 2) ?> EUR<br/>
                <button>Add to cart</button>
            </form> 
        </div>

    <?php endforeach; ?>

</div>

<?php if (!empty($cart)): ?>

    <div id="cart">
        <h3>Shopping cart</h3>
        <?php foreach ($cart as $book): ?>

            <form action="<?= BASE_URL . "store/update-cart" ?>" method="post">
                <input type="hidden" name="id" value="<?= $book["id"] ?>" />
                <input type="number" name="quantity" value="<?= $book["quantity"] ?>" class="update-cart" />
                &times; <?= $book["title"] ?> 
                <button>Update</button> 
            </form>

        <?php endforeach; ?>

        <p>Total: <b><?= number_format($total, 2) ?> EUR</b></p>

        <form action="<?= BASE_URL . "store/purge-cart" ?>" method="post">
            <p><button>Purge cart</button></p>
        </form>
    </div>    

<?php endif; ?>
