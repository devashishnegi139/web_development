<!-- create.php -->
<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    createArticle($title, $content);
    header('Location: view.php');
    exit;
}
?>