<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Edit entry</title>
    <style type="text/css">
        .important {
            color: red;
        }
    </style>
</head>

<body>

    <h1>Edit book</h1>

    <?php if (isset($errorMessage)) : ?>
        <p class="important"><?= $errorMessage ?></p>
    <?php endif; ?>

    <form action="<?= BASE_URL . "book/edit" ?>" method="post">
        <input type="hidden" name="id" value="<?= $book["id"] ?>" />

        <p><label for="author">Author:</label>
            <input type="text" name="author" id="author" value="<?= $book["author"] ?>" autofocus /></p>

        <p><label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?= $book["title"] ?>" /></p>

        <p><label for="price">Price:</label>
            <input type="number" name="price" id="price" value="<?= $book["price"] ?>" /></p>

        <p><label for="price">Year:</label>
            <input type="number" name="year" id="year" value="<?= $book["year"] ?>" /></p>

        <p><button type="submit">Update record</button></p>
    </form>

    <form action="<?= BASE_URL . "book/edit" ?>" method="post">
        <input type="hidden" name="id" value="<?= $book["id"] ?>" />

        <p><label for="delete_confirmation">Delete?</label>
            <input type="checkbox" name="delete_confirmation" id="delete_confirmation" />
            <button type="submit" class="important">Delete record</button></p>
    </form>

</body>

</html>