<?php
session_start();

// Check if the user is logged in
if(!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
    // echo"Check Check";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?> !</h2>
    <p>This is your dashboard. You can access the data here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>