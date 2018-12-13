<?php
include('config.php');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

      //Checks if forms are filledi in

if (isset($_POST['username'])) {
  if ($_POST['username'] == "" || $_POST['password'] == "") {

    $_SESSION['error'] = "Missing fields!";
    header('location: ../../index.php');

  } else {

      //Checks if name/password exists in the database

    $username = $_POST['username'];
    $hashedPassword = hash_hmac('sha256', $_POST['password'], $key);
    $check = "SELECT * FROM users WHERE name = '$username' and password = '$hashedPassword'";
    $rs = mysqli_query($db, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);



    //Checks if username/password are correct

    if ($data[0] < 1 || $data[0] == 0) {

      $_SESSION['error'] = "Incorrect username/password!";
      header('location: ../../index.php');

    }elseif (@count($rs) == 1 ) {

     $_SESSION['uID'] = $data[0];

    $_SESSION['loggedin'] = $username;
    header('location: main.php');

   }
  }
 }


?>
