function markerClick(person, question, marker, isAdmin) {
    var d = map.distance(marker._latlng, person.getLatLng());

    if (d < person.getRadius() || isAdmin == true) {
        document.location.href = `/quiz/spelen/${question.team_hash}/vraag/${question.id}`;
    } else {
        marker.bindPopup('Loop naar deze locatie om de vraag te openen').openPopup();
    }
}
function mapRePickStartLocation() {
    console.log("redefined start")
}

function relocateQuestion() {
    console.log('redefined question')
}

function mapPickLocation(map, marker, event, circle) {
    var d = map.distance(event.latlng, circle.getLatLng());
    if (d < circle.getRadius()) {
        marker.setLatLng(new L.LatLng(event.latlng.lat, event.latlng.lng));

        let location = event.latlng;
        let locationText = document.getElementById('tourStartLocation');

        if (locationText == null) {
            locationText = document.getElementById('gps_location');
        }

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
        Swal.fire(
            'Hey, dat is niet mogelijk!',
            'Je kunt geen locaties buiten de cirkel selecteren',
            'warning'
        )
    }
}

function startLocationMarkerClick() {
    console.log('Start location clicked');
}

function resizeMap() {
    setTimeout(() => {
        map.invalidateSize();
    }, 500);
}

function resizeCircle() {
   let counter = document.getElementById('radiusCounter');
   setTimeout(() => {
    radiusSize.setRadius(counter.innerHTML);
}, 300);
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

function mapOpen(map, radius) {
    map.invalidateSize();
}
// Default callbacks
function noMarkerCallback() {
    console.log('No marker callback specified');
}

function noMapCallback() {
    console.log('No map callback specified');
}
