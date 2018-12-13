<?php
include("config.php");

  //Check if the upload succeeded
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

  //Check file type

  if ($_FILES['file']['type'] == "image/jpg" ||
	 $_FILES['file']['type'] == "image/jpeg" ||
	 $_FILES['file']['type'] == "image/pjpeg" ||
	 $_FILES['file']['type'] == "image/png" ||
	 $_FILES['file']['type'] == "image/gif") {

	 //Set folder location

	 $folder = "../images/";

	 //Change file name

	 $file = $_SESSION['uID'] . '.jpg';

	 //Move file to the right folder with the right name

	 move_uploaded_file($_FILES['file']['tmp_name'], $folder . $file);

	//Send user back to profile.php

	 $_SESSION['notice'] = "Avatar updated!";
   $_SESSION['loggedin'] = $_SESSION['loggedin'];
   header('location: profile.php');

  } else {
	  $_SESSION['error'] = "Wrong file type, only jpg/jpeg/pjpeg/png/gif supported!";
    header('location: profile.php');
  }
} else {
	$_SESSION['error'] = "Error uploading file!";
  header('location: profile.php');
}
?>
