<?php
	//Redirigimos a la página proncipal, si no se han introducido datos
    if(!isset($_POST['type-button'])){
        header("Location: ./index.php");
    }
	if(isset($_POST['back-button'])){
        header("Location: ./index.php");
		unset($_POST['back-button']);
    }
    require_once("./database/database.php");
    // Conectamos con la BBDD
    connect();
    $locales_by_type = querie_locales_by_type($_POST['chosen-type']);
		
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
					zoom: 10,
					center: myLatLng,
				});
				// Quiero coger macadores de mi BBDD y ponerlos dentro de este mapa
				let misMarcadores = [];

				<?php 
					while($marcador = get_results($locales_by_type)){
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
				<?php echo $_POST['chosen-type']."s" ?>
			</h2>
		</div>
		<div id="map"></div>
		<!-- Maps API -->
		<script
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_KtLIQpdb7whrYjSctclR2eHhLrf5TAg&callback=initMap&v=weekly"
			defer
		></script>
		<br>
		<form method='post' action=''>
            <input type="submit" name="back-button" value="Volver"/>
		</form>
	</body>
</html>

<?php
    close_conexion();
?>