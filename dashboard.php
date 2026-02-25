<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Legal Case Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">

    <h2>Legal Case Management Dashboard</h2>
    <p>Welcome, <strong><?php echo $_SESSION["user"]; ?></strong></p>

    <h3>Case Records</h3>

    <table>
        <tr>
            <th>Case ID</th>
            <th>Client Name</th>
            <th>Case Type</th>
            <th>Status</th>
            <th>Hearing Date</th>
        </tr>

        <tr>
            <td>LCM-001</td>
            <td>Juan Dela Cruz</td>
            <td>Criminal Case</td>
            <td class="status-active">Active</td>
            <td>March 12, 2026</td>
        </tr>

        <tr>
            <td>LCM-002</td>
            <td>Maria Santos</td>
            <td>Civil Case</td>
            <td class="status-pending">Pending</td>
            <td>April 05, 2026</td>
        </tr>

        <tr>
            <td>LCM-003</td>
            <td>Pedro Reyes</td>
            <td>Family Case</td>
            <td class="status-closed">Closed</td>
            <td>January 18, 2026</td>
        </tr>

        <tr>
            <td>LCM-004</td>
            <td>Ana Lopez</td>
            <td>Labor Case</td>
            <td class="status-active">Active</td>
            <td>March 25, 2026</td>
        </tr>
    </table>

    <br>

    <a href="logout.php?action=logout">
        <button class="logout-btn">Logout</button>
    </a>

</div>

</body>
</html>