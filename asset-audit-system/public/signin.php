<?php
session_start();
require_once '../config/config.php';
require_once '../src/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authController = new AuthController();
    $loginResult = $authController->login($username, $password);

    if ($loginResult['success']) {
        $_SESSION['user_id'] = $loginResult['user_id'];
        $_SESSION['role'] = $loginResult['role'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = $loginResult['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign In</title>
</head>
<body>
    <div class="container">
        <h2>Sign In</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="signin.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Sign In</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
</body>
</html>