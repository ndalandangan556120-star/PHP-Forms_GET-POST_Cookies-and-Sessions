<?php
session_start();

if (isset($_GET["action"]) && $_GET["action"] == "logout") {
    session_unset();
    session_destroy();
    $logout_success = true;
} else {
    $logout_success = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout - Legal Case Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <?php if ($logout_success): ?>
        <h2>Logout Successful</h2>
        <p>You have been successfully logged out.</p>
        <p>Redirecting to login page...</p>
        <script>
            setTimeout(function() {
                window.location.href = "login.php";
            }, 2000);
        </script>
        <p>If not redirected, <a href="login.php">click here</a></p>
    <?php else: ?>
        <h2>Logout</h2>
        <p>Are you sure you want to logout?</p>
        <a href="logout.php?action=logout"><button class="logout-btn">Yes, Logout</button></a>
        <a href="dashboard.php"><button>Cancel</button></a>
    <?php endif; ?>
</div>

</body>
</html>