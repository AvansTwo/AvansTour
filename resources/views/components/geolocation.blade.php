<div>
    <div id="geolocation">
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    </div>
</div>

<script>
    let liveMarker;
    let personCircle;

    var locationIcon = L.icon({
        iconUrl: {!! json_encode(asset('img/pin-user.png')) !!},

        iconSize:     [28, 41], // size of the icon
        iconAnchor:   [14, 41], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -40]
    });

    let isAdmin = {{ $isAdmin }};
    let radius = {{$radius}};

    // Locate listener that updates marker location
    map.locate({watch: true, enableHighAccuracy: true}).on('locationfound', function(e){
        console.log('test')
        if(!liveMarker && !personCircle){
            liveMarker = L.marker(e.latlng, {
                icon: locationIcon
            }).bindPopup(`Deze radius strekt ${radius} meter om jouw huidige locatie!`).addTo(map);

            personCircle = L.circle(e.latlng, radius, {
                weight: 1,
                color: 'blue',
                fillColor: '#cacaca',
                fillOpacity: 0.2
            }).addTo(map);

            setTimeout(() => {
                map.setView(liveMarker._latlng, 15);
            }, 500);
        }else{
            liveMarker.setLatLng(e.latlng);
            personCircle.setLatLng(e.latlng);
        }
    }).on('locationerror', function(e){
        alert("Avanstour heeft geen toegang tot je locatie!! Verleen toegang om verder te gaan met de tour");
    });

    // Place markers on map
    if(markers){
        markers.forEach((marker) => {    
            if(marker.special) {
                let markerMap = L.marker([marker.lat, marker.long], {icon: goldIcon}).addTo(map).on('click', function(e) {
                    eval(markerCallback)(personCircle, marker, markerMap, isAdmin);
                });
            }else{
                let markerMap = L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                    eval(markerCallback)(personCircle, marker, markerMap, isAdmin);
                });
            }
            
        })
    }
    
</script>
