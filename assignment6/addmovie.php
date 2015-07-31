<?php

  $dbhost = 'localhost';
  $dbname = 'videodb';
  $dbuser = 'root';
  $dbpass = '';

  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

  if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }

  $name = $_POST['name'];
  $category = $_POST['category'];
  $length = $_POST['length'];

  $input = "INSERT INTO `videodb`.`videoinventory` (`id`, `name`, `category`, `length`, `rented`) 
  VALUES (NULL, '$name', '$category', '$length', '0')";
  
  if(mysqli_query($conn, $input)) {
    echo "New record created succesfully! <br>";
    echo '<a href="display.html" class="btn btn-default" role="button">Return to Main Menu</a>';
  } else {
    echo "Error: " . $input . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

?>