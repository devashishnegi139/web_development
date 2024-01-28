<?php
/*
CREATE DATABASE user_registration;
USE user_registration;
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
*/

//Database Connection
$db = new mysqli('localhost', 'root', '', 'user_registration');

//Exception Handling
if ($db->connect_error) {
    die('Connection Failed: '. $db->connect_error);
}

//Getting User Input
$username = $_POST['u_name'];
$password = $_POST['u_pass'];

//Hashing the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

//Inserting into DB
$insertQuery = "INSERT INTO users(username, password) VALUES(?, ?)";

$stmt = $db->prepare($insertQuery);
$stmt->bind_param("ss", $username, $hashedPassword);

if($stmt->execute()) {
    header("Location: registerationSuccess.html");
} else {
    echo "Registraion Failed. Please try again.";
}

$stmt->close();
$db->close();
?>