<?php 

    include_once('db.php');
    $conectar = conn();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/descarga-assets/Captura.png" type="image/x-icon">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
	 <link rel="stylesheet" type="text/css" href="css/mapa.css">
	<title>Mapa turistico</title>
	<h1>Visita los sitios turisticos de buenaventura</h1>

	<header>
                        <nav>
                            <a href="inicioadmin.php">Inicio</a>
                        </nav>
                </header>
				

	<input list="selec-location" id="select-location">
				<datalist id="selec-location">
					
					<?php

				$sqli="SELECT * FROM lugares";
				$result=mysqli_query($conectar,$sqli);

				while ($mostrar=mysqli_fetch_array($result)) {
					
				?>

						<option value="<?php echo $mostrar['coordenada']?>"><?php echo $mostrar['nombre']?></option>
					
				<?php 
					}
				?>
				</datalist>
	<div id="map"></div>
	

</head>
<body>

				

	<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
	 <script src="mapacos.js"></script>
</body>
</html>
