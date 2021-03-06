let map;
let markers = L.layerGroup();

const options = {
	jember: {
		lat: -8.168885,
		lng: 113.702228,
		zoom: 10.5,
	},
	jti: {
		lat: -8.157628,
		lng: 113.722688,
		zoom: 18,
	},
};
const TOKEN =
	"pk.eyJ1IjoibmFkYWhhc25pbSIsImEiOiJja3A2NnAwaWEwbnFzMnBxdGlxNmtuaWUzIn0.oU7Cg2023mBLDxWn3AOqhg";

function initMap() {
	map = L.map("map", {
		center: [options.jember.lat, options.jember.lng],
		zoom: options.jember.zoom,
	});

	L.tileLayer(
		`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}`,
		{
			attribution:
				'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: "mapbox/streets-v11",
			tileSize: 512,
			zoomOffset: -1,
			accessToken: TOKEN,
		}
	).addTo(map);

	// L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
	// 	attribution:
	// 		'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	// }).addTo(map);
}

function initMapContact() {
	map = L.map("mapContact", {
		center: [options.jti.lat, options.jti.lng],
		zoom: options.jti.zoom,
	});

	L.tileLayer(
		`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}`,
		{
			attribution:
				'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: "mapbox/streets-v11",
			tileSize: 512,
			zoomOffset: -1,
			accessToken: TOKEN,
		}
	).addTo(map);

	let jtiMarker = L.marker([options.jti.lat, options.jti.lng]).addTo(map);
	jtiMarker
		.bindPopup(
			"<b>Jurusan Teknologi Informasi</b><br>POLITKENIK NEGERI JEMBER."
		)
		.openPopup();
}

function initMapSingleMarker(lat, lng, name, alamat) {
	map = L.map("map", {
		center: [lat, lng],
		zoom: 14,
	});

	L.tileLayer(
		`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}`,
		{
			attribution:
				'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: "mapbox/streets-v11",
			tileSize: 512,
			zoomOffset: -1,
			accessToken: TOKEN,
		}
	).addTo(map);

	let jtiMarker = L.marker([lat, lng]).addTo(map);
	jtiMarker.bindPopup(`<b>${name}</b><br>${alamat}`).openPopup();
	jtiMarker.on("click", onMapClickMove);
}

function onMapClick(e) {
	alert("You clicked the map at " + e.latlng);
}

function onMapClickMove(e) {
	console.log(e);
	map.panTo(e.latlng);
}

function addMarker({ lat, lng, name, alamat, idPaguyuban }) {
	let marker = L.marker([lat, lng]);
	marker
		.bindPopup(
			`<b>${name}</b><br>${alamat}<br><a target="_blank" href="${BASE_URL}/detailpaguyuban/${idPaguyuban}">View Paguyuban</a>`
		)
		.openPopup();

	marker.on("click", onMapClickMove);
	markers.addLayer(marker);
	markers.addTo(map);
}

function addMarkerToMapForm(e) {
	clearAllMarkers();

	let marker = L.marker([e.latlng.lat, e.latlng.lng]);
	markers.addLayer(marker);
	markers.addTo(map);

	$("#latitudeAdd").val(e.latlng.lat);
	$("#longitudeAdd").val(e.latlng.lng);
}

function handleClickToAddMarker() {
	map.on("click", addMarkerToMapForm);
}

function handleClickToEditMarker({ lat, lng, name, alamat, idPaguyuban }) {
	let marker = L.marker([lat, lng]);
	marker
		.bindPopup(
			`<b>${name}</b><br>${alamat}<br><a target="_blank" href="${BASE_URL}/detailpaguyuban/${idPaguyuban}">View Paguyuban</a>`
		)
		.openPopup();

	markers.addLayer(marker);
	markers.addTo(map);

	map.panTo(marker.getLatLng());

	map.on("click", addMarkerToMapForm);
}

function clearAllMarkers() {
	markers.clearLayers();
}
