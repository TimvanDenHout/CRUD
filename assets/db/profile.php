<?php
  session_start();
  if(!$_SESSION['loggedin']) {
    header('location: ../../index.php');
  }

 ?>
<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <link rel="stylesheet" href="../css/profilestyle.css" type="text/css">
  </head>
  <body>
    <nav>
      <div class="navbar">
        <h2>PROFILE: <?php echo $_SESSION['loggedin']; ?></h2>
        <a class="blue_btn" href="main.php">CRUD</a>
        <a class="red_btn" href="sessionDestroy.php">Logout</a>
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
      <?php elseif (isset($_SESSION['error'])): ?>
        <div class="error">
          <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
           ?>
        </div>
      <?php endif ?>
      <?php if (file_exists('../images/' . $_SESSION['uID'] . '.jpg')) {
         echo "<p><img src='../images/" . $_SESSION['uID'] . ".jpg' alt='avatar'></p>";
       } ?>
      <h2><?php echo $_SESSION['loggedin']; ?></h2>
      <form action="profilefunc.php" method="post" enctype="multipart/form-data">
        <input type="file" id="file" name="file">
        <input class="btn" type="submit" name="upload" value="Upload">
      </form>

    </main>
    <footer>
      <h2>CRUD system,&nbsp;&nbsp;Made by: Tim van den Hout&nbsp;&nbsp;<?php echo "20".date("y");?> </h2>
    </footer>
  </body>
</html>
