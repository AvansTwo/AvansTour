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
    var markers = {!! json_encode($markers) !!};
    var markerCallback = {{ $markerCallback }};
    var mapCallback = {{ $mapCallback }};
    var icon = L.icon({
        iconUrl: {!! json_encode(asset('img/pin.png')) !!},

        iconSize:     [28, 41], // size of the icon
        iconAnchor:   [14, 41], // point of the icon which will correspond to marker's location
    });

    var map = L.map('leafletmap').setView([centerpoint[0], centerpoint[1]], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);
    
    var circle = L.circle([51.588376,4.776478], {
        color: 'red',
        fillOpacity: 0.0,
        radius: 4500
    }).addTo(map);

    if (markers[0] == 0) markers = [];

    if(markers){
        markers.forEach((marker) => {    
        if(marker.id && marker.team_hash) {
            L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                eval(markerCallback)(marker.id, marker.team_hash);
            });
        }else if (marker.id) {
            L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                eval(markerCallback)(marker.id);
            });
        }else{
            L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                eval(markerCallback);
            });
        }
        
    })
    }

    if(mapCallback == mapPickLocation) {
        let marker = L.marker([1, 1], {icon: icon}).addTo(map);
        map.on('click', function(e) {
            eval(mapCallback)(map, marker, e, circle);
        })
    }
</script>