<!DOCTYPE html>
<html>
<head> 
	<meta name="viewport" content="width=device-width ,initial-scale=1">
	<meta charset="utf-8">
	<title> Recharge my car</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet"href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Holtwood+One+SC">
</head>
<body>
 









	 <div class="container site">

		<h1 class="text-logo"> <span class="glyphicon glyphicon-wrench"></span>  ReMycar <span class="glyphicon glyphicon-wrench" ></span></h1>
	
	<div class="container-fluid" style="margin: 50px;">


			
					<div class="dropdown">
						
						<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Liste vehicule <span class="caret"></span> </button>

						<ul class="dropdown-menu">
							

							<?php

								/*require 'database.php';
								$db = Database::connecter();
								$statement = $db->query('SELECT items.id, items.Modele FROM items');
								while($item = $statement->fetch())
								{

									echo '<li><a href="#">' . $item['Modele'].'</a></li>';
									
								}*/

							?>

						</ul>

					</div>
			
		<div class="row">
			<form  action="bornes.php" method="post" class="form-inline"style="margin: 50px;">
				

			<div > <label style="color: white;" >Trajet :</label></div>
					<div class="form-group">
					<label for="depart" style="color: white;"> Départ: </label>
					<input name="depart" type="text"  id ="depart" class="form-control">
				</div>

				<div class="form-group">
					
					<label for="arrivee" style="color: white;"> Arrivée: </label>
					<input name="arrivee" type="text"  id ="arrivee" class="form-control">
				</div>
				<div style="margin-top: 30px;">
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Rechercher </button>
			</div>
				
			</form>
			
		</div>
		

	</div>

</div>

</body>
</html>
