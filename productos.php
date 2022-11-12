<?php
	$servername = "localhost";
	$username = "id19701963_hivleysan";
	$password = "Santiagogamboa18_";
	$dbname = "id19701963_bdhivley";


	$nombre=$_POST["nombre"];
	$imagen=$_POST["imagen"];
	$descripcion=$_POST["descripcion"];
	$opcion=$_POST["opcion"];

	if ($opcion=="Featured") {
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}


		$sql2 = "INSERT INTO favoritos (nombre, imagen, descripcion)
		VALUES ('$nombre', '$imagen', '$descripcion')";

		if ($conn->query($sql2) === TRUE) {
		  #echo "New record created successfully";
		} else {
		  echo "Error: " . $sql2 . "<br>" . $conn->error;
		}

		$conn->close();
	}else if($opcion=="Graphics and Desing"){
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}


		$sql2 = "INSERT INTO producto (nombre, imagen, descripcion)
		VALUES ('$nombre', '$imagen', '$descripcion')";

		if ($conn->query($sql2) === TRUE) {
		  #echo "New record created successfully";
		} else {
		  echo "Error: " . $sql2 . "<br>" . $conn->error;
		}

		$conn->close();
	}else if($opcion=="Hobbies"){
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}


		$sql2 = "INSERT INTO hobbies (nombre, imagen, descripcion)
		VALUES ('$nombre', '$imagen', '$descripcion')";

		if ($conn->query($sql2) === TRUE) {
		  #echo "New record created successfully";
		} else {
		  echo "Error: " . $sql2 . "<br>" . $conn->error;
		}

		$conn->close();
	}

	header('Location: contenedor.php');
?>