
<?php


/*
"parameters":{
"dataset":"bornes-irve",
"timezone":"UTC",
"rows":10,
"start":0,
"format":"json",
"geofilter.distance":[
"45.764043,4.835659,5000"
],
"facet":[
"region"
]
},


$url = 'url_to_post';
$data = array("first_name" => "First name","last_name" => "last name","email"=>"email@gmail.com","addresses" => array ("address1" => "some address" ,"city" => "city","country" => "CA", "first_name" =>  "Mother","last_name" =>  "Lastnameson","phone" => "555-1212", "province" => "ON", "zip" => "123 ABC" ) );

$postdata = json_encode($data);

$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
*/

/*$data = [
	"dataset" => "bornes-irve",
	"timezone"=>"UTC",
	"rows"=>10,
	"start"=>0,
	"format"=>"json",
	"geofilter.distance"=>[
	"45.764043,4.835659,5000"
	],
	"facet"=>[
		"region"
	]
];*/

$depart = strtolower($_POST['depart']);
$arrivee = strtolower($_POST['arrivee']);
$tab = [



"lyon" => [45.764043,4.835659],

"paris" => [48.8534,2.3488],

"marseille" => [43.2967,5.37639],

"annecy" => [45.899247,6.129384],

"aix-les-bains" => [45.692341,5.908998],

"chambery" => [45.564601,5.917781],

"bourget-du-lac" => [45.648,5.859],

"grenoble" => [45.188529,5.724524],
"avignon" => [43.949317,4.805528],  
"aix-en-provence" => [43.529742,5.447427],   
"Toulouse" => [43.604652,1.444209],  
"Valence" => [44.933393,4.89236], 

];



$coord = "&geofilter.distance=".$tab[$depart][0].",".$tab[$depart][1].",5000";

//$coord= "&geofilter.polygon=".$tab[$depart][0].",".$tab[$arrivee][1].",(43.2967,5.37639)";


$url = "https://opendata.reseaux-energies.fr/api/records/1.0/search/?dataset=bornes-irve&q=&facet=region".$coord."&rows=15";
//$url = "https://opendata.reseaux-energies.fr/api/records/1.0/search/?dataset=bornes-irve&q=&".$coord."&rows=15";
$curl = curl_init($url);




/*curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($curl, CURLOPT_TIMEOUT, 1); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 

curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$data = curl_exec($curl);*/

curl_setopt_array($curl, [

	CURLOPT_SSL_VERIFYPEER => false,
	//CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR .'cert.cer',
	CURLOPT_RETURNTRANSFER => true ,
	CURLOPT_TIMEOUT => 1 ,


]);


$data = curl_exec($curl);
//echo $data;
$data = json_decode($data, true);



/*if ($data === false) {
	// code...

	var_dump(curl_error($curl));
}
else {

		if (curl_getinfo($curl,CURLINFO_HTTP_CODE) === 200 )
			{

				//echo $data;


	$data = json_decode($data, true);

	echo ' Voici les bornes :'." " . $data['records']['0']['fields']['ad_station'] . " ". '| ' . $data['records']['1']['fields']['ad_station'];
	
	//echo '<pre>';

	//var_dump();
	//echo '</pre>';

			}

			
}*/
?>


<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet"href="css/styles_bornes.css">
	
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Holtwood+One+SC">

	<meta charset="utf-8">
	<title>Les bornes</title>
</head>
<body>
	<div class="container site">

			<h1 class="text-logo"> <span class="glyphicon glyphicon-wrench"></span>  ReMycar <span class="glyphicon glyphicon-wrench" ></span></h1>
	

	<div class="container">
		
			<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>Type de prise</th>
					<th>Accessibilité</th> 
					<th>Adresse de la station</th>
					<!--<th>Puisssance  Max</th>-->
					<th>Nom de la station</th>
					<!--<th>Nom de l'enseigne</th>-->
					<th>Nom  de l'operateur</th>
					<th>Acces recharge</th>
				</tr>
			</thead>

<tbody>
				<?php 

					$records = $data["records"];
				
                    for($i=0; $i< sizeof($records); $i++){
                    	echo "<tr> ";
                    	echo "<td>".$records[$i]["fields"]["type_prise"]."</td> ";
                    	echo "<td>".$records[$i]["fields"]["accessibilite"]."</td> ";
                    	echo "<td>".$records[$i]["fields"]["ad_station"]."</td> ";
                    	//echo "<td>".$records[$i]["fields"]["puiss_max"]."</td> ";
                    	echo "<td>".$records[$i]["fields"]["n_station"]."</td> ";
                    	//echo "<td>".$records[$i]["fields"]["n_enseigne"]."</td> ";
                    	echo "<td>".$records[$i]["fields"]["n_operateur"]."</td> ";
                    	echo "<td>".$records[$i]["fields"]["acces_recharge"]."</td> ";

                 
    						
                    	echo "</tr>";


                    	

                    
                    }
				?>
			</tbody>
		</table>

	</div>
		<div style="margin-top: 30px;">
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-hand-left"></span> <a href="index.php">Retour</a> </button>
			</div>
			
	</div>

	
				
</body>
</html>



<?php

curl_close($curl);


?>
