<h3>Shopping cart</h3>

<?php foreach ($cart as $book): ?>

    <input type="number" name="quantity" value="<?= $book["quantity"] ?>" 
    	class="update-cart" data-id="<?= $book["id"] ?>" /> &times; <?= $book["title"] ?><br/>

<?php endforeach; ?>

<p>Total: <b><?= number_format($total, 2) ?> EUR</b></p>
<p><button id="purge-cart">Purge cart</button></p>

<script>
$(document).ready(() => {
    $("#purge-cart").click(function(){
        // POST request
        $.post("<?= BASE_URL . "ajax/purge-cart" ?>",
            function(data){
                // damo notr kr mamo v spremeljivki data.
                $("#cart").html(data)
            }
        )
    });

    $(".update-cart").change(function(){
        // POST request
        $.post("<?= BASE_URL . "ajax/update-cart" ?>", { id: $(this).data("id"), quantity: $(this).val() },
            function(data){
                // damo notr kr mamo v spremeljivki data.
                $("#cart").html(data)
            }
        )
    });
    /* TODO: Implement jQuery AJAX:
        1) one event listener that purges all items from the cart
        2) another that updates the quantity of one item in the cart

        Hint 0: Check how cart additions are implemented.

        Hint 1: you may use AJAX shorthand methods, like $.post or $.get.
            https://api.jquery.com/jquery.post

        Hint 2: for updating the quantity, use the change event listener.
            https://api.jquery.com/change/
    */
});
</script>