<?php
session_start();

//check user
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];

if (!isset($_GET['user']) || $_GET['user'] != $user['id']) {
    die("Invalid user profile.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #0071ce;
        }
        .btn-secondary {
            background-color: #ffc220;
            border: none;
            color: #000;
        }
        .btn-secondary:hover {
            background-color: #e6ad00;
        }
        .card {
            border-top: 5px solid #0071ce;
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-white" href="#">PHP</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile.php?user=1">Profile</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2>Welcome, <?= htmlspecialchars($user['name']) ?>!</h2>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Year Level:</strong> <?= htmlspecialchars($user['year']) ?></p>
        <p><strong>User ID (via GET, check URL):</strong> <?= $_GET['user'] ?></p>

        <a href="index.php" class="btn btn-secondary mt-3">Logout</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
