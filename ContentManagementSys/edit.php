<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    editArticle($id, $title, $content);
    header('Location: view.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $article = getArticle($id);
} else {
    header('Location: view.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Article</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $article['id'] ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= $article['title'] ?>" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required><?= $article['content'] ?></textarea>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>