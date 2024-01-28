<!-- view.php -->
<?php
include 'functions.php';

$articles = getAllArticles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Articles</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <strong><?= $article['title'] ?></strong>
                <p><?= $article['content'] ?></p>
                <p>Created at: <?= $article['created_at'] ?></p>
                <a href="edit.php?id=<?= $article['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $article['id'] ?>" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.html">Create New Article</a>
</body>
</html>