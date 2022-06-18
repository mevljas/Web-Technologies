<!DOCTYPE html>

<meta charset="UTF-8" />
<title>Library</title>

<h1>A book library written in PHP</h1>

<p>[ <a href="<?= BASE_URL . "book/search" ?>">Search </a> |
    <a href="<?= BASE_URL . "book/add" ?>">Add new</a> ]</p>
<ul>

    <?php foreach ($books as $book) : ?>
        <li><a href="<?= BASE_URL . "book?id=" . $book["id"] ?>"><?= $book["author"] ?>:
                <?= $book["title"] ?> (<?= $book["year"] ?>)</a></li>
    <?php endforeach; ?>

</ul>