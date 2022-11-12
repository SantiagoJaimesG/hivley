<?php
	header('Location: contenedor.php');
	$servername = "localhost";
	$username = "id19701963_hivleysan";
	$password = "Santiagogamboa18_";
	$dbname = "id19701963_bdhivley";

	$nombre=$_POST["nombre"];
	$email=$_POST["email"];
	$contrasena=$_POST["contrasena"];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}


	$sql2 = "INSERT INTO usuarios (nombre, correo, contrasena)
	VALUES ('$nombre', '$email', '$contrasena')";

	if ($conn->query($sql2) === TRUE) {
	  #echo "New record created successfully";
	} else {
	  echo "Error: " . $sql2 . "<br>" . $conn->error;
	}

	$conn->close();

	
?>