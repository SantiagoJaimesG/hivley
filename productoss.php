<?php
	$servername = "localhost";
	$username = "id19701963_hivleysan";
	$password = "Santiagogamboa18_";
	$dbname = "id19701963_bdhivley";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM producto";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    echo "<div class='dflex'><div class='imgpro'><img src='".$row["imagen"]."'></div><div class='nombrepro'><p>".$row["nombre"]."</p></div></div>";
	  }
	} else {
	  echo "0 results";
	}
	$conn->close();
?>