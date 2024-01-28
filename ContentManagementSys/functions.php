<?php
$db = new mysqli('localhost', 'root', '', 'cms');

if($db->connect_error){
    die("Connection Failed: " . $db->connect_error);
}

function createArticle($title, $content) {
    global $db;
    $stmt = $db->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);
}

function editArticle($id, $title, $content) {
    global $db;
    $stmt = $db->prepare("UPDATE articles SET title=?, content=? WHERE id=?");
    $stmt->execute([$title, $content, $id]);
}

function deleteArticle($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM articles WHERE id=?");
    $stmt->execute([$id]);
}

function getArticle($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM articles WHERE id=?");
    $stmt->bind_param("i", $id);  // "i" indicates integer type, adjust if necessary
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; // or handle the case when no article is found
    }
}


function getAllArticles() {
    global $db;
    $stmt = $db->query("SELECT * FROM articles");
    
    $articles = array();
    
    while ($row = $stmt->fetch_assoc()) {
        $articles[] = $row;
    }
    
    return $articles;
}

?>