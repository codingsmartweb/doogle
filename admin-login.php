<?php
// Replace these with your actual admin credentials
$admin_username = "admin";
$admin_password = "password123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_username && $password === $admin_password) {
        session_start();
        $_SESSION["admin_logged_in"] = true;
        header("Location: crawl.php");
        exit();
    } else {
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>
    <form action="admin-login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
