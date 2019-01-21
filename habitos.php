<html>
<head>
	<title>Habitos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	
	<?php
		include './database.php';

		//Crear novo habito (respuesta al POST)

		if (isset($_POST["nome"])){
			$insert = "INSERT INTO Habitos (Nome) VALUES ('" . $_POST["nome"] . "');";
			$result = mysqli_query($conn, $insert);
			echo $result;
			echo "<p>Habito " . $_POST['nome'] . " creado</p>";
		}
	
	// Borrar habito (respuesta al GET con parametros)
	if (isset($_REQUEST["borrar"])) {
		$delete = "DELETE FROM Habitos WHERE ID=" . $_REQUEST["borrar"] . ";";
		$result = mysqli_query($conn, $delete);
		echo $result;
		echo "Habito borrado";
	}

	?>
	<h1>Habitos</h1>
	<?php
		$lectura = "SELECT * FROM Habitos;";
		$habitos = mysqli_query($conn, $lectura);
		
		if(mysqli_fetch_array($habitos) > 0) {
			echo "<ul class=\"list-group\">";
		while($hab = mysqli_fetch_array($habitos)){
			echo "<li class=\"list-group-item\">" . $hab['ID'] . " - " . $hab['Nome'] . " <a href=\"habitos.php/?borrar=" . $hab['ID'] . "\">Borrar</a><br>";
	
		}
		echo "</ul>";
	} else {
		echo "Ainda non se creou ningun habito";
	}	
		?>
		<p>Se precisas axuda, le <a href="https://habitualmente.com/pasos-para-cambiar-de-habitos/">isto</a>.<p>
		<form name="habito" method="post" action="habitos.php">
			<input type="text" id="nome" name="nome">
			<button type="gardar" type="submit" class="btn btn-primary">Gardar</button>
	</form>
	
</body>
</html>
