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
    var map = L.map('leafletmap').setView([centerpoint[0], centerpoint[1]], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);
    
    if (markers[0] == 0) markers = [];

    if(mapCallback == mapPickLocation) {
        let marker = L.marker([1, 1], {icon: icon}).addTo(map);
        map.on('click', function(e) {
            eval(mapCallback)(map, marker, e, circle);
        })
    }

</script>