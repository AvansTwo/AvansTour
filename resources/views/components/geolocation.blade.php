<div>
    <div id="geolocation">
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    </div>
</div>

<script>
var isAdmin = {{ $isAdmin }};
console.log(isAdmin)
map.locate({setView: true, watch: true, enableHighAccuracy: true}) /* This will return map so you can do chaining */
        .on('locationfound', function(e){
            let radius = Math.round(e.accuracy/10);
            var marker = L.marker([e.latitude, e.longitude]).bindPopup(`You are within ${radius} meters from here!`);
            var person = L.circle([e.latitude, e.longitude], radius, {
                weight: 1,
                color: 'blue',
                fillColor: '#cacaca',
                fillOpacity: 0.2
            });
            map.addLayer(marker);
            map.addLayer(person);

        if(markers){
        markers.forEach((marker) => {    
        if(marker.id && marker.team_hash) {
            let markerMap = L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                eval(markerCallback)(person, marker, markerMap, isAdmin);
            });
        }else if (marker.id) {
            L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                eval(markerCallback)(marker);
            });
        }else{
            L.marker([marker.lat, marker.long], {icon: icon}).addTo(map).on('click', function(e) {
                eval(markerCallback);
            });
        }
        
    })
    }

        })
       .on('locationerror', function(e){
            alert("Location access denied, please refresh page!");
        });

    </script>
