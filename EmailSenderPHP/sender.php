<?php
/* DB query for sql:
CREATE DATABASE email_sender;
USE email_sender;
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message VARCHAR(255) NOT NULL
);
*/

// DB Connection
$db = new mysqli("localhost", "root", "", "email_sender");

// Exception Handling
if($db->connect_error){
    die('Connection Failed: '. $db->connect_error);
}

// Getting User Inputs
$username = $_POST["u_name"];
$email = $_POST["u_email"];
$message = $_POST["u_message"];

// Hashing user message
$hashedMessage = password_hash($message, PASSWORD_BCRYPT);

// Inserting in to DB
$insertQuery = "INSERT INTO users(username, email, message) VALUES(?, ?, ?)";
$stmt = $db->prepare($insertQuery);
$stmt->bind_param("sss", $username, $email, $hashedMessage);
if($stmt->execute()){
    // sending email
    $to = $email;
    $subject = 'Message Recieved';
    $headers = "From: $username!";
    $emailBody = "$message";
    mail($to, $subject, $emailBody, $headers);

    echo "Message send to $email";
} else{
    echo "Error: " . $db->error;
}

// closing the DB
$db->close();
?>