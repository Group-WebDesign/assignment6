<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CS290 HW6 ASSIGNMENT</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="style.css" rel="stylesheet">

  </head>

  <body>
    <div class="container">
      <br>
      <h1>Our Movie Database</h1>
      <hr>
      <div class="btn-group">
        <a href="addmovie.php" class="btn btn-success" role="button">Add A Movie</a>
       <!-- <button type="button" class="btn btn-primary">Rent A Movie</button>
        <button type="button" class="btn btn-warning">Remove A Movie</button>-->
        <a href="removeall.php" role="button" class="btn btn-danger">Remove ALL Movie</a>
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          Category <span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Animation</a></li>
            <li><a href="#">Comedy</a></li>
            <li><a href="#">Drama</a></li>
            <li><a href="#">Horror</a></li>
            <li><a href="#">SciFi</a></li> 
          </ul>
        </div>
      </div>
    </div>

    <br><br>

    <div class="panel panel-default">
      <div class="panel-heading"><font size="5">List of Movies: </font></div>
      <div class="panel-body">
      <style>
      table, th, td {
           border: 1px solid black;
           text-align: center;
      }
      </style>

      <?php
      $dbhost = "oniddb.cws.oregonstate.edu";
      $dbname = "mcdoncam-db";
      $dbuser = "mcdoncam-db";
      $dbpass = "xOwqKHjWfOFiJdfA";

      
      $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 

      $sql = "SELECT name, category, length, rented FROM `mcdoncam-db`.`videoinventory`";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
           echo "<table><tr><th>Name</th><th>Category</th><th>Length <br>(minutes)</th><th>Status <br>(0=Available, 1= Rented)</th><th>Delete</th><th>Availability</th></tr>";
           // output data of each row
           while($row = $result->fetch_assoc()) {
				if($row["rented"] == 0){
					echo "<tr><td>" . $row["name"]. "</td><td>" . $row["category"]. "</td><td>". $row["length"]. "</td><td>" . $row["rented"]. "</td><td><a href='delete.php?name=" . $row["name"] . "'>Delete</a></td><td><a href='rent.php?name=" . $row["name"] . "'>Rent</a></td></tr>";
				}else{
										echo "<tr><td>" . $row["name"]. "</td><td>" . $row["category"]. "</td><td>". $row["length"]. "</td><td>" . $row["rented"]. "</td><td><a href='delete.php?name=" . $row["name"] . "'>Delete</a></td><td><a href='unrent.php?name=" . $row["name"] . "'>Return</a></td></tr>";
				}	
		   }
           echo "</table>";
      } else {
           echo "0 results";
      }

      $conn->close();
      ?>  
        
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
