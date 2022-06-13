function markerClick(question_id, team_hash) {
    console.log(question_id);
    console.log(team_hash);

    document.location.href = `/quiz/spelen/${team_hash}/vraag/${question_id}`;
}

function mapPickLocation(location){
    let locationText = document.getElementById('locationText');
    if (locationText) {
    let format = location.toString().slice(7, -1)
    let strings = format.split(',')
    let formatted = strings[0] + "," + strings[1].slice(1, strings[1].length);
    locationText.value = formatted;

    document.getElementById("locationChanged").classList.remove("d-none");
    setTimeout(function(){
        document.getElementById("locationChanged").classList.add("d-none");
 }, 3000);

    }
}

let MapIsInvisible = true;

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