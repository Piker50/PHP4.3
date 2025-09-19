<?php
session_start();

// Fake user for demo
$validEmail = "user@example.com";
$validPassword = "12345";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === $validEmail && $password === $validPassword) {
        // Store in SESSION
        $_SESSION['user'] = [
            "id" => 1,
            "email" => $email,
            "name" => "John Doe"
        ];
        // Redirect to profile.php with GET
        header("Location: profile.php?user=1");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #0071ce;
        }
        .btn-primary {
            background-color: #0071ce;
            border: none;
        }
        .btn-primary:hover {
            background-color: #005ea6;
        }
        .card {
            border-top: 5px solid #ffc220;
        }
    </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-white" href="#">MyLabApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php?user=1">Profile</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Login Card -->
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-3">Login</h2>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="" class="needs-validation" novalidate>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required minlength="5">
                <div class="invalid-feedback">Password must be at least 5 characters.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ✅ Bootstrap validation
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
</html>
