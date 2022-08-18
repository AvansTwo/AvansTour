<div>
    <div id="geolocation">
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    </div>
</div>

<script>
    var locationIcon = L.icon({
        iconUrl: {!! json_encode(asset('img/pin-user.png')) !!},

        iconSize:     [28, 41], // size of the icon
        iconAnchor:   [14, 41], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -40]
    });

    let isAdmin = {{ $isAdmin }};
    let radius = {{$radius}};

    let liveMarker = L.marker([51.58913787971526,4.77596559775307], {
        icon: locationIcon
    }).bindPopup(`Deze radius strekt ${radius} meter om jouw huidige locatie!`).addTo(map);

    let personCircle = L.circle([1,1], radius, {
        weight: 1,
        color: 'blue',
        fillColor: '#cacaca',
        fillOpacity: 0.2
    }).addTo(map);

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
    // Locate listener that updates marker location
    map.locate({watch: true, enableHighAccuracy: true}).on('locationfound', function(e){
        const newLatLong = new L.LatLng(e.latitude, e.longitude);
        liveMarker.setLatLng(newLatLong);
        personCircle.setLatLng(newLatLong);
    }).on('locationerror', function(e){
        alert("Avanstour heeft geen toegang tot je locatie!! Verleen toegang om verder te gaan met de tour");
    });
    setTimeout(() => {
        map.setView(liveMarker._latlng, 17);
    }, 500);
</script>
