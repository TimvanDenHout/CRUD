# CRUD

This CRUD is made as practice for school

## Assignment

"Make a CRUD system that allows me to read and delete data on the left side of the page and create and update data on the right side of the page, add a login system using SESSIONS add allow the user to upload an image that will then be displayed."

## Setup

Change the code in config.php to match your database settings

Example:

```pphp
<?php
  session_start();
  $db = mysqli_connect("host","user","password","schema");
  $key = "custom encryption key";
?>
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
