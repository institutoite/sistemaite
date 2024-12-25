function initMap() {
  var locationsContainer = document.getElementById('locations');

      var locationDiv = document.createElement('div');
      locationDiv.className = 'location';
      var mapDiv = document.createElement('div');
      mapDiv.className = 'map';
      locationDiv.appendChild(mapDiv);
      var infoDiv = document.createElement('div');
      infoDiv.innerHTML = '<b>OFICINA CENTRAL</b><br>Villa 1 de mayo calle 16 oeste #9';
      locationDiv.appendChild(infoDiv);
      locationsContainer.appendChild(locationDiv);
      (function(mapDiv, location) {
          console.log(location);
          var map = new google.maps.Map(mapDiv, {
              zoom:location.zoom, // Nivel de zoom para cada mapa
              center: {lat: location.latitud, lng: location.longitud} // Centro del mapa en la ubicación
          });
          var marker = new google.maps.Marker({
              position: {lat: location.latitud, lng: location.longitud},
              map: map,
              title: location.titulo
          });
          var infowindow = new google.maps.InfoWindow({
              content: '<b>' + location.nombre + '</b><br>' + location.direccion
          });
          marker.addListener('click', function() {
              infowindow.open(map, marker);
          });
      })(mapDiv, {
          latitud: "-17.802003" ,
          longitud: "-63.136256",
          zoom:  15 ,
          nombre: "OFICINA CENTRAL",
          direccion: "Av. Tres pasos al frente esquina Che Guevara",
      });
}
google.maps.event.addDomListener(window, 'load', initMap);