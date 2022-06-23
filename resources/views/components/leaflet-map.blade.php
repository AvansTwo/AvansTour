<div>
    <div id="leafletmap"></div>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <script src="{{ asset('/js/callback.js') }}"></script>
</div>

<style>
    #leafletmap{
        width: 100%;
        height: 400px;
    }
</style>

<script>
    var centerpoint = {!! json_encode($centerpoint) !!};
    var size = {{  $radius  }};
    var markers = {!! json_encode($markers) !!};
    var markerCallback = {{ $markerCallback }};
    var map = L.map('leafletmap').setView([centerpoint[0], centerpoint[1]], 13);
    var mapCallback = {{ $mapCallback }};
    var icon = L.icon({
        iconUrl: {!! json_encode(asset('img/pin.png')) !!},

        iconSize:     [28, 41], // size of the icon
        iconAnchor:   [14, 41], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -40]
    });
    var startIcon = L.icon({
        iconUrl: {!! json_encode(asset('img/pin-start.png')) !!},

        iconSize:     [28, 41], // size of the icon
        iconAnchor:   [14, 41], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -40]
    })
    var locationIcon = L.icon({
        iconUrl: {!! json_encode(asset('img/pin-user.png')) !!},

        iconSize:     [28, 41], // size of the icon
        iconAnchor:   [14, 41], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -40]
    });


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    if(markers[0] != 0){
        if(markerCallback == markerClick){
            markers.forEach((marker) => {    
                L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                    eval(markerCallback)(marker.id, marker.team_hash);
                });
            })
        }else if(markerCallback == startLocationMarkerClick){
            markers.forEach((marker) => {    
                L.marker([marker.lat, marker.long], {icon: startIcon}).addTo(map).on('click', function(e) {
                    eval(markerCallback);
                }).bindPopup("Startlocatie");
            })
        }else if(markerCallback == mapRePickStartLocation){
            eval(markerCallback);
        } else if(markerCallback == noMarkerCallback){
            markers.forEach((marker) => {    
                L.marker([marker.lat, marker.long], {icon: icon}).addTo(map);
            })
        } else if (markerCallback == relocateQuestion) {
            markers.forEach((marker) => {
              let newMarker = L.marker([marker.lat, marker.long], {icon: icon}).addTo(map);
                map.on('click', function(e) {
              newMarker.setLatLng(e.latlng);
            })
            })
        }
    }

    if((mapCallback == mapPickLocation) || (mapCallback == mapRePickStartLocation)) {
        map.setZoom(16)
        var circle = L.circle([51.588376,4.776478], {
            color: 'red',
            fillOpacity: 0.0,
            radius: 6000
        }).addTo(map);
        if (mapCallback == mapRePickStartLocation){ 
         marker = L.marker([markers[0].lat, markers[0].long], {icon: startIcon}).addTo(map);
         map.on('click', function(e) {
            eval(mapPickLocation)(map, marker, e, circle);
        })
        } else {
         marker = L.marker([1, 1], {icon: icon}).addTo(map);
         map.on('click', function(e) {
            eval(mapCallback)(map, marker, e, circle);
        })
        }
    }

    if (mapCallback == mapOpen) {
        map.setZoom(16);
        var marker = L.marker([51.588376,4.776478], {
            icon: locationIcon
        }).addTo(map);
        var radiusSize = L.circle([51.588376,4.776478], {
            color: 'red',
            fillOpacity: 0.0,
            radius: size
        }).addTo(map);
        map.on('click', function(e) {
            eval(mapCallback)(map, radiusSize);
        })
    }

</script>