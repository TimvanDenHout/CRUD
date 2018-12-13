<?php
  include('server.php');
  @include('login.php');

    //Sets update variables

  if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
  	$update = true;
  	$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

  	if (@count($record) == 1 )	{
  		$n = mysqli_fetch_array($record);
  		$name = $n['name'];
  		$genre = $n['genre'];
      $pages = $n['pages'];
  	}
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CRUD 83401</title>
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
  </head>
  <body>
    <nav>
      <div class="navbar">
        <h2>LOGGED IN AS: </h2>
        <?php if (isset($_SESSION['loggedin'])): ?>
          <h2><?php
            echo $_SESSION['loggedin'];
          ?></h2>
        <?php endif ?>
        <a class="blue_btn" href="profile.php">Profile</a>
        <a class="red_btn" href="sessionDestroy.php">Logout</a>
      </div>
    </nav>

    <main>
      <div class="wrapper1">
        <?php if (isset($_SESSION['message'])): ?>
          <div class="msg">
            <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
             ?>
          </div>
        <?php endif ?>
        <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Genre</th>
              <th>Pages</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['genre']; ?></td>
              <td><?php echo $row['pages']; ?></td>
              <td>
                <a href="main.php?edit=<?php echo $row['id']; ?>" class="blue_btn">Update</a>
              </td>
              <td>
                <a href="server.php?del=<?php echo $row['id']; ?>" class="red_btn">Delete</a>
              </td>
            </tr>
           <?php } ?>
        </table>
      </div>
      <div class="wrapper2">
        <form method="post" action="server.php">
		        <div class="input-group">
			  <input type="hidden" name="id" value="<?php echo $id; ?>">
              <label>Name</label>
              <input type="text" name="name" value="<?php echo $name; ?>">
		        </div>
            <div class="input-group">
              <label>Genre</label>
              <input type="text" name="genre" value="<?php echo $genre; ?>">
		        </div>
            <div class="input-group">
              <label>Pages</label>
              <input type="text" name="pages" value="<?php echo $pages; ?>">
		        </div>
		        <div class="input-group">
				  <?php if ($update == true): ?>
					<button class="btn" type="submit" name="update" >Update</button>
				  <?php else: ?>
					<button class="btn" type="submit" name="save" >Save</button>
          <?php endif; ?>
            </div>
        </form>
	  </div> <!-- END div.wrapper -->
    </main>
	<footer>
    <h2>CRUD system,&nbsp;&nbsp;Made by: Tim van den Hout&nbsp;&nbsp;<?php echo "20".date("y");?> </h2>
	</footer>
  </body>
</html>
