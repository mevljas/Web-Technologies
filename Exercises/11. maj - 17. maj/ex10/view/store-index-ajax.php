<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>AJAX Bookstore</title>

<h1>AJAX Bookstore</h1>

<?php include("view/menu.php"); ?>

<div id="main">
    <?php foreach ($books as $book): ?>

        <div class="book">
            <p><?= $book["title"] ?></p>
            <p><?= $book["author"] ?>, <?= $book["year"] ?></p>
            <p><?= number_format($book["price"], 2) ?> EUR<br/>
            <button class="add-to-cart" data-id="<?= $book["id"] ?>">Add to cart</button></p>
            <!-- data je neka html5 zadeva, izbrali smo si id. vVsaka azdeva ima sovj data-id-->
        </div>

    <?php endforeach; ?>

</div>


<div id="cart"></div>    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".add-to-cart").click(function(){
        $.post("<?= BASE_URL . "ajax/add-to-cart" ?>", 
            { id: $(this).data("id") },
            function (data) {
                $("#cart").html(data);
            }
        );
    },
    );

    
    // when this document is loaded, asynchronously load cart contents
    $.get("<?= BASE_URL . "ajax/cart" ?>", 
        function (data) {
            $("#cart").html(data);
        }
    );
});
</script>