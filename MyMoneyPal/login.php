<?php

require('config.php');
session_start();
$errormsg = "";
if (isset($_POST['email'])){

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $query = "SELECT * FROM `users` WHERE email='$email'and password='" . md5($password) . "'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
      $_SESSION['email'] = $email;
      header("Location: index.php");
    } else {
      $errormsg  = "Wrong";
    }
  } else {
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login | MyMoneyPal</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #fff8e1;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .signup-form {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgb(255 193 7 / 0.2);
      max-width: 420px;
      width: 100%;
      padding: 40px 30px 50px;
      position: relative;
    }

    .signup-form .logo {
      display: block;
      margin: 0 auto 25px;
      width: 72px;
      height: 72px;
      background: #ffc107;
      border-radius: 50%;
      box-shadow: 0 3px 12px rgb(255 193 7 / 0.4);
      font-weight: 900;
      font-size: 42px;
      line-height: 72px;
      text-align: center;
      color: #fff;
      user-select: none;
      font-family: 'Segoe UI Black', sans-serif;
    }

    h2 {
      text-align: center;
      color: #b28704;
      font-weight: 700;
      margin-bottom: 30px;
      letter-spacing: 1.3px;
    }

    form .form-group {
      margin-bottom: 18px;
    }

    input.form-control {
      width: 100%;
      padding: 14px 18px;
      border-radius: 8px;
      border: 2px solid #ffeb3b;
      font-size: 15px;
      color: #555;
      outline-offset: 3px;
      outline-color: transparent;
      transition: outline-color 0.25s ease, border-color 0.25s ease;
      box-shadow: inset 0 1px 4px rgb(0 0 0 / 0.05);
    }
    input.form-control::placeholder {
      color: #bfae25;
    }
    input.form-control:focus {
      outline-color: #fbc02d;
      border-color: #fbc02d;
      box-shadow: 0 0 6px #fbc02daa;
    }

    label.form-check-label {
      font-size: 13px;
      color: #7a6a00;
      user-select: none;
    }

    button.btn {
      width: 100%;
      background: #fbc02d;
      border: none;
      padding: 15px 0;
      font-weight: 700;
      font-size: 16px;
      border-radius: 12px;
      color: #5a4500;
      cursor: pointer;
      box-shadow: 0 6px 12px rgb(251 192 45 / 0.4);
      transition: background 0.3s ease, color 0.3s ease;
      letter-spacing: 0.8px;
    }
    button.btn:hover {
      background: #ffca28;
      color: #4a3a00;
    }
    button.btn:active {
      background: #caa300;
      color: #fff;
    }

    .text-center {
      margin-top: 18px;
      font-size: 14px;
      text-align: center;
      color: #a38500;
    }
    .text-center a {
      color: #fbc02d;
      font-weight: 600;
      text-decoration: none;
    }
    .text-center a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .form-group .row {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<div class="signup-form">
  <div class="logo" aria-label="BudgetBee logo">🐝</div>
  <form action="" method="POST" autocomplete="off">
    <h2>Login</h2>
    <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label class="form-check-label">
        <input type="checkbox"> Remember me
      </label>
    </div>
    <div class="form-group">
      <button type="submit" class="btn">Login</button>
    </div>
  </form>
  <div class="text-center">
    Don't have an account? <a href="register.php">Register Here</a>
  </div>
</div>

</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
<script>
  feather.replace()
</script>

</html>