<?php include('assets/db/login.php'); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta charset="UTF-8">
<title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/loginstyle.css" type="text/css">
</head>
<body>
  <nav>
    <div class="navbar">
      <h2>CRUD SYSTEM LOGIN</h2>
    </div>
  </nav>
  <main>
	<?php if (isset($_SESSION['notice'])): ?>
      <div class="ntc">
        <?php
          echo $_SESSION['notice'];
          unset($_SESSION['notice']);
         ?>
      </div>
	<?php endif ?>
    <?php if (isset($_SESSION['error'])): ?>
      <div class="error">
        <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
         ?>
      </div>
    <?php endif ?>
    <form method="post" action="assets/db/login.php">
      <div class="wrapper">
        <label>Username</label>
        <input type="text" name="username" value="">
        <label>Password</label>
        <input type="password" name="password" value="">
      </div>
      <input class="btn" type="submit" name="submit" value="Login">
    </form>
    <p>No account? <a href="assets/db/register.php">Register</a> here!</p>
  </main>
  <footer>
    <h2>CRUD system,&nbsp;&nbsp;Made by: Tim van den Hout&nbsp;&nbsp;<?php echo "20".date("y");?> </h2>
  </footer>
</body>
</html>
