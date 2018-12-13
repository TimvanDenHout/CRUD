<?php  ?>
<?php
  include('config.php');

  $check = "SELECT * FROM users WHERE name = '$_POST[username]'";
  $rs = mysqli_query($db, $check);
  $data = mysqli_fetch_array($rs, MYSQLI_NUM);


  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

      //Checks if forms are filled in

    if (isset($_POST['username'])) {
      if ($_POST['username'] == "" || $_POST['password'] == "") {
        $_SESSION['error'] = "Missing fields!";
        header('location: register.php');

      //Checks if username already exists in the database

      } elseif($data[0] > 1){
        $_SESSION['error'] = "Name already taken!";
        header('location: register.php');
      } else {

      //Encrypts the password

        $username = $_POST['username'];
        $password = hash_hmac('sha256', $_POST['password'], $key);

      //Pushes information into database
        mysqli_query($db, "INSERT INTO users (name, password) VALUES ('$username', '$password')");
        $_SESSION['notice'] = "Succesfully registered!";
        header('location: ../../index.php');
    }
  }
?>
