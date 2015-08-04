<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Movie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php

     $dbhost = "oniddb.cws.oregonstate.edu";
      $dbname = "mcdoncam-db";
      $dbuser = "mcdoncam-db";
      $dbpass = "xOwqKHjWfOFiJdfA";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }

    $filled = true;
    $required = array("name", "category", "length");

    foreach ($required as &$value) {
      if ($_POST[$value] == "") {
        $filled = false;
      }
    }

    if (!$filled) {
      header("Location: addmovie.html");
    }
    
    else {
      $name = $_POST["name"];
      $category = $_POST["category"];
      $length = $_POST["length"];
      if (preg_match("/[^0-9]/",$length) || preg_match("/[^a-z]/",$category)) {
         $showErr = "Only numbers allowed for length and letters for category";
         echo $lengthErr;
         echo "<br>";
         header("Location: addmovie.html");
      } else {
        $input = "INSERT INTO `mcdoncam-db`.`videoinventory` (`id`, `name`, `category`, `length`, `rented`) 
        VALUES (NULL, '$name', '$category', '$length', '0')";
      }
      if(mysqli_query($conn, $input)) {
      echo "New record created succesfully! <br>";
      echo "Your Input:";
      echo "Movie Name: ". $name . "<br>";
      echo "Category: ". $category . "<br>";
      echo "Length of Movie (minutes): " . $length . "<br>";
      } else {
        echo "Error: " . $input . "<br>" . mysqli_error($conn);
      }
    }
    mysqli_close($conn);
  ?>
  <br>
  <a href="display.php" role="button" class="btn btn-danger">Return to Main Menu</a>
</body>
</html>