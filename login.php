<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        $_SESSION["user"] = $email;

        // Cookie: Remember email
        setcookie("remember_user", $email, time() + 86400, "/");

        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Legal Case Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Legal Case Management - Login</h2>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="email" placeholder="Email"
        value="<?php echo isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : ''; ?>">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <br>
    <p>Don't have an account? <a href="signup.php">Signup here</a></p>
</div>

</body>
</html>