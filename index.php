<?php
session_start();

$users = [
    [
        "id" => 1,
        "email" => "lanz@test.com",
        "password" => "12345",
        "name" => "Lanz",
        "year" => "4th Year"
    ],
    [
        "id" => 2,
        "email" => "toffee@test.com",
        "password" => "12345",
        "name" => "Toffee",
        "year" => "1st Year"
    ],
    [
        "id" => 3,
        "email" => "mugi@test.com",
        "password" => "qwerty",
        "name" => "Mugi",
        "year" => "4th Year"
    ],
    [
        "id" => 4,
        "email" => "snow@test.com",
        "password" => "asdfg",
        "name" => "Snow",
        "year" => "4th Year"
    ],
    [
        "id" => 5,
        "email" => "mochi@test.com",
        "password" => "zxcvb",
        "name" => "Mochi",
        "year" => "3rd Year"
    ],
];


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $foundUser = null;
    foreach ($users as $u) {
        if ($u['email'] === $email && $u['password'] === $password) {
            $foundUser = $u;
            break;
        }
    }

    if ($foundUser) {
        $_SESSION['user'] = $foundUser;
        header("Location: profile.php?user=" . $foundUser['id']);
        exit();
    } else {
        $error = "Invalid email or password!";
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
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
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
            width: 100%;
            max-width: 380px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-white" href="#">PHP</a>
  </div>
</nav>

<div class="card shadow p-4">
    <h3 class="mb-3 text-center">Login</h3>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Validation
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
