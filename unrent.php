<!doctype html>
<head>
  <style>
    .error {color: #FF0000;}
  </style>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
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
	
	
	
		//mysqli_query($conn, "UPDATE videoinventory SET rented = 0 WHERE name ='" . $_GET["name"] . "'");
		$stmt = $conn->prepare("UPDATE videoinventory SET rented = 0 WHERE name = ?");
		$stmt->bind_param("s", $name);
		$name = $_GET["name"];
		$stmt->execute();

		echo "Return Success!";
	
?>
<br> <br>
	<a href="display.php" role="button" class="btn btn-danger">Return to Main Menu</a>
</body>
</html>