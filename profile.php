<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Get user from SESSION
$user = $_SESSION['user'];

// Check GET parameter
if (!isset($_GET['user']) || $_GET['user'] != $user['id']) {
    die("Invalid user profile.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2>Welcome, <?= $user['name'] ?>!</h2>
        <p><strong>Email:</strong> <?= $user['email'] ?></p>
        <p><strong>User ID (via GET):</strong> <?= $_GET['user'] ?></p>

        <a href="index.php" class="btn btn-secondary mt-3">Logout</a>
    </div>
</div>
</body>
</html>
