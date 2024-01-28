<?php
// always create the DB first using SQL in the server

session_start();

// DB Connection
$db = new mysqli('localhost', 'root','','user_registration');

// Error Handling
if($db->connect_error) {
    die("Connection Failed: ") . $db->connect_error;
}

// User Input
$username = $_POST["u_name"];
$password = $_POST["u_pass"];

// Checking User Credentials
$selectQuery = "SELECT id, username, password FROM users WHERE username=?";
$stmt = $db->prepare($selectQuery);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user && password_verify($password, $user["password"])) {
    // Authentication Successful
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    header("Location: dashboard.php");
}
else {
    // Authentication Failed
    header("Location: loginFailed.html");
    exit();
}

$stmt->close();
$db->close();
?>