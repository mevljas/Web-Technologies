<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Search books</title>
</head>

<body>

    <h1>Search for books</h1>

    <form action="<?= BASE_URL . "book/search" ?>" method="get">
        <label for="query">Search books:</label>
        <input type="text" name="query" id="query" value="<?= $query ?>" autofocus />
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($hits)) : ?>

        <ul>
            <?php foreach ($hits as $book) : ?>
                <li><a href="<?= BASE_URL . "book?id=" . $book["id"] ?>"><?= $book["author"] ?>: <?= $book["title"] ?></a></li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>

</body>

</html>