<?php
session_start();
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register ITE 370</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>Create Account</h2>
  //htmlspecialchars
  <?php if(isset($_SESSION['error'])): ?>
    <div class="error" style="text-align:center; margin:0 30px 20px;"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>

  <form action="register_process.php" method="POST">
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required placeholder="you@example.com">
    </div>

    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required minlength="6" placeholder="At least 6 characters">
    </div>

    <button type="submit">Register</button>

    <div class="switch">
      Already have an account? <a href="index.php">Login here</a>
    </div>
  </form>
</div>

</body>
</html>