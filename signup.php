<?php
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];

    // Validation 1: Required
    if (empty($fullname) || empty($email) || empty($password) || empty($confirm)) {
        $errors[] = "All fields are required.";
    }

    // Validation 2: Email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validation 3: Min password length
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    // Validation 4: Password confirmation
    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $_SESSION["user"] = $fullname;
        $_SESSION["email"] = $email;
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Legal Case Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Legal Case Management - Signup</h2>

    <?php
    foreach ($errors as $error) {
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="POST">
        <input type="text" name="fullname" placeholder="Full Name">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <button type="submit">Sign Up</button>
    </form>

    <br>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

</body>
</html>