<?php
	//Redirigimos a la página proncipal, si no se han introducido datos
    if(!isset($_POST['place-button'])){
        header("Location: ./index.php");
    }
	if(isset($_POST['back-button'])){
        header("Location: ./index.php");
		unset($_POST['back-button']);
    }

    require_once("./database/database.php");
    // Conectamos con la BBDD
    connect();

	/**Usaremos el ID de la ciudad para hacer la llamada a la API de openweathermap.
	 * Para hacer la llamada utilizaremos cURL. La respuesta CURL estará en formato JSON y al decodificar 
	 * la respuesta JSON, podemos obtener los datos meteorológicos y poblarlos en el navegador.
	 */
    $weather_place = querie_locales_by_place($_POST['chosen-place']);
	$locales_by_place = querie_locales_by_place($_POST['chosen-place']);
	$apiKey = "3bea0aeb766feea785d1c43f9efe6467";
	$cityId = '';
	if ($marcadorPlace = get_results($weather_place)){
		extract($marcadorPlace);
		$cityId = $idCiudad;
	}
	
	$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);

	curl_close($ch);
	$data = json_decode($response);
	$currentTime = time();
?>
<html>
	<head>
		<title>ACTIVIDAD 06 M07</title>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

		<link rel="stylesheet" type="text/css" href="./styles/style.css" />
        <link rel="stylesheet" type="text/css" href="./styles/map-style.css" />

		<!-- Metemos el script dentro del html-->
		<script type="text/javascript">
			let map;

			function initMap() {
				
				// Coordenadas
				const myLatLng = { lat: 53.33579, lng: -6.26899 };
				const map = new google.maps.Map(document.getElementById("map"), {
					zoom: 11,
					center: myLatLng,
				});
				// Quiero coger macadores de mi BBDD y ponerlos dentro de este mapa
				let misMarcadores = [];

				<?php 
					while($marcador = get_results($locales_by_place)){
						extract($marcador);
						// echo + códio javascript
						echo "misMarcadores.push(['".$nombre."', '".$poblacion."', '".$tipo."', ".$coordenadas."]);";
					}
				?>

				const infowindow = new google.maps.InfoWindow();

				// Marcador
				misMarcadores.forEach(([nombre, tipo, poblacion, coordenadas], i) => {
					const marker = new google.maps.Marker({
						position: coordenadas,
						map,
						title: `${nombre}`,
					});
					// le añado un listener
					marker.addListener("click", () => {
						infowindow.setContent("<h3>"+nombre+"</h3><p>"+tipo+"</p><p>"+poblacion+"</p>");
						infowindow.open({
						anchor: marker,
						map,
						});
					});
				});
			}
			window.initMap = initMap;
		</script>
	</head>
	<body>
		<?php require_once("./page-sections/header.html"); ?>
		<div>
			<h2>
				<?php echo $_POST['chosen-place']?>
			</h2>
		</div>
		<div id="map"></div>
		<!-- Poner nuestra APIKEy -->
		<script
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_KtLIQpdb7whrYjSctclR2eHhLrf5TAg&callback=initMap&v=weekly"
			defer
		></script>

		<!-- Weather API -->
		<div class="report-container">
			<h2>El tiempo en <?php echo $data->name; ?></h2>
			<div class="time">
				<div><?php echo date("l g:i a", $currentTime); ?></div>
				<div><?php echo date("jS F, Y",$currentTime); ?></div>
				<div><?php echo ucwords($data->weather[0]->description); ?></div>
			</div>
			<div class="weather-forecast">
				<img
					src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
					class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
					class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
			</div>
			<div class="time">
				<div>Humedad: <?php echo $data->main->humidity; ?> %</div>
				<div>Viento: <?php echo $data->wind->speed; ?> km/h</div>
			</div>
		</div>
		<br>
		<div>
			<form method='post' action=''>
            	<input type="submit" name="back-button" value="Volver"/>
			</form>
        </div>
	</body>
</html>
<?php
    close_conexion();
?>