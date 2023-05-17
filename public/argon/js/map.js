var $map = $('#map-default'),
    map,
    lat,
    lng,
    place_input,
    color = "#5e72e4";

let autocomplete;

function initMap() {
    map = document.getElementById('map-default');
    lat = document.getElementById('lat').value;
    lng = document.getElementById('lng').value;
    place_input = document.getElementById('place_input').value;

    map = new google.maps.Map(document.getElementById('map-default'), {
        zoom: 12,
        scrollwheel: true,
        center: new google.maps.LatLng(4.60971, -74.08175),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    });

    if (lat != 0 || lng != 0) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            animation: google.maps.Animation.DROP,
            title: 'Ubicación',
            draggable: true
        });
    } else {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(4.60971, -74.08175),
            map: map,
            animation: google.maps.Animation.DROP,
            title: 'Ubicación',
            draggable: true
        });
    }

    const infowindow = new google.maps.InfoWindow();

    google.maps.event.addListener(marker, 'click', function (e) {
        infowindow.open(map, this);
        infowindow.setContent(e.latLng.lat().toFixed(6) + ', ' + e.latLng.lng().toFixed(6));
    });

    google.maps.event.addListener(marker, 'dragend', function (evt) {
        $("#lat").val(evt.latLng.lat().toFixed(6));
        $("#lng").val(evt.latLng.lng().toFixed(6));

        map.panTo(evt.latLng);
    });

    map.setCenter(marker.position);

    marker.setMap(map);

    initAutocomplete();
}

function initAutocomplete(){
    autocomplete = new google.maps.places.Autocomplete(place_input);
}

if ($map.length) {
    google.maps.event.addDomListener(window, 'load', initMap);
}