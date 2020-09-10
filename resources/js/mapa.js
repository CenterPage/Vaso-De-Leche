import { OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();

document.addEventListener('DOMContentLoaded', () => {

	const lat = document.querySelector('#latitud').value === '' ?  -5.1995471 : document.querySelector('#latitud').value;
	const lng = document.querySelector('#latitud').value === '' ?  -80.6227001 : document.querySelector('#latitud').value;

	const mapa = L.map('mapa').setView([lat, lng], 16);

	// Eliminar pines previos
	let markers = new L.FeatureGroup(mapa);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(mapa);

	let marker;

	// agregar el pin
	marker = new L.marker([lat, lng], {
		draggable: true,	
		autoPan: true
	}).addTo(mapa);

	// Agregar el pin a las capas
	markers.addLayer(marker);

	//GeoCode Service
	const geocodeService = L.esri.Geocoding.geocodeService();

	// Buscador de direcciones
	const buscador = document.querySelector('#location');
	buscador.addEventListener('blur', buscarDireccion);

	reubicarPin(marker);

	function reubicarPin(marker) {
		// Detectar movimiento del marker
		marker.on('moveend', function(e) {
			marker = e.target;

			const posicion = marker.getLatLng();

			// console.log(posicion);

			// Centrar automaticamente
			mapa.panTo( new L.LatLng(posicion.lat, posicion.lng) );

			// Reverse Geocoding, cuando el usuario reubica el pin
			geocodeService.reverse().latlng(posicion, 16).run(function(error, resultado) {

				// console.log(resultado.address);

				marker.bindPopup(resultado.address.LongLabel);
				marker.openPopup();

				llenarInputs(resultado);
			});

		});
	}

	function buscarDireccion(e) {

		if (e.target.value.length > 1) {

			provider.search( { query: e.target.value + ' Perú ' } )
				.then(resultado => {

					// console.log(resultado);

					if (resultado[0]) {

						// Limpiar pines previos
						markers.clearLayers();

						// Reverse Geocoding, cuando el usuario reubica el pin
						geocodeService.reverse().latlng(resultado[0].bounds[0], 16).run(function(error, resultado) {
							// console.log(resultado);

							// Llenar los inputs
							llenarInputs(resultado);

							// Centrar el mapa
							mapa.setView(resultado.latlng)

							// Agregar el pin
							marker = new L.marker(resultado.latlng, {
								draggable: true,	
								autoPan: true
							}).addTo(mapa);

							// Asignar el contenedor de markers y el nuevo pin
							markers.addLayer(marker);

							// Mover el pin
							reubicarPin(marker);

						});
					}
				})
		}
		
		console.log(e);
	}

	function llenarInputs(resultado) {
		document.querySelector('#address').value = resultado.address.Address;
		document.querySelector('#latitud').value = resultado.latlng.lat;
		document.querySelector('#longitud').value = resultado.latlng.lng;
	}
});