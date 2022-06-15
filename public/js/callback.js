function markerClick(person, question, marker, isAdmin) {
    console.log(question.id);
    console.log(question.team_hash);
    console.log(isAdmin)
    var d = map.distance(marker._latlng, person.getLatLng());

    if (d < person.getRadius() || isAdmin == true){
    document.location.href = `/quiz/spelen/${question.team_hash}/vraag/${question.id}`;
    } else {
        marker.bindPopup('Get closer to this question!').openPopup();
    }
}

function mapPickLocation(map, marker, event, circle) {
    var d = map.distance(event.latlng, circle.getLatLng());
    if (d < circle.getRadius()) {
        marker.setLatLng(new L.LatLng(event.latlng.lat, event.latlng.lng));

        let location = event.latlng;
        let locationText = document.getElementById('tourStartLocation') || document.getElementById('questionLocation');
        if (locationText) {
            let format = location.toString().slice(7, -1)
            let strings = format.split(',')
            let formatted = strings[0] + "," + strings[1].slice(1, strings[1].length);
            locationText.value = formatted;
            document.getElementById("locationChanged").classList.remove("d-none");
            setTimeout(function () {
                document.getElementById("locationChanged").classList.add("d-none");
            }, 3000);
        }
    } else {
        alert('Place your location within the circle!');
    }
}

let MapIsInvisible = false;

function showMap() {
    let map = document.getElementById('map');

    if (MapIsInvisible == false) {
        map.classList.add("d-none");
        map.disabled = true;
        MapIsInvisible = true;
    } else {
        map.classList.remove("d-none");
        map.disabled = false;
        MapIsInvisible = false;
    }

}


// Default callbacks
function noMarkerCallback() {
    console.log('No marker callback specified');
}

function noMapCallback() {
    console.log('No map callback specified');
}