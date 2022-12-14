let map = L.map('map').setView([3.881142, -77.019255],15)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

/*Poner marcador en una cordenada*/

/*Ventana emergente en el mapa*/
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);

document.getElementById('select-location').addEventListener('change',function(e){
  let coords = e.target.value.split(",");
  L.marker(coords,17).addTo(map)
    .bindPopup('Hola.<br> Easily customizable.')
    .openPopup();
  
  map.flyTo(coords,17);
})





