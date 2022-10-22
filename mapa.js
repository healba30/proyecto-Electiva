/* le damos una ubicación inicial al mapa*/
var map = L.map('map').setView([3.8757474,-77.0582218], 13);


/*Traemos el tile del mapa y lo agregamos a el mismo desde http://www.openstreetmap.org/copyright*/
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


/*Poner marcador en una cordenada*/
var marker = L.marker([3.8757474,-77.0582218]).addTo(map);

/*Ventana emergente en el mapa*/
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);

/* Profe esta parte no me quiere agregar el mapa en el html. Lo he probado de diferentes formas para que funcione pero nada*/