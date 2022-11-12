<?php
	$servername = "localhost";
	$username = "id19701963_hivleysan";
	$password = "Santiagogamboa18_";
	$dbname = "id19701963_bdhivley";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/vista22.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div class="contenedor">
		<div class="header">
			<div class="noti">
				<img src="img/noti.png">
			</div>
			<div class="buscador">
				<div class="lupa"><img src="img/lupa.png"></div>
				<div class="sear"><input type="text" class="search" placeholder="What are you looking for today?">
				</div>
			</div>
		</div>

		<div class="featured">
			<div class="categoria">
				<div class="titulo"><h2>Featured</h2></div>
				<div class="todos"><p>See All (17)</p></div>
			</div>
			<div class="productos">
				<div class="producto">
					<div class="imgcal">
						<div class="cal">
							<div class="estrella"><img src="img/estrella.png"></div>
							<div class="num">4.7</div>
						</div>
						<div class="imgpro"><img src="img/pareja.png"></div>
					</div>
					<div class="nombrepro"><p>Amy’s mock Interviews</p></div>
				</div>
				<div class="producto">
					<div class="imgcal">
						<div class="cal">
							<div class="estrella"><img src="img/estrella.png"></div>
							<div class="num">4.7</div>
						</div>
						<div class="imgpro"><img src="img/calculadora.png"></div>
					</div>
					<div class="nombrepro"><p>Lion Tutors</p></div>
				</div>
				<div class="producto">
					<div class="imgcal">
						<div class="cal">
							<div class="estrella"><img src="img/estrella.png"></div>
							<div class="num">4.7</div>
						</div>
						<div class="imgpro"><img src="img/tarea.png"></div>
					</div>
					<div class="nombrepro"><p>Jacob’s resume tips</p></div>
				</div>
			</div>
		</div>

		<div class="graphics">
			<div class="categoria">
				<div class="titulo"><h2>Graphics and Design</h2></div>
				<div class="todos todosg"><p>See All (33)</p></div>
			</div>
			<div class="productos">
				<div class="producto">
					<?php
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
				</div>
				<div class="table"></div>
			</div>
		</div>

		<div class="hobbies">
			<div class="categoria">
				<div class="titulo"><h2>Hobbies</h2></div>
				<div class="todos"><p>See All (29)</p></div>
			</div>
			<div class="productos">
				<div class="producto">
					<div class="imgpro"><img src="img/music.png"></div>
					<div class="nombrepro"><p>Music</p></div>
				</div>
				<div class="producto">
					<div class="imgpro"><img src="img/balon.webp"></div>
					<div class="nombrepro"><p>Sports</p></div>
				</div>
				<div class="producto">
					<div class="imgpro"><img src="img/debate.png"></div>
					<div class="nombrepro"><p>Debate</p></div>
				</div>
			</div>
		</div>

		<div class="show">
			<h1>Show more categories</h1>
		</div>

		<div class="footer">
			<ul>
				<li>
					<div class="imgf"><img src="img/home.png"></div>
					<div class="textf"><p>Home</p></div>	
				</li>

				<li>
					<div class="imgf"><img src="img/lupa.png"></div>
					<div class="textf"><p>Search</p></div>	
				</li>

				<li>
					<div class="imgf create"><img src="img/create.png"></div>
					<div class="textf"><p>Create</p></div>	
				</li>

				<li>
					<div class="dash">
						<div class="dash1"><img src="img/dashboard1.png"></div>
						<div class="dash2"><img src="img/dashboard2.png"></div>
					</div>
					<div class="textf"><p>Dashboard</p></div>	
				</li>

				<li>
					<div class="imgf"><img src="img/profile.png"></div>
					<div class="textf"><p>Profile</p></div>	
				</li>

			</ul>
		</div>
	</div>

	<div class="popup">
		<div class="header">
			<div class="volver">
				<img src="img/volver.png">
			</div>
		</div>
		<div class="centro">
			<div class="text">
					<div class="text1"><h1>Welcome to the Hive!</h1></div>
					<div class="text2"><h2>Insert Your Product.</h2></div>
				</div>
			<div class="form">
				<form action="productos.php" method="post">
					<input type="text" name="nombre" placeholder="Enter the name of product">
					<input type="text" name="imagen" placeholder="Enter the image of product">
					<input type="text" name="descripcion" placeholder="Enter the des. of product">
					<select name="opcion">
						<option>Featured</option>
						<option>Graphics and Desing</option>
						<option>Hobbies</option>
					</select>
					<div class="register"><input type="submit" name="register" value="Register"></div>
				</form>
			</div>
		</div>
	</div>

	<script>
		$(".contenedor .footer ul li .create").click(function(){
			$(".popup").show();
			$(".contenedor").hide();
		});

		$(".popup .header .volver").click(function(){
			$(".contenedor").show();
			$(".popup").hide();
		});

		$(".contenedor .graphics .categoria .todosg").click(function(){

			let time = 1000;

			$.ajax({
				url: "productoss.php",

				beforeSend: function(){
					$(".table").html("<p>Cargando ...</p>");
				},

				success: function(datos){
					setTimeout(function(){
						$(".table").html(datos);
					}, time)
				},
			});

		});
	</script>
</body>
</html>

