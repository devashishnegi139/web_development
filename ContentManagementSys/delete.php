<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteArticle($id);
}

header('Location: view.php');
exit;
?>