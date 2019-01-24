<html>
<head>
	<title>Rexistro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	
	<?php
		include './database.php';
	
		$lectura = "SELECT * FROM Habitos;";
		$habitos = mysqli_query($conn, $lectura);
	?>
	<table class="table">
		<tr>
			<td></td>
			<?php
				$hoxe = mktime(0,0,0);
				for ($dias=4;$dias>=0;$dias=$dias--) {
				 echo "<td>" . date('j/n/Y', $hoxe-$dias*24*60*60) . "</td>";
				 }
			?>
		</tr>
		<?php
		while ($hab = mysqli_fetch_array($habitos)) {
			echo "<tr><td>" . $hab['Nome'] . "</td>";
			for ($i=1; $i<=5; $i++) {
			echo "<td><button type=\"button\" class=\"btn btn-light\"><i class=\"far fa-check-circle\"></i></button></td>";
			}
			echo "</tr>";
		}
	?>
		
	</table>
</body>
</html>
