let map = L.map('map').setView([3.888364808711694, -77.07797975568896],17)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

/*Poner marcador en una cordenada*/
L.marker([3.888364808711694, -77.07797975568896],17).addTo(map)
    .bindPopup('Hola.<br> puchica.')
    .openPopup();

/*Ventana emergente en el mapa*/
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
