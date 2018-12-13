<?php
  include('config.php');

      //Initializes variables
      
  $name = "";
  $genre = "";
  $id = 0;
  $pages = "";
  $update = false;

      //Pushes data to database

  if(isset($_POST['save'])) {
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $pages = $_POST['pages'];

    mysqli_query($db, "INSERT INTO info (name, genre, pages) VALUES ('$name', '$genre', '$pages')");
    $_SESSION['message'] = "Saved";
    header('location: main.php');
  }

    //Updates data to database

  if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
  $genre = $_POST['genre'];
  $pages = $_POST['pages'];

	mysqli_query($db, "UPDATE info SET name='$name', genre='$genre', pages='$pages' WHERE id=$id");
	$_SESSION['message'] = "Updated!";
	header('location: main.php');
  }

    //Deletes data from database

  if(isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Deleted!";
	header('location: main.php');
  }

  if(!$_SESSION['loggedin']) {
    header('location: ../../index.php');
  }
 ?>
